@extends('layout.profile.profile-app')

@section('profile-breadcrumb')

 <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($userInfo->id)) }}">Profile</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> comments
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section><!--end breadcrumbs-->
@endsection

@section('profile-sidebar')

	<div class="widgetContent">
	    <ul class="profile-overview">
	        <li class="clearfix">
                <a  href="{{ url('profile/about-me/'.base64_encode(Auth::user()->id))}}">
                    <i class="fa fa-user"></i>about me
                </a>
            </li>
	        <li class="clearfix">
                <a  href="{{ url('profile/video/'.base64_encode(Auth::user()->id))}}">
                    <i class="fa fa-video-camera"></i>Videos 
                    <span class="float-right">{{ count($userInfo->getAllVideos) }}</span>
                </a>
            </li>
	        <li class="clearfix">
                <a  href="{{ url('profile/favorate/videos/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-heart"></i>Favorite Videos
                    <span class="float-right">{{ count($userInfo->getAllfavorateVideo) }}</span>
                </a>
            </li>
	        <li class="clearfix">
                <a href="{{ url('profile/follower/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-users"></i>Followers
                    <span class="float-right">@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span>
                </a>
            </li>
	        <li class="clearfix">
                <a class="active" href="{{ url('profile/comments/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-comments-o"></i>comments
                    <span class="float-right comment_count_id">(26)</span>
                </a>
            </li>
	        <li class="clearfix">
                <a href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-gears"></i>Profile Settings
                </a>
            </li>
	        <li role="menuitem" class="clearfix">
                <a  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class=" fa fa-sign-out"></i>                           
                   {{ __('logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
            </li>
	    </ul>
	    <a href="{{ route('videoUpload.index') }}" class="button"><i class="fa fa-plus-circle"></i>Submit Video</a>
	</div>

@endsection

@section('user-profile')
 <!-- right side content area -->
<div class="large-8 columns profile-inner">
    <!-- Comments -->
    <section class="content comments">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="main-heading borderBottom">
                    <div class="row padding-14">
                        <div class="medium-12 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-comments"></i>
                                <h4>Comments <span class="comment_count_id">(4)</span></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment-box thumb-border">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section comment-img text-center">
                            <div class="comment-box-img">
                                <img src= "{{asset('storage')}}/{{ $userInfo->profile_image }}" alt="comment">
                            </div>
                            <h6><a href="{{url('/profile/'.base64_encode($userInfo->id)) }}">{{ ucfirst($userInfo->name )}}</a></h6>
                        </div>
                        <div class="media-object-section comment-textarea">
                            <textarea name="commentText" class="class-commentText" placeholder="Add a comment here.."></textarea>
                            <div class="error comment"></div>
                            <input type="submit" data-user_id="{{ $userInfo->id }}" class="comment-class" name="submit" value="send">
                        </div>
                    </div>
                </div>

                <div class="comment-sort text-right">
                    <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                </div>

                <!-- main comment -->
                    <div id="add_comment"></div>
                </div><!-- End main comment -->
            </div>
        </div>
    </section><!-- End Comments -->
</div><!-- end left side content area -->

@endsection


@section('script')
    <script type="text/javascript">
        var obj = {
          commentSection:function(data) {
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                    if(r.status==false) {
                        $('.error').text("");
                        jQuery.each(r.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if(r.status == true) {
                      var comment =  $('.class-commentText').val('');
                       getUserAllComment();
                        
                    }
                }
            });
        },
        replyCommentSection:function(data) {
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                    if(r.status==false) {
                        $('.error').text("");
                        jQuery.each(r.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if(r.status == true) {
                        var comment =  $('.class-textComment').val('');
                        getUserAllComment();
                    }
                }
            });
        },
    }

    jQuery(document).ready(function() {
        jQuery(document).on('click','.comment-class',function() {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var comment =  $('.class-commentText').val();
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('comment') }}';
            var data = {user_id:user_id,video_id:video_id,parent_id:parent_id,_token:_token,comment:comment,action:action};
            obj.commentSection(data);
        });
    });

    /*reply comment store*/
     jQuery(document).ready(function() {
        jQuery(document).on('click','.replyComment',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
            if(checkUserLogin == '') {
                route = "{{url('/login')}}";
                window.location.href = route;
            }
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var comment =  $('.class-textComment').val();
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('replyCommentSection') }}';
            var data = {user_id:user_id,video_id:video_id,parent_id:parent_id,_token:_token,comment:comment,action:action};
            obj.replyCommentSection(data);
        });
    });

     /*get all comment*/
    function getUserAllComment() {
        var user_id = "{{ isset(Auth::user()->id) ? Auth::user()->id:" " }}";
        //var video_id = "{{ isset($getVideoInfo->id) ? $getVideoInfo->id:"" }}";
        if(user_id !=''){
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('getUserAllComments') }}';
            var data = {user_id:user_id,target:'#add_comment',_token:_token,action:action};
            $.ajax({
                url: action,
                type:"post",
                data: data,
                success:function(r){
                     if(r.status == true) {
                      $('#add_comment').html('');
                      $('#add_comment').html(r.html);
                      $('.comment_count_id').text('');                        
                      $('.comment_count_id').text('('+r.comment+')');                        
                    }
                }
            });
        }
    }
    $(document).ready(function(){
        getUserAllComment();
    });

/* reply section part */
    $(document).on('click','.reply-class', function( e ) {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var image =  $(this).data('image');
            var name =  "{{ isset(Auth::user()->name) ? Auth::user()->name: '' }}";

            e.preventDefault();
            $('<div/>').addClass( 'new-text-div' )
            .html( $('<div id="data" class="comment-box  thumb-border"><div class="media-object stack-for-small reply-comment"><div class="media-object-section comment-img text-center"><div class="comment-box-img"><img src="'+image+'" alt="profile author img"></div><h6><a href="#">'+name+'</a></h6></div><div class="media-object-section comment-textarea"><textarea name="comment" class="class-textComment" placeholder="Add a comment here.."></textarea><div class="error comment"></div><input type="submit" class="replyComment" data-user_id="'+user_id+'" data-video_id=" '+video_id+' " data-parent_id="'+parent_id+'" name="comment" value="Reply"> <input type="submit" class="remove_this" value="cancel"> </div></div></div>').addClass( 'someclass' ) )
            .append( $('<button/>'))
            .insertBefore( this );
        });
        $(document).on('click', '.remove_this', function( e ) {
            e.preventDefault();
            $(this).closest( 'div.new-text-div' ).remove();
        });



/*comment like and dislike section*/
    $(document).ready(function() {
        $(document).on('click','.class-like',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
            if(checkUserLogin == '') {
                route = "{{route('login')}}";
                window.location.href = route;
            }else{
                var comment_id = $(this).data('comment_id');
                var user_id ="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                var thumb = $(this).data('thumb');
                var url = "{{ route('comment.ajaxRequest') }}";
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    type:'post',
                    url : url,
                    data: {comment_id:comment_id,thumb:thumb,user_id:user_id,_token:_token},
                    success:function(res){
                        if(res.status == true && thumb == 'likes') {
                            $('#id-likes'+res.comment_id).text(' '+ res.data[0].likes);
                            $('#setColorOfDislike'+res.comment_id).attr('style','');
                            $('#setColorOfLike'+res.comment_id).attr('style','background:#ec5840;');
                            $('#id-dislikes'+res.comment_id).text(' '+ res.data[0].dislikes);
                        }else if(res.status == true && thumb == 'dislikes') {
                            $('#id-likes'+res.comment_id).text(' '+ res.data[0].likes);
                            $('#id-dislikes'+res.comment_id).text(' '+ res.data[0].dislikes);
                            $('#setColorOfLike'+res.comment_id).attr('style','');
                            $('#setColorOfDislike'+res.comment_id).attr('style','background:#ec5840;');
                        }
                    }
                })
            }  
        }); 
    });
</script>
@endsection
