<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VideoUpload;
use App\Models\Category;
use App\Models\Video;
use App\Models\TagModel;
use App\Models\MetaTitleModel;
use App\Models\SubscriptionModel;
use App\Models\FavorateModel;
use App\Models\LikeDislike;
use App\Models\CommentModel;
use App\Models\Mp3AndTumbnails;
use App\Models\VideoCategoryUpload;
use Validator;
use DB;
use Carbon\Carbon;
use Storage;
use Auth;
use App\User;
use Response;
use File;
use Rap2hpoutre\FastExcel\FastExcel;
use FFMpeg;
use VideoThumbnail;
use Spatie\Searchable\Search;
class VideoUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['getCategory'] = Category::get();
        return view('vdopedia.upload.video-upload')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
             
        $rules =  [
            'title' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'category_id' => 'required',
            'video_file' => 'required',
            'tags' => 'required',
        ];
        $messages = [
            'category_id.required' => 'Category field required.',
            'tags.required' => 'Tag field required',
            
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        
        $validator->sometimes('file', 'nullable|mimes:csv,xlsx|max:1024000', function ($request) {
            $messages = ['file.mimes'=>'file type must be csv or xlsx.'];
            return ($request->category_id == 2 || $request->category_id == 4);
        });
        $validator->sometimes('file', 'nullable|mimes:pdf|max:1024000', function ($request) {
            $messages = ['file.mimes'=>'file type must be pdf.'];
            return ($request->category_id == 1);
        });
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }else {
            DB::beginTransaction();
            try {

                $formData = new Video();
                $formData->title = $request->title;
                $formData->user_id = Auth::id();
                $formData->description = $request->description;
                $formData->upload_date = Carbon::now();
                //$formData->meta_title = implode(",",$request->meta_title);
                $formData->meta_description =isset($formData->meta_description)?implode(",", $request->meta_description):'';
                //$formData->tags = implode(",",$request->tags);
           
               $formData->category_id = $request->category_id[0];
                
                if($request->hasFile('image_file')) {
                    $uploadedFile = $request->file('image_file');
                    $filename = time().$uploadedFile->getClientOriginalName();
                    $imagePath =  Storage::disk('public')->putFileAs(
                        'images',
                        $uploadedFile,
                        $filename
                      );
                    $formData->image_file = $imagePath;
                }

                 if($request->hasFile('video_file')) {
                    $uploadedFile = $request->file('video_file');
                    $filename = trim(time().$uploadedFile->getClientOriginalName());
                    $removeSpaceFromFile = preg_replace('/[^A-Za-z0-9\-]/', '', $filename);
                    $filePath =  Storage::disk('public')->putFileAs(
                        'videos',
                        $uploadedFile,
                        $removeSpaceFromFile
                      );
                    $formData->video_file = $filePath;
                    
                    $video_id = DB::getPdo()->lastInsertId();
                    $filefullPath = asset('storage').'/'.$filePath;
                    $getOutputFilePath = Mp3AndTumbnails::where('id',1)->first();
                    $outputMp3File =  $getOutputFilePath->mp3_output_path;
                    $outputImageFile =  $getOutputFilePath->thumbnails_path;
                    // $mp3Filename = $video_id.'.mp3';
                    // $imageFileName = $video_id;
                    $mp3Filename = preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title).'.mp3';
                    $imageFileName = preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title);

                     
                    $output = shell_exec('ffmpeg -i '. $filefullPath.' -vn -ar 44100 -ac 2 -ab 192 -f mp3 '. $outputMp3File.'/'.$mp3Filename);
                    $imageOutput = shell_exec('ffmpeg -i '.$filefullPath.' -ss 00:00:10 -vframes 1 -s 370x220 '.$outputImageFile.'/'.$imageFileName.'.jpg -hide_banner');
                    $formData->mp3_file = $mp3Filename;
                    $formData->image_file = 'images/'.$imageFileName.'.jpg';
                    $dur = shell_exec("ffmpeg -i ".$filefullPath." 2>&1");
                    preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $dur, $duration);
                    if(isset($duration[1])) {

                        $hours = $duration[1];
                        $minutes = $duration[2];
                        $seconds = $duration[3];
                        $video_length = $hours.':'.$minutes.':'.$seconds;
                        $formData->video_length = $video_length;
                    }
                }
                if($request->hasFile('file')) {
                    $lyricsFile = $request->file('file');
                    $categoryInfo = Category::where('id',$request->category_id[0])->first();
                    $filename = time().$lyricsFile->getClientOriginalName();
                    $lyricsFile->move(public_path("download".'/'.$categoryInfo->name), $filename);
                    $path = $filename;
                    $formData->lyrics_file = $path;
                }
                $formData->save();
                foreach ($request->category_id as $key => $value) {
                    $category = new VideoCategoryUpload();
                    $category->video_id = $formData->id;
                    $category->category_id = $value;
                    $category->save();
                }
                $updateEncodeVideoId = Video::where('id',$formData->id)
                                        ->update(['base64_encode_video_id'=>base64_encode($formData->id)]);

                foreach ($request->tags as $key => $value) {
                    $tagData = new TagModel();
                    $tagData->user_id = Auth::id();
                    $tagData->video_id = $formData->id;
                    $tagData->name = $value;
                    $tagData->slug_name = $value;

                    $tagData->save();
                }

                 foreach ($request->meta_title as $key => $value) {
                    $metaTitleData = new MetaTitleModel();
                    $metaTitleData->user_id = Auth::id();
                    $metaTitleData->video_id = $formData->id;
                    $metaTitleData->title_name = $value;
                    $metaTitleData->title_slug_name = $value;

                    $metaTitleData->save();
                }

                DB::commit();
                return response()->json(['status'=>true,'msg'=>'File uploaded successfully !!.']);
            }catch(\Exception $e) {
                DB::rollback();
                return response()->json(['status'=>'exception','msg'=>'Something Went Wrong !!.']);
            }
        }
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $video_id = base64_decode($id);
        $data['editVideoInfo'] = $editVideoInfo = Video::with('getMetaTitle','getCategoryName1','getTags')->where('id',$video_id)->first();
        $data['getCategory'] = $getCategory = Category::all();
        
       // dd($data);
        return view('vdopedia.user-profile.video.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
       $video_id = $request->video_id;
        $rules =  [
            'title' => 'required',
            'description' => 'required',
            'meta_title' => 'required',
            'category_id' => 'required',
            'video_file' => 'nullable',
            // 'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'tags' => 'required',
        ];
        $messages = [
            'category_id.required' => 'Category field required.',
            'image_file.mimes' => 'image must be in valid format.',
            'tags.required' => 'Tag field required',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if($request->hasFile('file')) {
            $validator->sometimes('file', 'nullable|mimes:csv,xlsx|max:1024000', function ($request) {
                $messages = ['file.mimes'=>'file type must be csv or xlsx.'];
                return ($request->category_id == 2 || $request->category_id == 4);
            });
            $validator->sometimes('file', 'nullable|mimes:pdf|max:1024000', function ($request) {
                $messages = ['file.mimes'=>'file type must be pdf.'];
                return ($request->category_id == 1);
            });
        }
       
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }else {
            DB::beginTransaction();
            try {

                $formData = Video::where('id',$video_id)->first();

                $formData->title = $request->title;
                $formData->user_id = Auth::id();
                $formData->description = $request->description;
                $formData->upload_date = Carbon::now();
                //$formData->meta_title = implode(",",$request->meta_title);
                $formData->meta_description = isset($formData->meta_description)?implode(",", $request->meta_description):'';
                //$formData->tags = implode(",",$request->tags);
                $formData->category_id = $request->category_id[0];

                 if($request->hasFile('file')) {
                    $lyricsFile = $request->file('file');
                    $categoryInfo = Category::where('id',$request->category_id)->first();
                    $filename = time().$lyricsFile->getClientOriginalName();
                    $lyricsFile->move(public_path("download".'/'.$categoryInfo->name), $filename);
                    $path = $filename;
                    $formData->lyrics_file = $path;
                   
                }
                if($request->hasFile('image_file')) {
                    $uploadedFile = $request->file('image_file');
                    $filename = time().$uploadedFile->getClientOriginalName();
                    $imagePath =  Storage::disk('public')->putFileAs(
                        'images',
                        $uploadedFile,
                        $filename
                      );
                    $formData->image_file = $imagePath;
                }
                $fileUnlink =   storage_path('app/public/'.$formData->video_file);
                if(File::exists($fileUnlink)) {
                    File::delete($fileUnlink);
                }
                 if($request->hasFile('video_file')) {
                    $uploadedFile = $request->file('video_file');
                    $filename = time().$uploadedFile->getClientOriginalName();
                    $removeSpaceFromFile = preg_replace('/[^a-zA-Z0-9\/_|+ .-]/', '', $filename);
                    $filePath =  Storage::disk('public')->putFileAs(
                        'videos',
                        $uploadedFile,
                        $removeSpaceFromFile
                      );
                    // dd($filePath);
                    $formData->video_file = $filePath;
                    $video_id = DB::getPdo()->lastInsertId();
                    $filefullPath = asset('storage').'/'.$filePath;
                    $getOutputFilePath = Mp3AndTumbnails::where('id',1)->first();
                    $outputMp3File =  $getOutputFilePath->mp3_output_path;
                    $outputImageFile =  $getOutputFilePath->thumbnails_path;
                    // $mp3Filename = $video_id.'.mp3';
                    // $imageFileName = $video_id;
                    $mp3Filename = preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title).'.mp3';
                    $imageFileName = preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title);
                    
                    $output = shell_exec('ffmpeg -i '. $filefullPath.' -vn -ar 44100 -ac 2 -ab 192 -f mp3 '. $outputMp3File.'/'.$mp3Filename);
                    $imageOutput = shell_exec('ffmpeg -i '.$filefullPath.' -ss 00:00:10 -vframes 1 -s 370x220 '.$outputImageFile.'/'.$imageFileName.'.jpg -hide_banner');
                    $formData->mp3_file = $mp3Filename;
                    $formData->image_file = 'images/'.$imageFileName.'.jpg';
                    $dur = shell_exec("ffmpeg -i ".$filefullPath." 2>&1");
                    preg_match("/Duration: (.{2}):(.{2}):(.{2})/", $dur, $duration);
                    if(isset($duration[1])){
                        $hours = $duration[1];
                        $minutes = $duration[2];
                        $seconds = $duration[3];
                        $video_length = $hours.':'.$minutes.':'.$seconds;
                        $formData->video_length = $video_length;
                    }
                    // $updateMp3File = $outputMp3File.'/'.$mp3Filename;
                    // rename($updateMp3File, $outputMp3File.preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title).'.mp3');
                }
                // $renameMp3FileName =preg_replace('/[^A-Za-z0-9\-]/', '_',$request->title).'.mp3';
                

                 // }
                $formData->save();
                $updateEncodeVideoId = Video::where('id',$formData->id)->update([
                                            'base64_encode_video_id'=>base64_encode($formData->id),
                                            
                                        ]);
      
                $videoCategory = VideoCategoryUpload::where('video_id',$formData->id)->delete();

                foreach ($request->category_id as $key => $value) {
                    $category = new VideoCategoryUpload();
                    $category->video_id = $formData->id;
                    $category->category_id = $value;
                    $category->save();
                }
                $tags = TagModel::where('video_id',$formData->id)->delete();
                foreach ($request->tags as $key => $value) {
                    $tagData = new TagModel();
                    $tagData->user_id = Auth::id();
                    $tagData->video_id = $formData->id;
                    $tagData->name = $value;
                    $tagData->slug_name = $value;

                    $tagData->save();
                }
                 $tags = MetaTitleModel::where('video_id',$formData->id)->delete();
                 foreach ($request->meta_title as $key => $value) {
                    $metaTitleData = new MetaTitleModel();
                    $metaTitleData->user_id = Auth::id();
                    $metaTitleData->video_id = $formData->id;
                    $metaTitleData->title_name = $value;
                    $metaTitleData->title_slug_name = $value;

                    $metaTitleData->save();
                }

                DB::commit();
                return response()->json(['status'=>true,'msg'=>'File updated successfully !!.']);
            }catch(\Exception $e) {
                DB::rollback();
                return response()->json(['status'=>'exception','msg'=>'Exit Without Save !!.']);
            }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// /* return video Search  Result  Data*/
//     public function videoSearch(Request $request) {
//         $query = $request->input('query');
//         $page = $request->page;
//         //$category = $request->input('category');
//         if(!empty($query)) {
            
//                 if($page == ''){
//                     $getSearchData = DB::table('videos')
//                     ->join('users','users.id','=','videos.user_id')
//                     ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
//                     ->whereNull('videos.deleted_at')
//                     // ->where("users.name","LIKE","%{$query}%")
//                     // ->orWhere("videos.title","LIKE","%{$query}%")
//                    // ->where('videos.category_id',$category)
//                     ->where('users.name','LIKE','%'. $query.'%')
//                     ->orWhere('videos.title','LIKE','%'.$query.'%')
//                     ->orderBy('created_at','DESC')
//                     ->take(10)->get();
//                     }
//                 else if($page == 1){
//                     $getSearchData = DB::table('videos')
//                         ->join('users','users.id','=','videos.user_id')
//                         ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
//                         ->whereNull('videos.deleted_at')
//                         ->where("users.name","LIKE","%{$query}%")
//                         ->orWhere("videos.title","LIKE","%{$query}%")
//                        // ->where('videos.category_id',$category)
//                         //->where('users.name','LIKE','%'. $query.'%')
//                         //->orWhere('videos.title','LIKE','%'.$query.'%')
//                         // ->whereNull('videos.deleted_at')
//                         ->orderBy('created_at','DESC')
//                         ->skip(10)->take(10)->get();
//                 }else if($page == 2) {
//                     $getSearchData = DB::table('videos')
//                         ->join('users','users.id','=','videos.user_id')
//                         ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
//                           ->whereNull('videos.deleted_at')
//                         ->where("users.name","LIKE","%{$query}%")
//                         ->orWhere("videos.title","LIKE","%{$query}%")
//                        // ->where('videos.category_id',$category)
//                         //->where('users.name','LIKE','%'. $query.'%')
//                         //->orWhere('videos.title','LIKE','%'.$query.'%')
                        
//                         ->orderBy('created_at','DESC')
//                         ->skip(20)->take(10)->get();
//                 }else if($page == 3) {
//                     $getSearchData = DB::table('videos')
//                         ->join('users','users.id','=','videos.user_id')
//                         ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
//                         ->whereNull('videos.deleted_at')
//                         ->where("users.name","LIKE","%{$query}%")
//                         ->orWhere("videos.title","LIKE","%{$query}%")
//                        // ->where('videos.category_id',$category)
//                         //->where('users.name','LIKE','%'. $query.'%')
//                         //->orWhere('videos.title','LIKE','%'.$query.'%')
                         
//                         ->orderBy('created_at','DESC')
//                         ->skip(30)->take(10)->get();
//                 }elseif($page>3){
//                     $data = 0;
//                     if($data == 0){
//                         return response()->json([
//                             'html'=> '',
//                             'status'=>true,
//                             'video_count'=>'No result found.',
//                         ],200);
//                     }
//                 }
//             }else{
//                 $getSearchData = DB::table('videos')
//                     ->join('users','users.id','=','videos.user_id')
//                     ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
//                     ->whereNull('videos.deleted_at')
//                     // ->where("users.name","LIKE","%{$query}%")
//                     // ->orWhere("videos.title","LIKE","%{$query}%")
//                    // ->where('videos.category_id',$category)
//                     ->where('users.name','LIKE','%'. $query.'%')
//                     ->orWhere('videos.title','LIKE','%'.$query.'%')
//                     ->orderBy('created_at','DESC')
//                     ->take(10)->get();

//     }
//         if(count($getSearchData) >0) {
//             $content = \View::make('vdopedia.render.search-video',compact('getSearchData'));
//             $content = $content->render();
//             return response()->json([
//                 'html'=> $content,
//                 'status'=>true,
//                 'video_count'=>count($getSearchData),
//             ],200);
//         }
        
//     }

    /* return video Search  Result  Data*/
    public function videoSearch(Request $request) {
        $type = $request->input('type');
        $query = $request->input('query');
        $id = "";
        $header = $request->header;
        if($request->id){
            $id = $request->id;
        }
        //$category = $request->input('category');

        if($type == 'users') {
            $getSearchData = DB::table('videos')
                ->join('users','users.id','=','videos.user_id')
                ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
                ->whereNull('videos.deleted_at')
                ->where('users.id',$id)
                ->orderBy('videos.created_at','DESC')
                ->take(15)->get();
        }else if($type == "videos"){
            $getSearchData = DB::table('videos')
                ->join('users','users.id','=','videos.user_id')
                ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
                ->whereNull('videos.deleted_at')
                ->where('videos.title','LIKE','%'. $query.'%')
                ->orWhere('videos.description','LIKE','%'. $query.'%')
                ->orderBy('videos.created_at','DESC')
                ->take(15)->get();
        }elseif($type == "button_search"){

            $getSearchData = DB::table('videos')
                        ->join('users','users.id','=','videos.user_id')
                        ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
                        ->whereNull('videos.deleted_at')
                        ->where("users.name","LIKE","%{$query}%")
                        ->orWhere("videos.title","LIKE","%{$query}%")
                        ->orderBy('videos.created_at','DESC')
                        ->take(15)->get();
        }elseif($type == 'meta_titles' ) {
            $getSearchData = DB::table('videos')
                        ->join('users','users.id','=','videos.user_id')
                        ->join('meta_titles','meta_titles.video_id','=','videos.id')
                        ->whereNull('videos.deleted_at')
                        ->orWhere("meta_titles.title_name","LIKE","%{$query}%")
                        ->orderBy('videos.created_at','DESC')
                        ->groupBy('video_id')
                        ->take(15)->get();
        }elseif($type =='tags') {
              $getSearchData = DB::table('videos')
                        ->join('tags','tags.video_id','=','videos.id')
                        ->join('users','users.id','=','tags.user_id')
                        ->whereNull('videos.deleted_at')
                        ->where("tags.name","LIKE","%{$query}%")
                        ->orderBy('videos.created_at','DESC')
                        ->groupBy('video_id')
                        ->take(15)->get();
                       
        }
      
        if(count($getSearchData)==0){
            return response()->json([
                    'html'=> '<img class="center" src="'.asset('/images/noresults.png').'" style="margin-left: 50%;">',
                    'status'=>true,
                    'video_count'=>0,
                ],200);
        }else if(count($getSearchData) >0) {
                $content = \View::make('vdopedia.render.search-video',compact('getSearchData'));
                $content = $content->render();
                return response()->json([
                    'html'=> $content,
                    'status'=>true,
                    'video_count'=>count($getSearchData),
                    'header'=>$header,
                ],200);
        }

    }

    /*search video auto complete*/
    public function videoSearchAutocomplete(Request $request) {
        $query =  $request->input('query');
        if(!empty($query)) {
            $searchResults = (new Search())
            ->registerModel(User::class, 'name')
            ->registerModel(Video::class, 'description','title')
            ->registerModel(TagModel::class, 'name')
            ->registerModel(MetaTitleModel::class, 'title_name')
            ->perform($query);
            
           $output = '<div><ul class="dropdown-menu form-control" style="display:block;
                        max-height:200px;overflow: auto; position:relative">';
                        foreach($searchResults as $row) {
                            $textSearch = $row->url;
                            $id = $row->title;
                           $output .= '
                           <li data-type="'.$row->type.'" data-id="'. $id.'" data-query="'.$textSearch.'" class="search_result_data  header_search_data" ><a style="color:white;" >'.$textSearch.'</a></li>
                           ';
                        }
                           $output .= '</ul> </div>';
        echo $output;
        }
    }


/*video load categoryWise on home page*/
    public function videoCategoryWiseLoadOnHomePage(Request $request) {

        $category = $request->input('category');
        $checkCategoryExist = Category::where('id',$category)->first();

        if(!empty($checkCategoryExist)) {
            $getSearchData = Video::where('category_id',$category)->orderBy('created_at','DESC')->limit(4)->get();
        if(count($getSearchData)>0) {
            $content = \View::make('vdopedia.render.category_wise_load_video',compact('getSearchData','checkCategoryExist'));
            $content = $content->render();
            return response()->json(['html'=> $content,'status'=>true,'video_count'=>count($getSearchData)],200);
        }else{
            return response()->json(['html'=> "",'status'=>true],200);
        }
        
    }
}
    /* watch Single video page return */

    public function watchVideo(Request $request ,$vid) {
        
        $vid = base64_decode($vid);
        $data['getVideoInfo'] = $getVideoInfo = Video::with('getUserInfo','getcomments','getFavorateVideo','getCategoryName','getTags','getMetaTitle')->where('id',$vid)->whereNull('deleted_at')->first();

         $data['getAllComment']=$getAllComment =CommentModel::with('getReplies')
                                        // ->where('user_id',$getVideoInfo->user_id)
                                        ->where('video_id',$getVideoInfo->id)
                                        ->orderBy('created_at','DESC')
                                        ->get();                        
        if(!empty(Auth::user()->id)) {
            $data['checkuserSubscribeThisUserOrNot'] = SubscriptionModel::where('user_id',$getVideoInfo->user_id)
                                                                    ->where('subscriber_id',Auth::user()->id)->first();
        }
      
        if(!empty($getVideoInfo->lyrics_file)) {
            try {
                if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4 ) {
                    $data['lyrics_data'] = $lyrics_data = (new FastExcel)->import(public_path("download".'/'.$getVideoInfo->getCategoryName->name.'/'.$getVideoInfo->lyrics_file));
                    // $lyrics_file_data = explode('/', $getVideoInfo->lyrics_file);
                    $lyricsFileName = preg_replace('/\s+/', '_',$getVideoInfo->mp3_file);
                    $getLyricsFileName = explode('.',  $lyricsFileName);
                    $filename = $getLyricsFileName[0];
                    if($file_name = $getVideoInfo->lyrics_file) {
                        $data['file_name'] =  $file_name.".txt";
                        $fileExistsCheck = public_path()."/download/lyrics_file/".$file_name.".txt";
                        $myfile = file_exists($fileExistsCheck);
                    }if($myfile==false) {
                        $file_data ='' ;
                        $file = $getLyricsFileName[0];
                        $destinationPath=public_path()."/download/lyrics_file/";
                        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
                        $data['file_name'] =  $file.".txt";
                        $file_path = $destinationPath.$file.".txt";
                        File::put( $file_path,$file_data);
                        if(!empty($file_path)) {
                            $myfile = fopen($file_path, "a") or die("Unable to open file!");
                            foreach ($lyrics_data as $key => $value) {
                                $txt = $value['text'];
                                fwrite($myfile, "\r\n". $txt);
                            }
                            fclose($myfile);
                        }
                    }
                }else {
                    $data['file_name']= $file_name = $getVideoInfo->lyrics_file;
                }
            }
            
            catch(\Exception $e) {
                return $e;
            }
        }
           
        $data['getCount'] = $getCount = LikeDislike::where('video_id',$vid)->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))->get();
        if(isset(Auth::user()->id)) {
            $data['getSubscriberChannel'] = $getSubscriberChannel = SubscriptionModel::with('getSubscriptionInfo')
                                                                    ->where('subscriber_id',Auth::user()->id)->get();
     
            $data['getRelatedVideos'] = $getRelatedVideos = Video::with('getUserInfo')   
                                                            ->where('category_id', $getVideoInfo->category_id)->limit(6)->get();
            $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                                ->where('category_id', $getVideoInfo->category_id)
                                                                ->where('user_id',Auth::user()->id)
                                                                ->orderBy('view','DESC')
                                                                ->limit(3)
                                                                ->get();
            $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                                ->orderBy('created_at','DESC')
                                                                ->where('user_id',Auth::user()->id)
                                                                ->limit(3)
                                                                ->get();
            $data['allCategory'] = $allCategory = Category::with('getCategoryAllVideoCount')
                                                            ->get();
        }
        $data['getRelatedVideos'] = $getRelatedVideos = Video::with('getUserInfo')   
                                                            ->where('category_id', $getVideoInfo->category_id)->limit(6)->get();
        $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                            ->where('category_id', $getVideoInfo->category_id)
                                                            ->orderBy('view','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                            ->orderBy('created_at','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['allCategory'] = $allCategory = Category::with('getCategoryAllVideoCount')->get();
        $updateView = Video::where('id',$vid)->update([
            'view'=>($getVideoInfo->view + 1)
        ]);
        return view('vdopedia.upload.single-video')->with($data);

    }   

    /*like dislike system */
    public function LikeDislikeAjaxRequest(Request $request) {
        $video_id = $request->vid;
        $user_id = $request->user_id;
        $thumb = $request->thumb;
        $data = array('user_id'=> $user_id);
        if($thumb == 'likes') {
            $likeData = LikeDislike::where('video_id',$video_id)->where('user_id',$user_id)->first();
             
            if(!empty($likeData)) {
                $likeDataUpdate =  LikeDislike::where('video_id',$video_id)
                                                ->where('user_id',$user_id)
                                                ->update(['likes'=> 1,'dislikes'=>0]);

                $getCount = LikeDislike::where('video_id',$video_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
            }else {
             
                $userLike = new LikeDislike();
                $userLike->user_id = $user_id;
                $userLike->video_id = $video_id;
                $userLike->likes = 1;
                $userLike->dislikes = 0;
                $userLike->save();
                $getCount = LikeDislike::where('video_id',$video_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
            }
            return response()->json(['status'=>true,'thumb'=>'likes','data'=>$getCount],200);
        }else if($thumb == 'dislikes'){
            $likeData = LikeDislike::where('video_id',$video_id)->where('user_id',$user_id)->get();
            if(!empty($likeData)) {
                $likeDataUpdate =  LikeDislike::where('video_id',$video_id)
                                                ->where('user_id',$user_id)
                                                ->update(['likes'=> 0,'dislikes'=>1]);

                $getCount = LikeDislike::where('video_id',$video_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
            }else {
                $userLike = new LikeDislike();
                $userLike->user_id = $user_id;
                $userLike->video_id = $video_id;
                $userLike->likes = 1;
                $userLike->dislikes = 0;
                $userLike->save();
                $getCount = LikeDislike::where('video_id',$video_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
            }            
            return response()->json(['status'=>true,'thumb'=>'dislikes','data'=>$getCount],200);
        }
    }

    /* return subscribe and unsubscribed value*/
    public function subscribed(Request $request) {
        if(empty(Auth::id())) {
            return redirect('/login');
        }
        $user_id = $request->user_id;
        $status = $request->status;
        if(Auth::user()->id != $user_id) {

            $checkSubscribeStatus = SubscriptionModel::where('user_id',$user_id)
                                                        ->where('subscriber_id',Auth::user()->id)
                                                        ->first();
           
            if($status == 'no') {
                if(!empty($checkSubscribeStatus)) {
                     $updateSubscribeStatus = SubscriptionModel::where('user_id',$user_id)
                                                            ->where('subscriber_id',Auth::user()->id)
                                                            ->update(['subscribe_status' =>'yes']);
                    
                $getSubsCriber = SubscriptionModel::where('user_id',$user_id)->where('subscribe_status','=','yes')->get();                                       
                                           
                
                }else {
                    $addSubscriber = new SubscriptionModel();
                    $addSubscriber->user_id = $user_id;
                    $addSubscriber->subscriber_id = Auth::user()->id;
                    $addSubscriber->subscribe_date =Carbon::now();
                    $addSubscriber->subscribe_status ='yes';
                    $addSubscriber->save();
                    
                }
               return response()->json(['status'=>true,'subscription_status'=>'yes','user_id'=>$user_id,'getSubsCount'=>count($getSubsCriber)]);
            }else if($status == 'yes') {
                if(!empty($checkSubscribeStatus)) {
                    $updateSubscribeStatus = SubscriptionModel::where('user_id',$user_id)
                                                            ->where('subscriber_id',Auth::user()->id)
                                                            ->update(['subscribe_status' =>'no']);
                    $getSubsCriber = SubscriptionModel::where('user_id',$user_id)->where('subscribe_status','=','yes')->get();
                        
                }
               
                return response()->json(['status'=>true,'subscription_status'=>'no','user_id'=>$user_id,'getSubsCount'=>count($getSubsCriber)]);
            }

            // if(!empty($checkSubscribeStatus) && $status == 'yes')
            // // $match  = array('user_id'=>$user_id);
            // // if($status == 'no') {
            // //     $addSubscriber=SubscriptionModel::updateOrCreate($match,[
            // //         'user_id' => $user_id,
            // //         'subscriber_id' => Auth::user()->id,
            // //         'subscribe_date' =>Carbon::now(),
            // //         'subscribe_status' =>'yes',
            // //     ]);
            // //      return response()->json(['status'=>true,'subscription_status'=>'yes','user_id'=>$user_id]);
            // // }else if($status == 'yes') {
            // //     $addSubscriber=SubscriptionModel::updateOrCreate($match,[
            // //         'user_id' => $user_id,
            // //         'subscriber_id' => Auth::user()->id,
            // //         'subscribe_date' =>Carbon::now(),
            // //         'subscribe_status' =>'no',
            // //     ]);
            // //     return response()->json(['status'=>true,'subscription_status'=>'no','user_id'=>$user_id]);
            // // }
           
        }
    }

    /* return favorate and unfavorate */

    public function favorate(Request $request) {
        //dd($request->all());
        $user_id = $request->user_id;
        $video_id = $request->video_id;
        $status = $request->status;
        $match  = array('user_id'=>$user_id,'video_id'=>$video_id);
        if($status == 'no'){
            $addFavorate = FavorateModel::updateOrCreate($match,[
                'user_id' => $user_id,
                'video_id' => $video_id,
                'favorate_id' => Auth::user()->id,
                'favorate' => 'yes',
            ]);
            return response()->json(['status'=>true,'favorate_status'=>'yes','user_id'=>$user_id,'video_id'=>$video_id]);
        }else if($status =='yes'){
            //dd('hi');
            $addFavorate = FavorateModel::updateOrCreate($match,[
                'user_id' => $user_id,
                'video_id' => $video_id,
                'favorate_id' => Auth::user()->id,
                'favorate' => 'no',
            ]);
            return response()->json(['status'=>true,'favorate_status'=>'no','user_id'=>$user_id,'video_id'=>$video_id]);
        }
    }
    
    /*filter the video as category wise*/
    public function videoCategoryWiseFilter(Request $request) {
        $category_id = $request->category_id;
        $click = $request->click;
        if($category_id=='new_all') {
            $data['getRelatedVideos'] = $categoryVideoResult = Video::orderBy('created_at','desc')->limit(6)->get();
            $data['getVideoInfo'] = $getVideoInfo = Video::with('getUserInfo','getFavorateVideo','getCategoryName','getTags','getMetaTitle')->orderBy('created_at','desc')->first();
        }
        if($category_id =='popular'){
            $data['getRelatedVideos'] = $categoryVideoResult = Video::orderBy('view','desc')->limit(6)->get();
            $data['getVideoInfo'] = $getVideoInfo = Video::with('getUserInfo','getFavorateVideo','getCategoryName','getTags','getMetaTitle')->orderBy('view','desc')->first();
        }

        if(is_numeric($category_id)) {
            $data['getRelatedVideos'] = $categoryVideoResult = Video::where('category_id',$category_id)->limit(6)->get();
            $data['getVideoInfo'] = $getVideoInfo = Video::with('getUserInfo','getFavorateVideo','getCategoryName','getTags','getMetaTitle')
                                                        ->where('category_id',$category_id)->first();
        }
        $current_url =  url('video/watch/'.base64_encode( $getVideoInfo->id));
        $page_render_url =  url('video/watch/render/'.base64_encode( $getVideoInfo->id));
        if(!empty($getVideoInfo)) {
            $updateViewCount = Video::where('id',$getVideoInfo->id)->update(['view'=>(++$getVideoInfo->view)]);
            if(!empty($getVideoInfo->lyrics_file)) {
                try {
                    if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4 ) {
                        $data['lyrics_data'] = $lyrics_data = (new FastExcel)->import(public_path("download".'/'.$getVideoInfo->getCategoryName->name.'/'.$getVideoInfo->lyrics_file));
                        // $lyrics_file_data = explode('/', $getVideoInfo->lyrics_file);
                        $lyricsFileName = preg_replace('/\s+/', '_',$getVideoInfo->mp3_file);
                        $getLyricsFileName = explode('.',  $lyricsFileName);
                        $filename = $getLyricsFileName[0];
                        if($file_name = $getVideoInfo->lyrics_file) {
                            $data['file_name'] =  $file_name.".txt";
                            $fileExistsCheck = public_path()."/download/lyrics_file/".$file_name.".txt";
                            $myfile = file_exists($fileExistsCheck);
                        }if($myfile==false) {
                            $file_data ='' ;
                            $file = $getLyricsFileName[0];
                            $destinationPath=public_path()."/download/lyrics_file/";
                            if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
                            $data['file_name'] =  $file.".txt";
                            $file_path = $destinationPath.$file.".txt";
                            File::put( $file_path,$file_data);
                            if(!empty($file_path)) {
                                $myfile = fopen($file_path, "a") or die("Unable to open file!");
                                foreach ($lyrics_data as $key => $value) {
                                    $txt = $value['text'];
                                    fwrite($myfile, "\r\n". $txt);
                                }
                                fclose($myfile);
                            }
                        }
                    }else {
                        $data['file_name']= $file_name = $getVideoInfo->lyrics_file;
                    }
                }
                catch(\Exception $e) {
                    return $e;
                }
            }
        }
        $data['getCount'] = $getCount = LikeDislike::where('video_id',$getVideoInfo->id)
                                            ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))->get();
        $content = \View::make('vdopedia.render.category_wise_filter')->with($data);
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true,
            'video_count'=>count($categoryVideoResult),
            'id' => 'id_video'.$click,
            'first_video_play_id'=>$getVideoInfo->id,
            'category_id' =>$getVideoInfo->category_id,
            'current_url'=>$current_url,
            'page_render_url'=>$page_render_url,
        ],200);
    }

/* return trending videos within 7 days before from  today date */
    public function videoTrendingWiseFilter(Request $request) {

        $video_status = $request->category_id;
        $click = $request->click;
        if($video_status == 'trending') {
        $end = Carbon::now();
        $start =  $end->subDays(7); 
        $lastSevenDaysMostViewsRecord = Video::whereBetween('created_at',[$start,Carbon::now()])->orderBy('view','DESC')->limit(5)->get();
            $data['getRelatedVideos'] = $lastSevenDaysMostViewsRecord;
            $data['getVideoInfo'] = $getVideoInfo = Video::whereBetween('created_at',[$start,Carbon::now()])->orderBy('view','DESC')->first();
            $current_url =  url('video/watch/'.base64_encode( $getVideoInfo->id));
            $updateViewCount = Video::where('id',$getVideoInfo->id)
                                    ->update(['view'=>(++$getVideoInfo->view)]);
        if(!empty($getVideoInfo->lyrics_file)) {
            try {
                if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4 ) {
                    $data['lyrics_data'] = $lyrics_data = (new FastExcel)->import(public_path("download".'/'.$getVideoInfo->getCategoryName->name.'/'.$getVideoInfo->lyrics_file));
                    // $lyrics_file_data = explode('/', $getVideoInfo->lyrics_file);
                    $lyricsFileName = preg_replace('/\s+/', '_',$getVideoInfo->mp3_file);
                    $getLyricsFileName = explode('.',  $lyricsFileName);
                    $filename = $getLyricsFileName[0];
                    if($file_name = $getVideoInfo->lyrics_file) {
                        $data['file_name'] =  $file_name.".txt";
                        $fileExistsCheck = public_path()."/download/lyrics_file/".$file_name.".txt";
                        $myfile = file_exists($fileExistsCheck);
                    }if($myfile==false) {
                        $file_data ='' ;
                        $file = $getLyricsFileName[0];
                        $destinationPath=public_path()."/download/lyrics_file/";
                        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
                        $data['file_name'] =  $file.".txt";
                        $file_path = $destinationPath.$file.".txt";
                        File::put( $file_path,$file_data);
                        if(!empty($file_path)) {
                            $myfile = fopen($file_path, "a") or die("Unable to open file!");
                            foreach ($lyrics_data as $key => $value) {
                                $txt = $value['text'];
                                fwrite($myfile, "\r\n". $txt);
                            }
                            fclose($myfile);
                        }
                    }
                }else {
                    $data['file_name']= $file_name = $getVideoInfo->lyrics_file;
                }
            }
            catch(\Exception $e) {
                return $e;
            }
        }
            
            $data['getCount'] = $getCount = LikeDislike::where('video_id',$getVideoInfo->id)->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))->get();
            $content = \View::make('vdopedia.render.trending_videos')->with($data);
            $content = $content->render();
            return response()->json([
                'html'=> $content,
                'status'=>true,
                'video_count'=>count($lastSevenDaysMostViewsRecord),
                'id' => 'video_id'.$click,
                'first_video_play_id'=>$getVideoInfo->id,
                'category_id' =>$getVideoInfo->category_id,
                'current_url'=>$current_url,

            ],200);
        }
    }

/* return result videos on user search in sidebar search option*/
    public function sidebarVideoSearchResult (Request $request) {
        $query = $request->keyword;
        if( !empty($query)) {
           $getSearchResults = DB::table('videos')
                ->join('users','users.id','=','videos.user_id')
                ->select('videos.*','users.id as user_id','videos.id as vid','users.name as name')
                ->where("users.name","LIKE","%{$query}%")
                ->orWhere("videos.title","LIKE","%{$query}%")
                //->where('users.name','LIKE','%'. $query.'%')
                //->orWhere('videos.title','LIKE','%'.$query.'%')
                ->whereNull('deleted_at')
                ->orderBy('created_at','DESC')
                ->paginate(9);
            if(count($getSearchResults )> 0) {
                $content = \View::make('vdopedia.render.sidebar_search_page',compact('getSearchResults'));
                $content = $content->render();
                return response()->json(['status'=>true,'html'=>$content],200);
            } else {
                return response()->json(['status'=>true,'html'=>'<p>No Result Found.</p>'],200);
            }
                
        }else {
            return response()->json(['status'=>true,'html'=>'<p>No Result Found.</p>'],200);
        }
                
    }

     /* watch Single video page return */

    public function singlePageRender(Request $request ,$vid) {
        $cat_id = $request->category_id;
        $vid = base64_decode($vid);
        $data['getVideoInfo'] = $getVideoInfo = Video::with('getUserInfo','getcomments','getFavorateVideo','getCategoryName','getTags','getMetaTitle')->where('id',$vid)->first();
         $data['getAllComment']=$getAllComment =CommentModel::with('getReplies')
                                        // ->where('user_id',$getVideoInfo->user_id)
                                        ->where('video_id',$getVideoInfo->id)
                                        ->orderBy('created_at','DESC')
                                        ->get();                        
        if(!empty(Auth::user()->id)) {
            $data['checkuserSubscribeThisUserOrNot'] = SubscriptionModel::where('user_id',$getVideoInfo->user_id)
                                                                    ->where('subscriber_id',Auth::user()->id)->first();
        }
      
        if(!empty($getVideoInfo->lyrics_file)) {
            try {
                if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4 ) {
                    $data['lyrics_data'] = $lyrics_data = (new FastExcel)->import(public_path("download".'/'.$getVideoInfo->getCategoryName->name.'/'.$getVideoInfo->lyrics_file));
                    // $lyrics_file_data = explode('/', $getVideoInfo->lyrics_file);
                    $lyricsFileName = preg_replace('/\s+/', '_',$getVideoInfo->mp3_file);
                    $getLyricsFileName = explode('.',  $lyricsFileName);
                    $filename = $getLyricsFileName[0];
                    if($file_name = $getVideoInfo->lyrics_file) {
                        $data['file_name'] =  $file_name.".txt";
                        $fileExistsCheck = public_path()."/download/lyrics_file/".$file_name.".txt";
                        $myfile = file_exists($fileExistsCheck);
                    }if($myfile==false) {
                        $file_data ='' ;
                        $file = $getLyricsFileName[0];
                        $destinationPath=public_path()."/download/lyrics_file/";
                        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
                        $data['file_name'] =  $file.".txt";
                        $file_path = $destinationPath.$file.".txt";
                        File::put( $file_path,$file_data);
                        if(!empty($file_path)) {
                            $myfile = fopen($file_path, "a") or die("Unable to open file!");
                            foreach ($lyrics_data as $key => $value) {
                                $txt = $value['text'];
                                fwrite($myfile, "\r\n". $txt);
                            }
                            fclose($myfile);
                        }
                    }
                }else {
                    $data['file_name']= $file_name = $getVideoInfo->lyrics_file;
                }
            }
            
            catch(\Exception $e) {
                return $e;
            }
        }
           
        $data['getCount'] = $getCount = LikeDislike::where('video_id',$vid)->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))->get();
        if(isset(Auth::user()->id)) {
            $data['getSubscriberChannel'] = $getSubscriberChannel = SubscriptionModel::with('getSubscriptionInfo')
                                                                    ->where('subscriber_id',Auth::user()->id)->get();
     
            $data['getRelatedVideos'] = $getRelatedVideos = Video::with('getUserInfo')   
                                                            ->where('category_id', $getVideoInfo->category_id)
                                                            ->limit(6)->get();
            $data['allCategory'] = $allCategory = Category::with('getCategoryAllVideoCount')
                                                            ->get();
        }
        $data['getRelatedVideos'] = $getRelatedVideos = Video::with('getUserInfo')   
                                                            ->where('category_id', $getVideoInfo->category_id)->get();
        $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                            ->where('category_id', $getVideoInfo->category_id)
                                                            ->orderBy('view','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                            ->orderBy('created_at','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['allCategory'] = $allCategory = Category::with('getCategoryAllVideoCount')->get();
        $updateView = Video::where('id',$vid)->update([
            'view'=>($getVideoInfo->view + 1)
        ]);
        $content = \View::make('vdopedia.render.single_video_page_render')->with($data);
        $content = $content->render();
            return response()->json([
                'html'=> $content,
                'category_id' =>$getVideoInfo->category_id,
                'video_id' =>'video_play_id'.$vid,

            ],200);

    } 

    /*searching the data*/

   
}
