<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Video;
use Auth;
use Carbon\Carbon;
use File;
use Rap2hpoutre\FastExcel\FastExcel;
class WelcomePageController extends Controller
{
    public function welcome() {
        $data['allCategory'] = Category::all();
        $end = Carbon::now();
        $start =  $end->subDays(7); 
        $data['lastSevenDaysMostViewsRecord'] = $lastSevenDaysMostViewsRecord=Video::whereBetween('created_at',[$start,Carbon::now()])
                                                                                    //->where('user_id',Auth::user()->id)
                                                                                    ->orderBy('view','DESC')
                                                                                    ->limit(4)
                                                                                    ->get();
        // $end = Carbon::now();
        // $start =  $end->subDays(7); 

        if(count($lastSevenDaysMostViewsRecord)== 0){
           
            $data['lastSevenDaysMostViewsRecord'] = $lastSevenDaysMostViewsRecord=Video::orderBy('created_at','desc')->orderBy('view','DESC')
                                                                                    ->limit(4)
                                                                                    ->get();
                                                                                    
        }  
        $data['getVideoInfo'] = $getVideoInfo = Video::whereBetween('created_at',[$start,Carbon::now()])
                                                        ->orderBy('view','DESC')->first();
        $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                                //->where('user_id',Auth::user()->id)
                                                                ->whereBetween('created_at',[$start,Carbon::now()])
                                                                ->orderBy('view','DESC')
                                                                ->limit(4)
                                                                ->get();
        $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                            ->orderBy('created_at','DESC')
                                                            //->where('user_id',Auth::user()->id)
                                                            ->limit(4)
                                                            ->get();
        $data['getLatestUpload'] = $getLatestUpload = Video::with('getUserInfo')
        // ->where('user_id',Auth::user()->id)
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
          

            $data['getLatestUpload'] = $getLatestUpload = Video::with('getUserInfo')->orderBy('created_at','DESC')->limit(4)->get();
        } 

        return view('welcome')->with($data);
    }

    /*return terms and condition page*/
     public function termsAndCondition(Request $request){
        return view('vdopedia.terms-and-conditions.terms-and-conditions');
    }
}
