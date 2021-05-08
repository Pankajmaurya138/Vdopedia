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
                            <span class="show-for-sr">Current: </span> Videos
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
                <a class="active" href="{{ url('profile/video/'.base64_encode(Auth::user()->id))}}">
                    <i class="fa fa-video-camera"></i>Videos 
                    <span class="float-right class-getAllVideos">{{ count($userInfo->getAllVideos) }}</span>
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
                <a  href="{{ url('profile/comments/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-comments-o"></i>comments
                    <span class="float-right">{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</span>
                </a>
            </li>
            <li class="clearfix">
                <a href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-gears"></i>Profile Settings
                </a>
            </li>
            <li class="clearfix">
                <a  href="{{ url('profile/password/change/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-key"></i>Password Change
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
<div class="large-8 columns profile-inner">
    <!-- single post description -->
    <section class="profile-videos">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="heading">
                    <i class="fa fa-video-camera"></i>
                    <h4>My Videos</h4>
                </div>
                <div id="profile_video">
                    @foreach($videos as $video)
                        <div class="profile-video showmore_content">
                            <div class="media-object stack-for-small">
                                <div class="media-object-section media-img-content">
                                    <div class="video-img">
                                        <img src="{{asset('storage')}}\{{ $video->image_file }}" alt=" {{ substr($video->title,0,20) }} video thumbnail">
                                    </div>
                                </div>
                                <div class="media-object-section media-video-content">
                                    <div class="video-content">
                                        <h5><a href="{{ url('/video/watch/'.base64_encode($video->id)) }}">{{ $video->title }}</a></h5>
                                        <p>{{ $video->description }}</p>
                                    </div>
                                    <div class="video-detail clearfix">
                                        <div class="video-stats">
                                            <span><i class="fa fa-check-square-o"></i>published</span>
                                            <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($video->upload_date)->format('d-M-Y') }}</span>
                                            <span><i class="fa fa-eye"></i> {{ custom_number_format($video->view) }}</span>
                                        </div>
                                        <div class="video-btns">
                                            <a class="video-btn" data-toggle="tooltip" data-placement="bottom" title="edit the video" href="{{ url('upload/video/edit/'.base64_encode($video->id)) }}"><i class="fa fa-pencil-square-o"></i>edit</a>
                                            
                                            <button ata-toggle="tooltip" data-placement="bottom" title="delete the video" type="submit" data-video_id="{{ $video->id }}" id="id-delete" name="delete"><i class="fa fa-trash"></i>delete</button>
                                            <div class="profile-share">
                                                <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="{{ url('/video/watch/'.base64_encode($video->id)) }}" data-easyshare-image="{{asset('storage').'/'.$video->image_file}}" data-easyshare-title="{{$video->title}}" data-easyshare-description="{{$video->description}}">
                                                    <!-- Facebook -->
                                                    <button data-easyshare-button="facebook">
                                                        <span class="fa fa-facebook" style="color: blue; padding-right: 20px;"></span>
                                                    </button>
                                                    
                                                   {{--  <span data-easyshare-button-count="facebook">0</span> --}}

                                                    <!-- Twitter -->
                                                    <button data-easyshare-button="twitter" data-easyshare-tweet-text="vdopedia  is sharing the video.">
                                                        <span class="fa fa-twitter" style="color: #00acee; padding-right: 20px;"></span>
                                                        {{-- <span>Tweet</span> --}}
                                                    </button>
                                                    {{-- <span data-easyshare-button-count="twitter">0</span> --}}

                                                    <!-- Google+ -->
                                                    <button data-easyshare-button="google">
                                                        <span class="fa fa-google-plus" style="color: #dd4b39; padding-right: 20px;"></span>
                                                        {{-- <span>+1</span> --}}
                                                    </button>
                                                    {{-- <span data-easyshare-button-count="google">0</span> --}}

                                                    {{-- <div data-easyshare-loader>Loading...</div> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                     <hr>  
                            {!! $videos->links() !!}
                </div>
               {{--  <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-video">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section media-img-content">
                            <div class="video-img">
                                <img src="http://placehold.it/170x150" alt="video thumbnail">
                            </div>
                        </div>
                        <div class="media-object-section media-video-content">
                            <div class="video-content">
                                <h5><a href="#">There are many variations of passage.</a></h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                            </div>
                            <div class="video-detail clearfix">
                                <div class="video-stats">
                                    <span><i class="fa fa-check-square-o"></i>published</span>
                                    <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                    <span><i class="fa fa-eye"></i>1,862K</span>
                                </div>
                                <div class="video-btns">
                                    <a class="video-btn" href="#"><i class="fa fa-pencil-square-o"></i>edit</a>
                                    <a class="video-btn" href="#"><i class="fa fa-trash"></i>delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section><!-- End single post description -->
</div>
<?php

      function custom_number_format($n,$precision = 1) {
       
            if ($n < 900) {
            // Default
             $n_format = number_format($n);
            } else if ($n < 10000) {
            // Thausand
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n < 100000) {
            // Million
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n < 1000000) {
            // Billion
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n >= 1000000) {
            // Trillion
            $n_format = number_format($n / 1000000, $precision). 'M';
        }
        return $n_format;
    }
 ?>
@endsection
@section('script')
<script type="text/javascript">
    var obj = {
        videoDelete:function(data) {
            $.ajax({
                url: data.action,
                type: 'POST',
                data: data,
            })
            .done(function(res) {
                if(res.status == true) { 
                    $('#profile_video').html('');
                    $('#profile_video').html(res.html);
                    $('.class-getAllVideos').text('');
                    $('.class-getAllVideos').text(res.video_count);
                    $('#updateCountOfAllVideos').text('');
                    $('#updateCountOfAllVideos').text(res.video_count);
                    swal({
                        title: "Done",
                        text: "Video File Deleted Successfully.",
                        icon: "success",
                        button: "close",
                        timer: 3000,
                    });
                }
            })
            .fail(function(res) {
               alert('somenting went wrong');
            })
            
        },
    }

    $(document).on('click','#id-delete',function() { 
        var video_id  = $(this).data('video_id');
        var _token = "{{ csrf_token() }}";
        var action = "{{ route('profile.videoDelete') }}";
        data = { video_id:video_id,_token:_token,action:action};
        obj.videoDelete(data);
    });
    jQuery(document).ready(function(){
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection