@extends('layout.app_new')
@section('breadcrumb')
    <!--breadcrumbs-->
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Profile
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
<!--end breadcrumbs-->
@endsection
@section('body-content')
<!-- profile top section -->
<?php 

    if(isset($userInfo->background_image)){
       $url = asset('storage')."/".$userInfo->background_image;
    }
?>
<section class="topProfile" @if(isset($userInfo->background_image))  style="background: url({{ $url }});@endif">
    <div class="main-text text-center">
        <div class="row">
            <div class="large-12 columns">
                
            </div>
        </div>
    </div>
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img">
                    <img src="@if(isset($userInfo->profile_image)){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="profile author image">
                </div>
                <div class="profile-subscribe">
                    <span class="span_getSubsCriber"><i class="fa fa-users"></i>@if(!empty($getSubsCriber)) {{ count($getSubsCriber) }} @else 0 @endif</span>
                    <button type="submit" name="subscribe">subscribe</button>
                </div>
                <div class="profile-share">

                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="{{ url('/profile/'.base64_encode($userInfo->id)) }}">
                        <!-- Facebook -->
                        <button data-easyshare-button="facebook">
                            <span class="fa fa-facebook" style="color: white; padding-right: 20px;"></span>
                        </button>
                        
                       {{--  <span data-easyshare-button-count="facebook">0</span> --}}

                        <!-- Twitter -->
                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
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

                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h2>@if(isset($userInfo->name)){{ucfirst($userInfo->name)}} @endif</h2>
                        <p>Join Date : <span>@if(isset($userInfo->created_at)){{ \Carbon\Carbon::parse($userInfo->created_at)->format('d-M-Y') }} @endif </span></p>
                    </div>
                    <div class="profile-author-stats float-right">
                        <ul class="menu">
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">@if(isset($userInfo->getAllVideos)){{ count($userInfo->getAllVideos) }}@endif</p>
                                    <span>Videos</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">@if(isset($userInfo->getAllfavorateVideo)){{ count($userInfo->getAllfavorateVideo) }}@endif</p>
                                    <span>favorites</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text" class="span_getSubsCriber">@if(!empty($getSubsCriber)) {{ count($getSubsCriber) }} @else (0) @endif</p>
                                    <span>followers</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</p>
                                    <span>comments</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End profile top section -->
<div class="row">
    <!-- left side content area -->
    <div class="large-8 columns">
        <!-- single post description -->
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <i class="fa fa-user"></i>
                        <h4>Description</h4>

                       {{--  <h4 class="pull-right"><i class="fa fa-users"></i>SUBCRIBED <span>(@if(!empty($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }} @else 0 @endif)</span></h4> --}}
                       <h4 class="pull-right" id="id-profilesubscribe" ><i class="fa fa-users"></i>
                            <div class="subscribe" id="subscribe_add" style="float: right;" >
                                    <button  id="id-subscribe"
                                     <?php
                                    
                                    if(isset($userInfo->getAllSubscriber )) {
                                        foreach ($userInfo->getAllSubscriber as $key => $value) {
                                            if(!empty(Auth::user()->id)) {
                                                if(($value->subscriber_id == Auth::user()->id) && $value->subscribe_status =='yes' ) {
                                           
                                    ?>
                                       style="background-color:#e96969;padding: 6px;border-radius: 5px;color: white;"  data-status="yes" <?php }  }}}   ?>data-status="no" style="padding: 6px;border-radius: 5px;background-color:#e96969;color: white;" class="class-subscribe" data-user_id="{{$userInfo->id }}" name="subscribe"> 
                                    @if(!empty(Auth::user()->id))

                                            @if(count($userInfo->getAllSubscriber)<=0)
                                                SUBSCRIBE
                                            @elseif(empty($checkuserSubscribeThisUserOrNot))
                                             SUBSCRIBE
                                            @endif
                                        @if(count($userInfo->getAllSubscriber ) > 0)
                                            @foreach ($userInfo->getAllSubscriber as $key => $value) 

                                                    @if($value->subscriber_id == Auth::user()->id )
                                                        @if($value->subscribe_status =='yes')
                                                        SUBSCRIBED
                                                       @endif
                                                         @if($value->subscribe_status =='no') 
                                                            SUBSCRIBE
                                                         @endif
                                                        @elseif($value->subscriber_id != Auth::user()->id)
                                                            @if(empty($value->subscribe_status))
                                                                SUBSCRIBE
                                                            @endif
                                                    @endif
                                             @endforeach
                                         @endif
                                         {{-- @if(empty($userInfo->getAllSubscriber)<=0)
                                          SUBSCRIBE
                                          
                                         @endif --}}
                                    @endif
                                        @if(empty(Auth::user()->id))         
                                            SUBSCRIBE
                                        @endif

                                       </button>
                                       <span class="class_getSubsCriber">@if(!empty($getSubsCriber)) ({{ count($getSubsCriber) }}) @else (0) @endif</span>
                            </div>
                        </h4>
                    </div>
                    <div class="description">
                        <p>@if(isset($userInfo->bio_description)){{ $userInfo->bio_description }}@endif</p>

                        <div class="site profile-margin">
                            <button><i class="fa fa-globe"></i>Site</button>
                            <a href="{{isset($userInfo->website_url)?$userInfo->website_url:''}}" class="inner-btn">{{isset($userInfo->website_url)?$userInfo->website_url:''}}</a>
                        </div>
                        <div class="email profile-margin" >
                            <button  ><i class="fa fa-envelope"  ></i>Email </button> <button id="userInfoEmail" data-user_id="{{isset(Auth::user()->id) ? Auth::user()->id:''}}">click here to see email</button>
                            <span class="inner-btn show_info" style="display: none;">@if(isset($userInfo->email)){{ $userInfo->email }}@endif</span>
                        </div>
                        @if(isset($userInfo->privacy))
                            @if($userInfo->privacy == 'yes')
                            @if(isset(Auth::user()->id))
                                <div class="phone profile-margin">
                                    <button><i class="fa fa-phone"></i>Phone</button>
                                    <span class="inner-btn">@if(isset($userInfo->mobile)){{ $userInfo->mobile }}@endif</span>
                                </div>
                            @endif
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </section><!-- End single post description -->

        <!-- author videos -->
        <section class="content content-with-sidebar margin-bottom-10">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="row column head-text clearfix">
                        <h4 class="pull-left"><i class="fa fa-video-camera"></i>Videos</h4>
                        <div class="grid-system pull-right show-for-large">
                            <a class="secondary-button current  grid-default" href="#"><i class="fa fa-th"></i></a>
                            <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                            <a class="secondary-button  list"  href="#"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                    <div class="tabs-content" data-tabs-content="newVideos">
                        <div class="tabs-panel is-active" id="new-all">
                            <div class="row list-group">
                                @if(isset($videos))
                                    @foreach($videos as $video)
                                        <div class="item large-4 medium-6 columns grid-default" style="float: left;">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="{{asset('storage')}}\{{ $video->image_file }}" alt=" {{ $video->title }} new video">
                                                    <a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>@if(isset($video->getFavorateVideo)){{ count($video->getFavorateVideo) }} @endif</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>{{ isset($video->video_length)?$video->video_length:'' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des" >
                                                    <h6><a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="title_justify" >{{ ucfirst($video->title) }}</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="javascript::void(0);">{{ ucfirst($video->getUserInfo->name) }}</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>{{  \Carbon\Carbon::parse($video->upload_date)->format('d-M-Y') }}</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>{{ custom_number_format($video->view) }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p> {{ $video->description }}</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            <hr>  
                            {!! $videos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            

        <!-- followers -->
          <!-- <section class="content content-with-sidebar followers margin-bottom-10">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="row column head-text clearfix">
                        <h4 class="pull-left"><i class="fa fa-users"></i>Followers</h4>
                    </div>
                 <div class="row collapse">
                    @if(isset($userInfo->getAllSubscriber)) 
                        @foreach($userInfo->getAllSubscriber as $subscriber )
                            <div class="large-2 small-6 medium-3 columns" style="float: left;">
                                <div class="follower">
                                    <div class="follower-img">
                                        <img src="@if(!empty($subscriber->subscriberInfo->profile_image)) 
                                        {{ asset('storage') }}/{{$subscriber->subscriberInfo->profile_image }}  
                                        @else 
                                            {{ asset('storage') }} /{{'images/user.png' }}   
                                        @endif"alt="followers">
                                    </div>
                                    <span>{{ ucfirst($subscriber->subscriberInfo->name) }}</span>
                                    {{-- <div class="subscribe" id="add_subscribe"> --}}
                                     <div class="subscribe" id="add_subscribe{{$subscriber->subscriber_id}}">
                                        {{-- @if(isset($userInfo->getSubscriber) && (count($userInfo->getSubscriber))>0)  
                                            <button type="submit"
                                                @foreach($userInfo->getSubscriber as $user_subscription)
                                                    @if($user_subscription->subscriber_id == Auth::user()->id && $user_subscription->subscribe_status =='yes')
                                                        style="background: #e96969;" data-status="yes" @else data-status="no" @endif @endforeach data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow">
                                                    @foreach($userInfo->getSubscriber as $user_subscription )
                                                        @if($user_subscription->subscriber_id == Auth::user()->id && $user_subscription->subscribe_status =='yes')
                                                            SUBSCRIBED
                                                            @else SUBSCRIBE 
                                                        @endif 
                                                    @endforeach


                                            </button> --}}
                                            {{--  @elseif(count($userInfo->getSubscriber)<=0)  --}}
                                        @if(!empty($userInfo->getSubscriber) && (count($userInfo->getSubscriber))>0) 
                                            <button type="submit" 
                                                @foreach($userInfo->getSubscriber as $user_subscription)

                                                    @if(($subscriber->subscriber_id == $user_subscription->user_id) && ($user_subscription->subscribe_status=='yes'))
                                                         data-status="yes" style="background: #e96969;"
                                                    @endif
                                                    @if(($subscriber->subscriber_id == $user_subscription->user_id) && ($user_subscription->subscribe_status=='no'))
                                                        data-status="no"
                                                    @endif
                                                    id="{{ $subscriber->subscriber_id  }}"

                                                @endforeach
                                                data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow" >
                                                @foreach($userInfo->getSubscriber as $user_subscription)
                                                    @if(($subscriber->subscriber_id == $user_subscription->user_id))
                                                        @if($user_subscription->subscribe_status == 'yes')
                                                            SUBSCRIBED
                                                        @endif
                                                        @if($user_subscription->subscribe_status == 'no')
                                                            SUBSCRIBE
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </button>
                                        @endif
                                        @if(empty($userInfo->getSubscriber) && (count($userInfo->getSubscriber))<=0) 
                                            <button type="submit"  id="{{ $subscriber->subscriber_id  }}" data-status="no"  data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow" > SUBSCRIBE</button> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div> 
                </div>
            </div>
        </section>-->
       
    </div><!-- end left side content area -->
    <!-- sidebar -->
    <div class="large-4 columns">
        <aside class="secBg sidebar">
            <div class="row">
                <!-- profile overview -->
                @if(Auth::id() == $userInfo->id)
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Profile Overview</h5>
                        </div>
                        <div class="widgetContent">
                            <ul class="profile-overview">
                                <li class="clearfix"><a href="{{ url('profile/about-me/'.base64_encode($userInfo->id))}}"><i class="fa fa-user"></i>about me</a></li>
                                <li class="clearfix"><a href="{{ url('profile/video/'.base64_encode($userInfo->id))}}"><i class="fa fa-video-camera"></i>Videos <span class="float-right">{{ count($userInfo->getAllVideos) }}</span></a></li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/favorate/videos/'.base64_encode($userInfo->id)) }}">
                                        <i class="fa fa-heart"></i>Favorite Videos
                                        <span class="float-right">{{ count($userInfo->getAllfavorateVideo) }}</span>
                                    </a>
                                </li>
                                <li class="clearfix"><a href="{{ url('profile/follower/'.base64_encode($userInfo->id)) }}"><i class="fa fa-users"></i>Followers<span class="float-right">@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span></a></li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/comments/'.base64_encode($userInfo->id)) }}">
                                        <i class="fa fa-comments-o"></i>comments
                                        <span class="float-right">{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/setting/'.base64_encode($userInfo->id)) }}">
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
                    </div>
                </div><!-- End profile overview -->
                @endif
                <!-- most view Widget -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Most View Videos</h5>
                        </div>
                        <div class="widgetContent">
                            @if(isset($getMostViewVideos))
                                @foreach($getMostViewVideos as $mVideo)
                                    {{-- @if($getVideoInfo->id != $mVideo->id ) --}}
                                        <div class="video-box thumb-border">
                                            <div class="video-img-thumb">
                                                <img src="{{ asset('storage') }}/{{ $mVideo->image_file }}" alt="{{ $mVideo->title }}">
                                                <a href="{{ url('/video/watch/'.base64_encode($mVideo->id)) }}" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                            </div>
                                            <div class="video-box-content">
                                                <h6><a href="{{ url('/video/watch/'.base64_encode($mVideo->id)) }}" class="title_justify" >{{ ucfirst($mVideo->title) }}</a></h6>
                                                <p>
                                                    <span><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($mVideo->user_id)) }}">{{ ucfirst($mVideo->getUserInfo->name) }}</a></span>
                                                    <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($mVideo->upload_date)->format('d-M-Y') }}</span>
                                                    <span><i class="fa fa-eye"></i>{{ custom_number_format($mVideo->view) }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    {{-- @endif --}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div><!-- end most view Widget -->

                <!-- categories -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox clearfix">
                        <div class="widgetTitle">
                            <h5>Categories</h5>
                        </div>
                        <div class="widgetContent">
                            <ul>
                                @if(isset($allCategory))
                                    @foreach($allCategory as $category)
                                        <li class="cat-item"><a href="#">{{ ucfirst($category->name) }}&nbsp; ({{count($category->getCategoryAllVideoCount) }})</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- social Fans Widget -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>social fans</h5>
                        </div>
                        <div class="widgetContent">
                            <div class="social-links">
                                <a class="socialButton" href="https://www.facebook.com/vdopediaofficial/">
                                    <i class="fa fa-facebook"></i>
                                  
                                </a>
                                <a class="socialButton" href="https://twitter.com/vdopedia">
                                    <i class="fa fa-twitter"></i>
                                    
                                </a>
                                <a class="socialButton" href="https://www.instagram.com/vdopedia_/">
                                    <i class="fa fa-instagram"></i>
                                    
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div><!-- End social Fans Widget -->

                <!-- Recent post videos -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Recent post videos</h5>
                        </div>
                        <div class="widgetContent">
                            @if(isset($getRecentVideos))
                                @foreach($getRecentVideos as $rVideo)
                                    {{-- @if($getVideoInfo->id != $rVideo->id ) --}}
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section">
                                                <div class="recent-img">
                                                    <img src= "{{ asset('storage') }}/{{ $rVideo->image_file }}" alt="{{ $rVideo->title }} image">
                                                    <a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}" class="hover-posts">
                                                        <span><i class="fa fa-play"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-object-section">
                                                <div class="media-content">
                                                    <h6><a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}" class="title_justify" >{{ ucfirst($rVideo->title) }}</a></h6>
                                                    <p><i class="fa fa-user"></i>
                                                        <span>{{ ucfirst($rVideo->getUserInfo->name) }}</span>
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>{{ \Carbon\Carbon::parse($rVideo->upload_date)->format('d-M-Y') }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- @endif --}}
                                @endforeach
                            @endif
                            {{-- <div class="media-object stack-for-small">
                                <div class="media-object-section">
                                    <div class="recent-img">
                                        <img src= "http://placehold.it/120x80" alt="recent">
                                        <a href="#" class="hover-posts">
                                            <span><i class="fa fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-object-section">
                                    <div class="media-content">
                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="media-object stack-for-small">
                                <div class="media-object-section">
                                    <div class="recent-img">
                                        <img src= "http://placehold.it/120x80" alt="recent">
                                        <a href="#" class="hover-posts">
                                            <span><i class="fa fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-object-section">
                                    <div class="media-content">
                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="media-object stack-for-small">
                                <div class="media-object-section">
                                    <div class="recent-img">
                                        <img src= "http://placehold.it/120x80" alt="recent">
                                        <a href="#" class="hover-posts">
                                            <span><i class="fa fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-object-section">
                                    <div class="media-content">
                                        <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                        <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div><!-- End Recent post videos -->
        @endif
                <!-- tags -->
                @if(!empty(Auth::user()->id))
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Tags</h5>
                        </div>
                        <div class="tagcloud">
                            @foreach($userInfo->getAllUserTag as $tag)                                
                                <a href="#">{{ ucfirst($tag->name) }}</a>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End tags -->
                @endif
            </div>
        </aside>
    </div><!-- end sidebar -->
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
            <!-- footer -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</script>
    <script type="text/javascript">


    function getAllComment() {
        var user_id = "{{ isset($userInfo->id) ? $userInfo->id:"" }}";
        var video_id = "{{ isset($video->id) ? $video->id:"" }}";
        if(user_id !='' && video_id !=''){
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('getComment') }}';
            var data = {user_id:user_id,video_id:video_id,target:'#add-comment',_token:_token,action:action};
            $.ajax({
                url: action,
                type:"post",
                data: data,
                success:function(r){
                     if(r.status == true) {
                      $('#add-comment').html('');
                      $('#add-comment').html(r.html);                         
                    }
                }
            });
        }
    }
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
                       getAllComment();
                        
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
                        getAllComment();
                    }
                }
            });
        },
        Subscribe:function(data){
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        //console.log(r);
                        if(r.status == true && r.subscription_status=='yes') {
                            $('#subscribe_add').html('');
                            $('#subscribe_add').html('<button type="button" style="background-color:#e96969;padding: 6px;border-radius: 5px;color: white;"  id="id-subscribe"  class="class-subscribe" data-status="yes" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBED </button><span class="class_getSubsCriber">('+r.getSubsCount+')</span>');
                            $('.span_getSubsCriber').text(r.getSubsCount);
                            
                        }else if(r.status == true && r.subscription_status=='no') {

                            $('#subscribe_add').html('');
                            $('#subscribe_add').html('<button type="button"  style="background-color:#e96969;padding: 6px;border-radius: 5px;color: white;"  id="id-subscribe"  class="class-subscribe" data-status="no" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBE </button><span class="class_getSubsCriber"> ('+r.getSubsCount+')</span>');
                             $('.span_getSubsCriber').text(r.getSubsCount);
                        }else if(r.message == 'Unauthenticated') {

                            route = "{{route('login')}}";
                            window.location.href = route;
                        }
                    }
                });
            },
    }
    jQuery(document).ready(function() {
        jQuery(document).on('click','.comment-class',function() {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            //var parent_id =  $(this).data('parent_id');
            var comment =  $('.class-commentText').val();
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('comment') }}';
            var data = {user_id:user_id,video_id:video_id,_token:_token,comment:comment,action:action};
            obj.commentSection(data);
        });
    });

    jQuery(document).ready(function() {
        jQuery(document).on('click','.replyComment',function() {
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

   jQuery(document).ready(function() {
       
       getAllComment();
   });

   
        $(document).on('click','.reply-class', function( e ) {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var image =  $(this).data('image');
            var name =  "{{ isset(Auth::user()->name) ? ucfirst(Auth::user()->name): '' }}";

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

    /* subscribe and un subcribe function */
        $(document).ready(function() {
            $(document).on('click','.class-subscribe',function() {
                var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
                if(checkUserLogin == '') {
                    route = "{{route('login')}}";
                    window.location.href = route;
                }
                var user_id = $(this).data('user_id');
                var status = $(this).data('status');
                var action = '{{ route('subscribed') }}';
                var _token = "{{ csrf_token() }}";
                var data = {user_id:user_id,status:status,_token:_token,target:'#',action:action};
                obj.Subscribe(data);
            });
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
 $(document).ready(function(){
        subscribeButtonHide();
    });
    function subscribeButtonHide() {
        $(document).ready(function(){
            var user_id = "{{ isset($userInfo->id) ? $userInfo->id:'' }}";
            var auth  = "{{ isset(Auth::user()->id)?Auth::user()->id:'' }}";
            if(auth == user_id) {

                $('#id-profilesubscribe').hide();
            }
        });
    }
    /*user random function generator*/

    $(document).on('click','#userInfoEmail',function() {
        var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
        if(checkUserLogin == '') {
            route = "{{url('/login')}}";
            window.location.href = route;
        }else{
             var _token = "{{ csrf_token() }}";
            $.ajax({
                url:"{{route('profileInfoShowAuthentication')}}",
                type:"post",
                data:{_token:_token,user_id:checkUserLogin},
                success:function(res) {
                        $("#testmodal").modal('show');
                    if(res.status == true) {
                        swal({
                            title: "Verification code send to your mail.",
                            input: "text",
                            showCancelButton: true,
                            confirmButtonColor: "#1FAB45",
                            confirmButtonText: "Verify",
                            cancelButtonText: "Cancel",
                            buttonsStyling: true
                        }).then(function () {  
                        var keyInput = $('.swal2-input').val();     
                        $.ajax({
                            type: "post",
                            url: "{{route('VerificationCheck')}}",
                            data: {_token:_token, key: keyInput,user_id:checkUserLogin},
                            cache: false,
                            success: function(r) {
                                if(r.status == true) {
                                    swal({
                                        title: "Success",
                                        text:r.msg,
                                        icon: "success",
                                        button: "close",
                                        timer: 10000,
                                });
                                $('#userInfoEmail').hide();
                                $('.show_info').removeAttr('style','');
                                }else if(r.status == false ) {
                                    swal({
                                        title: "Error",
                                        text:r.msg,
                                        icon: "danger",
                                        button: "close",
                                        timer: 10000,
                                    });
                                } 
                            },
                        });
                    }); 
                }else{
                    swal({
                        title: "Done",
                        text: "Something went wrong.Please contact with VDOPedia Support.",
                        icon: "danger",
                        button: "close",
                        timer: 10000,
                    });
                }
            }

        });
    }

});
    
    </script>
@endsection


