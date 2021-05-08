<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Video;
use App\User;
use Auth;
use Carbon\Carbon;
use File;
use DataTables;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Notifications\UserActivationAndDeactivationMail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data['allCategory'] = Category::all();
        $end = Carbon::now();
        $start =  $end->subDays(7); 
        $data['lastSevenDaysMostViewsRecord'] = $lastSevenDaysMostViewsRecord=Video::whereBetween('created_at',[$start,Carbon::now()])
                                                                                    ->where('user_id',Auth::user()->id)
                                                                                    ->orderBy('view','DESC')
                                                                                    ->limit(4)
                                                                                    ->get();
        if(count($lastSevenDaysMostViewsRecord)== 0){
             $data['lastSevenDaysMostViewsRecord'] = $lastSevenDaysMostViewsRecord=Video::orderBy('created_at','desc')->where('user_id',Auth::user()->id)
                                                                                    ->orderBy('view','DESC')
                                                                                    ->limit(4)
                                                                                    ->get();
        }                                                                            
        
        // $end = Carbon::now();
        // $start =  $end->subDays(7); 
        $data['getVideoInfo'] = $getVideoInfo = Video::whereBetween('created_at',[$start,Carbon::now()])
                                                        ->orderBy('view','DESC')->first();
        $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                                ->where('user_id',Auth::user()->id)
                                                                ->whereBetween('created_at',[$start,Carbon::now()])
                                                                ->orderBy('view','DESC')
                                                                ->limit(4)
                                                                ->get();
        $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                            ->orderBy('created_at','DESC')
                                                            ->where('user_id',Auth::user()->id)
                                                            ->limit(4)
                                                            ->get();
        $data['getLatestUpload'] = $getLatestUpload = Video::with('getUserInfo')->where('user_id',Auth::user()->id)
                                                            ->orderBy('created_at','DESC')->limit(4)->get();
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
        
        if((count($lastSevenDaysMostViewsRecord)==0)  && (count($getRecentVideos)==0)) {

            $end = Carbon::now();
            $start =  $end->subDays(7); 
            $data['lastSevenDaysMostViewsRecord'] = $lastSevenDaysMostViewsRecord=Video::whereBetween('created_at',[$start,Carbon::now()])
                                                                                        ->orderBy('view','DESC')
                                                                                        ->limit(4)
                                                                                        ->get();
            $end = Carbon::now();
            $start =  $end->subDays(7); 
            $data['getVideoInfo'] = $getVideoInfo = Video::whereBetween('created_at',[$start,Carbon::now()])
                                                            ->orderBy('view','DESC')->first();

            $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                                    ->whereBetween('created_at',[$start,Carbon::now()])
                                                                    ->orderBy('view','DESC')
                                                                    ->limit(4)
                                                                    ->get();

            $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')->orderBy('created_at','DESC')->limit(4)->get();
          

            $data['getLatestUpload'] = $getLatestUpload = Video::with('getUserInfo')->orderBy('created_at','DESC')->limit(4)->get();;
        } 

        return view('home')->with($data);
    }

    public function userList(Request $request) {
        
        return view('admin.list-of-all-users');
    }

    public function userlistgetdata(Request $request) {
        $allUser = User::where('role_id','=','2')->get();
        if($request->search['value'] == 'active'){
            $allUser = User::where('role_id','=','2')->where('status','=','active')->get();
             return DataTables::of($allUser)
            ->addColumn('action', function($data) {
                if($data->status == 'active'){
                    return sprintf(' <div class="post-category">
                        <select id="active_users" name="active_users" class="form-controls active_users">
                                            <option  value="">--select--</option>
                                            <option value="'.base64_encode($data->id).'#active" selected="selected">Active</option>
                                            <option value="'.base64_encode($data->id).'#inactive">InActive</option>
                                        </select></div>');
                }
            })->addColumn('id',function($data) {
                static $i=1;
                return $i++;
            })->make(true);
        }else if($request->search['value'] == 'inactive') {
            $allUser = User::where('role_id','=','2')->where('status','=','inactive')->get();
             return DataTables::of($allUser)
            ->addColumn('action', function($data) {
                if($data->status == 'inactive'){
                return sprintf(' <div class="post-category">
                                        <select id="active_users" name="active_users" class="form-controls active_users">
                                            <option value="">--select--</option>
                                            <option value="'.base64_encode($data->id).'#active">Active</option>
                                            <option value="'.base64_encode($data->id).'#inactive" selected="selected">InActive</option>
                                        </select>
                                </div>');
                }
            })->editColumn('id',function($data) {
                static $i=1;
                return $i++;
            })->make(true);
        }else{
             return DataTables::of($allUser)
            ->addColumn('action', function($data) {
                if($data->status=='active'){
                    return sprintf(' <div class="post-category">
                        <select id="active_users" name="active_users" class="form-controls active_users">
                                            <option  value="">--select--</option>
                                            <option value="'.base64_encode($data->id).'#active" selected="selected">Active</option>
                                            <option value="'.base64_encode($data->id).'#inactive">InActive</option>
                                        </select></div>');
                }elseif($data->status == 'inactive'){
                return sprintf(' <div class="post-category">
                                        <select id="active_users" name="active_users" class="form-controls active_users">
                                            <option value="">--select--</option>
                                            <option value="'.base64_encode($data->id).'#active">Active</option>
                                            <option value="'.base64_encode($data->id).'#inactive" selected="selected">InActive</option>
                                        </select>
                                </div>');
                }
            })->editColumn('id',function($data) {
                static $i=1;
                return $i++;
            })->make(true);
        }
       
    }

    public function userStatusUpdate(Request $request){

        $value = $request->value;
        $getSepratedValue = explode('#', $value);
        $user_id = base64_decode($getSepratedValue[0]);
        $userStatus = ($getSepratedValue[1]);
        if($userStatus == 'active'){

            $userStatusUpdated = User::where('id',$user_id)->update([
                'status'=>'active',
            ]);
            $getUserDetails = User::where('id',$user_id)->first();
            $getUserDetails->notify(new UserActivationAndDeactivationMail($getUserDetails));
            return response()->json(['status'=>true,'msg'=>'User Activated Sucessfully !!']);
        }elseif($userStatus == 'inactive'){
            $userStatusUpdated = User::where('id',$user_id)->update([
                'status'=>'inactive'
            ]);
            $getUserDetails = User::where('id',$user_id)->first();
            $getUserDetails->notify(new UserActivationAndDeactivationMail($getUserDetails));
            return response()->json(['status'=>true,'msg'=>'User DeActivated Sucessfully !!']);
        }
    }
   
}
