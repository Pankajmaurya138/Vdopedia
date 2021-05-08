 <!-- main comment -->
<?php static $i = 0; ?>
@if(isset( $getAllComment))
@foreach( $getAllComment as $comment)
<?php ++$i ?>
<div class="main-comment showmore_one">
    <div class="media-object stack-for-small">
        <?php if($i==1) { ?>
        <div class="media-object-section comment-img text-center">
            <div class="comment-box-img">
                <img src= "{{ asset('storage') }}/{{ $comment->getUser->profile_image }}" alt="comment">
            </div>
        </div>
       <?php } ?>
        <div class="media-object-section comment-desc">
            <?php if($i==1) { ?>
            <div class="comment-title">
                <span class="name"><a href="#">{{ $comment->getUser->name }}</a> Said:</span>
                <span class="time float-right"><i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="comment-text">
                <p>{{ $comment->comment_description }}</p>
            </div>
            <div class="comment-btns">
                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                <span><a class="reply-class" data-reply="no" data-id="{{ $comment->id }}" data-user_id="{{ $comment->user_id }}" data-video_id="{{ $comment->video_id }}" data-parent_id="{{ $comment->id }}"><i class="fa fa-share"></i>Reply</a></span>
                <span class='reply float-right hide-reply'></span>
            </div>
           <?php } ?>
            <div id="add-replyy"></div>
            @if(isset($comment->getReplies))
            	@foreach($comment->getReplies as $reply)
            	<!--sub comment-->
		            <div class="media-object stack-for-small reply-comment">
		                <div class="media-object-section comment-img text-center">
		                    <div class="comment-box-img">
		                        <img src= "{{ asset('storage') }}/{{ $reply->getUser->profile_image }}" alt="comment">
		                    </div>
		                </div>
		                <div class="media-object-section comment-desc">
		                    <div class="comment-title">
		                        <span class="name"><a href="#">{{ $reply->getUser->name }}</a> Said:</span>
		                        <span class="time float-right"><i class="fa fa-clock-o"></i>{{ $reply->created_at->diffForHumans() }}</span>
		                    </div>
		                    <div class="comment-text">
		                        <p>{{ $reply->comment_description }}</p>
		                    </div>
		                    <div class="comment-btns">
		                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
		                        <span><a class="reply-class" data-name="{{ $reply->getUser->name }}" data-id="{{ $reply->video_id }}" data-user_id="{{ $reply->user_id }}" data-image="{{ asset('storage') }}/{{ $reply->getUser->profile_image }}" data-video_id="{{ $reply->video_id }}" data-reply="yes" data-parent_id="{{ $reply->id }}"><i class="fa fa-share"></i>Reply</a></span>
		                        <span class='reply float-right hide-reply'></span>
		                    </div>

		                    <div id="add-reply"></div>
		                    
		                </div>
		            </div><!-- end sub comment -->
            	@endforeach
            @endif
        </div>
    </div>
</div>
{{-- End main comment --}}
@endforeach
@endif

