<div class="main-comment " style="overflow-y: scroll; max-height: 500px;">
    @foreach($getUserAllComments as $comment)
        @foreach($comment as $getCmnt)
            @if(!empty($getCmnt))
            <div class="media-object stack-for-small">
                @if(empty($getCmnt->parent_id))
                    <div class="media-object-section comment-img text-center">
                        <div class="comment-box-img">
                            <img src= "@if(!empty($getCmnt->user->profile_image)) {{ asset('storage') }}/{{ $getCmnt->user->profile_image }} @else {{ asset('storage').'/images/user.png' }} @endif" alt="profile image">
                        </div>
                    </div>
                @endif
                <div class="media-object-section comment-desc">
                @if(empty($getCmnt->parent_id))
                    <div class="comment-title">
                        <span class="name"><a href="{{ url('/profile/'.base64_encode($getCmnt->user->id)) }}">{{ ucfirst($getCmnt->user->name) }}</a> Said:</span>
                        <span class="time float-right"><i class="fa fa-clock-o"></i>{{ $getCmnt->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="comment-text">
                        <p>{{ $getCmnt->comment_description }}</p>
                    </div>
                    <div class="comment-btns">
                        <span>
                            <a class="secondary-button class-like" id="setColorOfLike{{ $getCmnt->id }}" 
                                @foreach($getCmnt->getLikeAndDislike as $likes)
                                    @if((Auth::user()->id == $likes->user_id ) && ($likes->likes == 1))
                                       style="background:#ec5840;"
                                    @endif 
                                @endforeach
                             data-thumb="likes" data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $getCmnt->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> <span id="id-likes{{ $getCmnt->id }}">{{ count($getCmnt->getLikeCountOnComment) }}</span>|

                            <a  class="secondary-button class-like" id="setColorOfDislike{{ $getCmnt->id }}"
                                @foreach($getCmnt->getLikeAndDislike as $dislikes)
                                    @if((Auth::user()->id == $dislikes->user_id ) && ($dislikes->dislikes == 1))
                                        style="background:#ec5840;"
                                    @endif 
                                @endforeach
                             data-thumb="dislikes"  data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $getCmnt->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a><span id="id-dislikes{{ $getCmnt->id }}">{{ count($getCmnt->getDislikeCountOnComment) }}</span>
                        </span>
                          <span><a class="reply-class" data-reply="no" data-id="{{ $getCmnt->id }}" data-user_id="{{ Auth::user()->id }}" data-video_id="{{ $getCmnt->video_id }}" data-image="{{ asset('storage') }}/{{ Auth::user()->profile_image }}" data-parent_id="{{ $getCmnt->id }}"><i class="fa fa-share"></i>Reply</a></span>
                    </div>
                @endif
                @if((!empty($getCmnt->getReplies)))
                    @foreach($getCmnt->getReplies as $reply)
                        <?php static $i = 1; \Log::info('replycommentError'.print_r($i++,true))?>
                        <div class="media-object stack-for-small reply-comment{{ $i }}">
                            <div class="media-object-section comment-desc">
                                <div class="media-object stack-for-small reply-comment">
                                    <div class="media-object-section comment-img text-center">
                                        <div class="comment-box-img">
                                            <img src= "@if(!empty($reply->user->profile_image)) {{ asset('storage') }}/{{ $reply->user->profile_image }} @else {{ asset('storage').'/images/user.png' }} @endif" alt="profile image">
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
                                           <a class="secondary-button class-like" id="setColorOfLike{{ $reply->id }}" 
                                            @foreach($reply->getLikeAndDislike as $likes)
                                                @if((Auth::user()->id == $likes->user_id ) && ($likes->likes == 1))
                                                    style="background:#ec5840;"
                                                @endif 
                                            @endforeach
                                           data-thumb="likes" data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $reply->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> <span id="id-likes{{ $reply->id }}">{{ count($reply->getLikeCountOnComment) }}</span> |
                                            <a  class="secondary-button class-like" id="setColorOfDislike{{ $reply->id }}"
                                            @foreach($reply->getLikeAndDislike as $dislikes)
                                                @if((Auth::user()->id == $dislikes->user_id ) && ($dislikes->dislikes == 1))
                                                    style="background:#ec5840;"
                                                @endif 
                                            @endforeach
                                            data-thumb="dislikes"  data-user_id="{{ Auth::user()->id }}" data-comment_id="{{ $reply->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a>
                                            <span id="id-dislikes{{ $reply->id }}">{{ count($reply->getDislikeCountOnComment) }}</span>
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
        @endif
        @endforeach
    @endforeach
</div>