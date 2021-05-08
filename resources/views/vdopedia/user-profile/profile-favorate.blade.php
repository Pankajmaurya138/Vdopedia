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
                            <span class="show-for-sr">Current: </span> Favorate Videos
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
                <a  class="active" href="{{ url('profile/favorate/videos/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-heart"></i>Favorite Videos
                    <span class="float-right" id="fav_videos">{{ count($userInfo->getAllfavorateVideo) }}</span>
                </a>
            </li>
	        <li class="clearfix">
                <a  href="{{ url('profile/follower/'.base64_encode(Auth::user()->id)) }}">
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
                    <h4>My Favorate Videos</h4>
                </div>
                <div id="id-favorate">
                    @foreach($faVideos as $video)
                        <div class="profile-video">
                            <div class="media-object stack-for-small">
                                <div class="media-object-section media-img-content">
                                    <div class="video-img">
                                        <img src="{{asset('storage')}}/{{ $video->getVideoInfo->image_file }}" alt="{{substr($video->getVideoInfo->title,0,20) }} image">
                                    </div>
                                </div>
                                <div class="media-object-section media-video-content">
                                    <div class="video-content">
                                        <h5><a href="{{ url('/video/watch/'.base64_encode($video->getVideoInfo->id)) }}">{{  $video->getVideoInfo->title }}</a></h5>
                                        <p>{{  $video->getVideoInfo->description }}</p>
                                    </div>
                                    <div class="video-detail clearfix">
                                        <div class="video-stats">
                                            <span><i class="fa fa-check-square-o"></i>published</span>
                                            <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse( $video->getVideoInfo->upload_date)->format('d-M-Y') }}</span>
                                            <span><i class="fa fa-eye"></i> {{  custom_number_format($video->getVideoInfo->view) }}</span>
                                        </div>
                                        <div class="video-btns">
                                            <button type="submit" data-unfavorate_id="{{ $video->id }}" id="unfavorate" name="unfav"><i class="fa fa-heart-o"></i>Unfavorite</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
              {!! $faVideos->links() !!}
                {{-- <div class="show-more-inner text-center">
                    <a href="#" class="show-more-btn">show more</a>
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
        unFavorate:function(data) {
            $.ajax({
                url: data.action,
                type: 'POST',
                data: data,
            })
            .done(function(res) {
                if(res.status == true) {
                   $('#id-favorate').html('');
                   $('#id-favorate').html(res.html);
                   $('#fav_videos').text('');
                   $('#fav_videos').text(res.fav_video_count);
                   $('#fav_video_count').text('');
                   $('#updateCountOfFavorateVideos').text(res.fav_video_count);
                    swal({
                        title: "Done",
                        text: "UnSubcribe Your Favorate Video",
                        icon: "success",
                        button: "close",
                        timer: 3000,
                    });
                }
            })
            .fail(function(res) {
               alert('somenting went wrong');
            })
            .always(function(res) {
                console.log("complete");
            });
        },
    }

    $(document).on('click','#unfavorate',function() { 
        var unfavId  = $(this).data('unfavorate_id');
        var _token = "{{ csrf_token() }}";
        var action = "{{ route('profile.unfavorate') }}";
        data = { unfavId:unfavId,_token:_token,action:action,target:'#id-favorate'};

        obj.unFavorate(data);
    });
</script>
@endsection