<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Video;
use App\Models\Category;
use App\Models\FavorateModel;
use App\Models\CommentModel;
use App\Models\SubscriptionModel;
use Validator;
use Auth;
use DB;
use Storage;
use Session;
use App\Notifications\ProfileInfoShowAuthentication;
use Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /*return the user profile page*/
    public function profileInfo() {
        $user_id = Auth::id();
        $userInfo = User::with('getAllVideos')->where('id',$user_id)->first();
        return $userInfo;
    }

    /* return user profile main page*/
    public function index($id) {

        $user_id = base64_decode($id);
      
        $data['userInfo'] = $userInfo = User::with('getAllVideos','getAllUserTag')->where('id',$user_id)->first();
        $data['videos']=$videos = Video::where('user_id',$user_id)->paginate(21);
        $data['getRelatedVideos'] = $getRelatedVideos = Video::with('getUserInfo')->get();
        $data['getMostViewVideos'] = $getMostViewVideos = Video::with('getUserInfo')
                                                            ->orderBy('view','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['getRecentVideos'] = $getRecentVideos = Video::with('getUserInfo')
                                                            ->orderBy('created_at','DESC')
                                                            ->limit(3)
                                                            ->get();
        $data['allCategory'] = $allCategory = Category::with('getCategoryAllVideoCount')->get();
         if(!empty(Auth::user()->id)) {
            $data['checkuserSubscribeThisUserOrNot'] = SubscriptionModel::where('user_id', $user_id)
                                                                    ->where('subscriber_id',Auth::user()->id)->first();
        }
        $data['getSubsCriber'] =SubscriptionModel::where('user_id',$user_id)->where('subscribe_status','=','yes')->get();
        return view('vdopedia.user-profile.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* return user about me page */
    public function aboutMe($id) {

        $user_id = base64_decode($id);
        $userInfo = User::with('getAllVideos')->where('id',$user_id)->first();
        $data['userInfo'] = $userInfo;
        return view('vdopedia.user-profile.about-me')->with($data);
    }

    /*return password change page*/
public function passwordChange($id) {
    

        $user_id = base64_decode($id);
        $userInfo = User::with('getAllVideos')->where('id',$user_id)->first();
        $data['userInfo'] = $userInfo;
        return view('vdopedia.user-profile.password-change')->with($data);
    }

/* return user video page */

    public function userVideos($id) {

        $user_id = base64_decode($id);
        $data['userInfo'] = $userInfo = User::where('id',$user_id)->first();
        $data['videos']=$videos = Video::where('user_id',$user_id)->paginate(5);
        return view('vdopedia.user-profile.profile-video')->with($data);
    } 

/* return user favorate video page */
    public function userFavorateVideos(Request $request,$id) {

        $user_id = base64_decode($id);
        $data['userInfo'] =  $userInfo = User::with('getAllVideos','getAllfavorateVideo')->where('id',$user_id)->first();
        $data['faVideos']= $faVideos = FavorateModel::where('user_id',$user_id)->paginate(5);
     
        return view('vdopedia.user-profile.profile-favorate')->with($data);
    }

/* return user unfavorate video */

    public function unfavorate(Request $request) {

        $unfavorate = FavorateModel::where('id',$request->unfavId)->delete();
        $user_id = Auth::user()->id;
        $data['userInfo'] = $userInfo = User::with('getAllVideos','getAllfavorateVideo')->where('id',$user_id)->first();
        $content = \View::make('vdopedia.render.my-favorate')->with($data);
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true,
            'fav_video_count'=>count($userInfo->getAllfavorateVideo),
        ],200);

        
    }
/* return user profile Comment page */
     public function profileComments(Request $request,$id) {
      
        $user_id = base64_decode($id);
        $data['userInfo'] = User::with('getSubscriber','getAllVideos','getAllfavorateVideo')->where('id',$user_id)->first();
        return view('vdopedia.user-profile.profile-comment')->with($data);
    }


/* return user profile follower page */
     public function profileFollwer(Request $request,$id) {
  
        $user_id = base64_decode($id);
        $userInfo = User::with('getSubscriber','getAllSubscriber','getAllVideos','getAllfavorateVideo')->where('id',$user_id)->first();
        $data['userInfo'] = $userInfo;
        
        return view('vdopedia.user-profile.profile-follower')->with($data);
    }

// /* return user profile all comment of AllVideo page */
    public function getUserAllComment(Request $request) {

        $getUserVideosUpload = Video::where('user_id',Auth::user()->id)->get();
        $comment = array();
        foreach($getUserVideosUpload as $video) {
            static $commentCount = 0;
            $getEachVideoComments = $video->getAllComment;
            $commentCount =  count($getEachVideoComments)+$commentCount;
           
            array_push( $comment,$getEachVideoComments);
        }
        $likeCount = array();
        $disLikeCount = array();
        foreach ($getEachVideoComments as $key => $value) {
           array_push($likeCount, count($value->getLikeCountOnComment));
           array_push($disLikeCount, count($value->getDislikeCountOnComment));
        }
        Session::put('commentCount', $commentCount);
        $data['getUserAllComments'] = $comment;
        $data['likes'] =  $likeCount;
        $data['dislikes'] =  $disLikeCount;
      
        $content = \View::make('vdopedia.render.profile_comment_page')->with($data);
        $content = $content->render();
        return response()->json(['status'=>true,'html'=>$content,'comment'=>$commentCount],200);
    }

/* return user profile setting page */
    public function profileSetting(Request $request ,$id) {

        $user_id = base64_decode($id);
        $userInfo = User::with('getAllVideos','getAllfavorateVideo')->where('id',$user_id)->first();
        $data['userInfo'] = $userInfo;
        return view('vdopedia.user-profile.profile-setting')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* User profile data update */
    public function update(Request $request) {
        
        $user_id = $request->user_id;
        $userInfo = User::where('id',$user_id)->first();
        $rules =  [
            'username' => 'required|alpha_num|unique:users,name,'.$userInfo->name,
            'email' => 'required|email|unique:users,email,'.$user_id,
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'sex' => ['required', 'string', 'max:30'],
            'age' => ['required', 'numeric', 'max:200'],
            'bio_description' =>'nullable',
            'privacy'=>'required',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:102400',
            'website_url' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            
        ];
        $messages = [
            'profile_image.mimes' => 'Profile image must be in valid format.',
            'age.numeric' => 'Age  must be in numric format.',
            'background_image.mimes' => 'Background image must be in valid format.',
            'website.regex' => 'website url must be in valid.',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }else {
            DB::beginTransaction();
            try {

                $updateProfileData =  User::where('id',$user_id)->first();
                $updateProfileData->name = $request->username;
                // $updateProfileData->email = $request->email;
                $updateProfileData->bio_description = $request->bio_description;
                $updateProfileData->mobile = $request->mobile;
                $updateProfileData->sex = $request->sex;
                $updateProfileData->age = $request->age;
                $updateProfileData->website_url = $request->website_url;
                $updateProfileData->privacy = $request->privacy;

                if($request->hasFile('profile_image')) {
                    $uploadedFile = $request->file('profile_image');
                    $filename = time().$uploadedFile->getClientOriginalName();
                    $filePath =  Storage::disk('public')->putFileAs(
                        'profile_image',
                        $uploadedFile,
                        $filename
                      );
                    $updateProfileData->profile_image = $filePath;
                }
                if($request->hasFile('background_image')) {
                    $uploadedBackgroundFile = $request->file('background_image');
                    $filename = time().$uploadedBackgroundFile->getClientOriginalName();
                    $imagePath =  Storage::disk('public')->putFileAs(
                        'background_image',
                        $uploadedBackgroundFile,
                        $filename
                      );
                    $updateProfileData->background_image = $imagePath;
                }

                $updateProfileData->save();
                DB::commit();
                return response()->json(['status'=>true,'msg'=>'User profile updated successfully !!.']);
            }catch(\Exception $e) {
                DB::rollback();
                return response()->json(['status'=>'exception','msg'=>'Profile Not Updated.']);
            }
        }
    }

/*password update*/

    public function PasswordUpdate(Request $request) {
       // dd($request->all());
        $user_id = $request->user_id;
        $userDetails=User::where('id',$user_id)->first();
            $rules =  [
                'old_password' => ['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/', 'string', 'min:8',],
                'password' => ['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required','regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/', 'string', 'min:8', 'same:password'],
            ];
            $messages = [
                'password.regex'=>'Password must be combination of one digit,lower case ,one special chars and one uppercase allowed.',
                'old_password.regex'=>'Password must be combination of one digit,lower case ,one special chars and one uppercase allowed.',
                'old_password.min'=>'Password must be 8 chars long.',
                'password.min'=>'Password must be 8 chars long.',
                'password.confirmed'=>'Password did not match from the above password.',
                'password_confirmation.required'=>'Password confirmation field required.',
                'password_confirmation.same'=>'Password did not match from the above password.',
            ];
        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }

         if(!Hash::check($request->old_password, $userDetails->password)){
          return response()->json(['status'=>'old_password','msg'=>'Old Password did not match']);
    }else{
       if(!empty($request->password)){
            $userUpdatePassword = User::where('id',$user_id)->update([
                'password' =>bcrypt($request->password)
            ]);
        }        
        return response()->json(['status'=>true,'msg'=>'Password have been changed Succefully.']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /* profile video delete */
    public function videoDelete(Request $request) {
        $video_id = $request->video_id;
        $videoDelete = Video::with('getTags','getMetaTitle','getFavorateVideo','getcomments')
                            ->where('id',$request->video_id)->first();
        $videoDelete->delete();
        $videoDelete->getMetaTitle()->delete();
        $videoDelete->getFavorateVideo()->delete();
        $videoDelete->getcomments()->delete();
  
        $user_id = Auth::user()->id;
        $data['userInfo'] = $userInfo = User::with('getAllVideos','getAllfavorateVideo')
                                            ->where('id',$user_id)
                                            ->first();
      
        $content = \View::make('vdopedia.render.my-video')->with($data);
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true,
            'video_count'=>count($userInfo->getAllVideos),
        ],200);
    }

    /*profile info show authorization check*/
    public function profileInfoShowAuthentication(Request $request) {
        $user_id = $request->user_id;
        $data['user'] = $user = User::where('id',$user_id)->first();
        $data['code'] = $code  = mt_rand(100000,999999);
        $updateUserData = User::where('id',$user_id)->update(['verify_code'=>$code]);
        $user->notify(new ProfileInfoShowAuthentication($user,$code));
        return response()->json(['status'=>true,'msg'=>'Verification code send to your mail.']);

    }

    /*verification code check*/

    public function VerificationCheck(Request $request) {
        $key = $request->key;
        $user_id = $request->user_id;
        $userInfo = User::where('id',$user_id)->first();
        if($key==$userInfo->verify_code) {
            $updateUserData = User::where('id',$user_id)->update(['verify_code'=>'']);
            return response()->json(['status'=>true,'msg'=>'Verify successfully !!']);
        }else{
            return response()->json(['status'=>false,'msg'=>'Your Verify Code Not Match !!']);
        }
    }
}
