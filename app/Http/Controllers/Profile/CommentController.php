<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use App\Models\CommentLikeAndDislike;
use Validator;
use DB;
use Carbon\Carbon;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* return all comment on video  */
    public function getComment(Request $request)
    {
       if(!empty($request->video_id)) {
            $data['getAllComment']=$getAllComment =CommentModel::with('getReplies','getUser','getVideoInfo')
                                        //->where('user_id',$request->user_id)
                                        ->where('video_id',$request->video_id)
                                        ->orderBy('created_at','DESC')
                                        ->get();
            $data['replyView']= $replyView =CommentModel::with('getReplies','getUser','getVideoInfo')
                                    //->where('user_id',$request->user_id)
                                    ->where('video_id',$request->video_id)
                                    ->first();
       }else {
            $data['getAllComment']=$getAllComment =CommentModel::with('getReplies','getUser','getVideoInfo')
                                        ->where('user_id',$request->user_id)
                                        //->where('video_id',$request->video_id)
                                        ->orderBy('created_at','DESC')
                                        
                                        ->get();
             $data['replyView']=$replyView =CommentModel::with('getReplies','getUser','getVideoInfo')
                                    ->where('user_id',$request->user_id)
                                    //->where('video_id',$request->video_id)
                                    ->first();
        }
        
        $content = \View::make('vdopedia.render.comment_reply')->with($data);
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true,
            'comment'=>count($getAllComment),
        ],200);
    }


    /*reply view*/
    public function replyView(Request $request) {
        $replyView = CommentModel::with('getReplies','getUser','getVideoInfo')->where('user_id',$request->user_id)
                                  ->where('video_id',$request->video_id)->first();
        $content = \View::make('vdopedia.user-profile.reply',compact('replyView'));
        $content = $content->render();
        return response()->json([
            'html'=> $content,
            'status'=>true,
            'reply'=>$request->reply,
        ],200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /* store comment*/
    public function commentStore(Request $request) {
        $rules =  [
            'comment' => 'required',
        ];
        $messages = [
            'comment.required' => 'comment field required.',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }else {
            DB::beginTransaction();
            try {
                $commentData = new CommentModel();
                $commentData->user_id = $request->user_id;
                $commentData->video_id = $request->video_id;
               // $commentData->parent_id = $request->parent_id;
                $commentData->comment_date = Carbon::now();
                $commentData->comment_description = $request->comment;
                $commentData->save();
                DB::commit();
                return response()->json(['status'=>true,'data'=>$commentData],200);
            }catch(\Exception $e) {
                DB::rollback();
                return response()->json(['status'=>'exception','msg'=>'Something Went Wrong !!.']);
            }
        }
    }

    /* reply comment store */
    public function replyCommentSection(Request $request) {
        //dd($request->all());
        $rules =  [
            'comment' => 'required',
        ];
        $messages = [
            'comment.required' => 'comment field required.',
        ];
        $validator = Validator::make($request->all(),$rules, $messages);

        if($validator->fails()) {
            return response()->json(['error'=>$validator->errors(),'status'=>false]);
        }else {
            DB::beginTransaction();
            try {
                $commentData = new CommentModel();
                $commentData->user_id = $request->user_id;
                $commentData->video_id = $request->video_id;
                $commentData->parent_id = $request->parent_id;
                $commentData->comment_date = Carbon::now();
                $commentData->comment_description = $request->comment;
                $commentData->save();
                DB::commit();
                return response()->json(['status'=>true,'data'=>$commentData],200);
            }catch(\Exception $e) {
                DB::rollback();
                return response()->json(['status'=>'exception','msg'=>'Something Went Wrong !!.']);
            }
        }
    }

    /*comment like and dislike*/
    public function commentLikeDislikeAjaxRequest(Request $request) {
        $comment_id = $request->comment_id;
        $user_id = $request->user_id;
        $thumb = $request->thumb;
        $data = array('user_id'=> $user_id);
        if($thumb == 'likes') {
            $likeData = CommentLikeAndDislike::where('comment_id',$comment_id)->where('user_id',$user_id)->first();
            if(!empty($likeData)) {
                $likeDataUpdate =  CommentLikeAndDislike::where('comment_id',$comment_id)
                                                ->where('user_id',$user_id)
                                                ->update(['likes'=> 1,'dislikes'=>0]);
                $comment_id =  $likeData->comment_id;
                $getCount = CommentLikeAndDislike::where('comment_id',$comment_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
            }else {
             
                $userLike = new CommentLikeAndDislike();
                $userLike->user_id = $user_id;
                $userLike->comment_id = $comment_id;
                $userLike->likes = 1;
                $userLike->dislikes = 0;
                $userLike->save();
                $getCount = CommentLikeAndDislike::where('comment_id',$comment_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
                $comment_id = $userLike->comment_id;
            }
            return response()->json(['status'=>true,'thumb'=>'likes','data'=>$getCount,'comment_id'=>$comment_id],200);
        }else if($thumb == 'dislikes'){
            $likeData = CommentLikeAndDislike::where('comment_id',$comment_id)->where('user_id',$user_id)->first();

            if(!empty($likeData)) {
                $likeDataUpdate =  CommentLikeAndDislike::where('comment_id',$comment_id)
                                                ->where('user_id',$user_id)
                                                ->update(['likes'=> 0,'dislikes'=>1]);
                $comment_id =  $likeData->comment_id;
                
                $getCount = CommentLikeAndDislike::where('comment_id',$comment_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
                
            }else {
                $userLike = new CommentLikeAndDislike();
                $userLike->user_id = $user_id;
                $userLike->comment_id = $comment_id;
                $userLike->likes = 1;
                $userLike->dislikes = 0;
                $userLike->save();
                $getCount = CommentLikeAndDislike::where('comment_id',$comment_id)
                                        ->select(DB::raw('SUM(likes) as likes'),DB::raw('SUM(dislikes) as dislikes'))
                                        ->get();
                $comment_id = $userLike->comment_id;
            }            
            return response()->json(['status'=>true,'thumb'=>'dislikes','data'=>$getCount,'comment_id'=>$comment_id],200);
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
    public function update(Request $request, $id)
    {
        //
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
}
