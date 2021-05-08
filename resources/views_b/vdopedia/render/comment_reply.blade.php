<div class="main-comment showmore_one" style="overflow-y: scroll; max-height:600px;">
    @foreach($getAllComment as $comment)
      <div class="media-object stack-for-small">
        @if(empty($comment->parent_id))
        <div class="media-object-section comment-img text-center">
            <div class="comment-box-img">
                <img src= "{{ asset('storage') }}/{{ $comment->user->profile_image }}" alt="comment">
            </div>
        </div>
        @endif
        <div class="media-object-section comment-desc">
            @if(empty($comment->parent_id))
                <div class="comment-title">
                    <span class="name"><a href="{{ url('/profile/'.base64_encode($comment->user->id)) }}">{{ ucfirst($comment->user->name) }}</a> Said:</span>
                    <span class="time float-right"><i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div class="comment-text">
                    <p>{{ $comment->comment_description }}</p>
                </div>
                <div class="comment-btns">
                    <span>
                        <a class="secondary-button class-like comment_likes" id="setColorOfLike{{ $comment->id }}" 
                            @foreach($comment->getLikeAndDislike as $likes)
                                @if((Auth::user()->id == $likes->user_id ) && ($likes->likes == 1))
                                   style="background:#ec5840;"
                                @endif 
                            @endforeach
                         data-thumb="likes" data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $comment->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> <span id="id-likes{{ $comment->id }}">{{ count($comment->getLikeCountOnComment) }}</span>|
                        <a  class="secondary-button class-like comment_likes" id="setColorOfDislike{{ $comment->id }}" 
                            @foreach($comment->getLikeAndDislike as $dislikes)
                                @if((Auth::user()->id == $dislikes->user_id ) && ($dislikes->dislikes == 1))
                                   style="background:#ec5840;"
                                @endif 
                            @endforeach
                        data-thumb="dislikes"  data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $comment->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a><span id="id-dislikes{{ $comment->id }}">{{ count($comment->getDislikeCountOnComment) }}</span>
                    </span>
                    
                      <span><a class="reply-class" data-reply="no" data-id="{{ $comment->id }}" data-user_id="{{ Auth::user()->id }}" data-video_id="{{ $comment->video_id }}" data-image="{{ asset('storage') }}/{{ Auth::user()->profile_image }}" data-parent_id="{{ $comment->id }}"><i class="fa fa-share"></i>Reply</a></span>
                </div>
            @endif
            <!--sub comment-->
        @if((!empty($comment->getReplies)))
            @foreach($comment->getReplies as $reply)
            <div class="media-object stack-for-small reply-comment">
                <div class="media-object-section comment-desc">
                    <div class="media-object stack-for-small reply-comment">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "{{ asset('storage') }}/{{ $reply->user->profile_image }}" alt="comment">
                            </div>
                        </div>
                        <div class="media-object-section comment-desc">
                            <div class="comment-title">
                                <span class="name"><a href="#">{{ ucfirst($reply->user->name) }}</a> Said:</span>
                                <span class="time float-right"><i class="fa fa-clock-o"></i>{{ $reply->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="comment-text">
                                <p>{{ ucfirst($reply->comment_description) }}</p>
                            </div>
                            <div class="comment-btns">
                                <span>
                                <a class="secondary-button class-like"id="setColorOfLike{{ $reply->id }}" 
                                @foreach($reply->getLikeAndDislike as $likes)
                                    @if((Auth::user()->id == $likes->user_id ) && ($likes->likes == 1))
                                       style="background:#ec5840;"
                                    @endif 
                                @endforeach 



                                data-thumb="likes" data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $reply->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> <span id="id-likes{{ $reply->id }}">{{ count($reply->getLikeCountOnComment) }}</span>|
                                <a  class="secondary-button class-like"id="setColorOfDislike{{ $reply->id }}" 
                                @foreach($reply->getLikeAndDislike as $dislikes)
                                    @if((Auth::user()->id == $dislikes->user_id ) && ($dislikes->dislikes == 1))
                                       style="background:#ec5840;"
                                    @endif 
                                @endforeach
                                data-thumb="dislikes"  data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $reply->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a><span id="id-dislikes{{ $reply->id }}">{{ count($reply->getDislikeCountOnComment) }}</span>
                            </span>
                                
                                <span><a class="reply-class" data-name="{{ ucfirst($reply->user->name) }}" data-id="{{ $reply->video_id }}" data-user_id="{{ Auth::user()->id}}" data-image="{{ asset('storage') }}/{{  Auth::user()->profile_image }}" data-video_id="{{ $reply->video_id }}" data-reply="yes" data-parent_id="{{ $reply->id }}"><i class="fa fa-share"></i>Reply</a></span>
                            </div>
                        </div>
                    </div><!-- end sub comment -->
                </div>
            </div><!-- end sub comment -->
            @endforeach
        @endif
        </div>
    </div>
   
    @endforeach
</div>
<!-- End main comment -->