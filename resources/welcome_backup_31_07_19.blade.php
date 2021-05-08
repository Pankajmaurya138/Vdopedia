<?php
 use Rap2hpoutre\FastExcel\FastExcel;
?>

<!doctype html>
<html class="no-js" lang="en">
<style type="text/css">
    .light-off-menu .off-menu li a {
        border-bottom: none;
    }
    .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
</style>
<head>
     @include('layout.header')  
</head>
<body>
    
<div class="off-canvas-wrapper">
  
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper id="rederHtml">
<!--header-->
  <!-- my menu -->
    <header>
                <!--Navber-->
    <section id="navBar">
        <nav class="sticky-container" data-sticky-container>
            <div class="sticky topnav topnav-dark" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #303030;" data-sticky-on="large">
                <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                    <button class="menu-icon sidebarCollapse" type="button" data-toggle="offCanvas"></button>
                    <div class="title-bar-title"><img src="images/logo.jpg" width="164px" alt="logo"></div>
                </div>
                <div class="show-for-large topbar-full topbar-dark clearfix" id="beNav" style="width: 100%;">
                    <div class="top-bar-left btn-toggle">
                        <button type="button" class="sidebarCollapse"><i class="fa fa-bars"></i></button>

                                     <!-- my Menu -->
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        Close<i class="fa fa-window-close" aria-hidden="true"></i>

                    </button>

                </div>
            </nav> -->
<!-- my Menu -->
                </div>
                <div class="top-bar-left toplogo">
                    <ul class="menu">
                        <li class="menu-text">
                            <a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif"><img src="images/logo.jpg" width="164px" alt="logo"></a>
                        </li>
                    </ul>
                </div>
                <div class="top-bar-left topsearch">
                    <div class="search-bar-full">
                        {{-- <form method="get">
                            <div class="input-group">
                                <input class="input-group-field" type="search" placeholder="Enter your keyword here ...">
                                <div class="input-group-button icon-btn">
                                    <input class="button" type="submit" name="submit" value="search">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </form> --}}
                        <form id="search">
                            <div align="center" class="float-left">
                                <input type="search" style="width:500px;" class="search-class typeahead" name="search" placeholder="Seach Here your video">
                            </div>
                           
                        </form>
                    </div>
                </div>
                    <div class="top-bar-left topbtn">
                        <div class="top-button">
                            <ul class="menu float-left" style="margin-top: 5px;" >
                                <li>
                                    <a href="{{ route('videoUpload.index') }}">upload Video</a>
                                </li>
                                @if(!empty(Auth::user()->id))
                                <li class="upl-btn">
                                    <a href="notification" style="text-align: center;"><i class="fa fa-bell"></i></a>
                                </li>
                                <li class="upl-btn">
                                     <ul class="menu vertical medium-horizontal dropdown" data-responsive-menu="drilldown medium-dropdown" role="menubar" data-dropdown-menu="xwxxk2-dropdown-menu" aria-expanded="false" data-is-click="false">
                                            <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-expanded="false" aria-label="features" data-is-click="false">
                                                <a href="#"><i class="fa fa-user"></i></a>
                                                <ul class="submenu menu vertical is-dropdown-submenu first-sub" data-submenu="" data-animate="slide-in-down slide-out-up" aria-hidden="true" role="menu">
                                                    <li >
                                                        <a href="{{ url('profile/'.base64_encode(Auth::user()->id)) }}"><img src="{{ asset('images/profile-bg1.png') }}"  class="img-circle" style="border-radius: 50%;height: 30px; width: 30px;">          Profile</a>
                                                    </li>
                                                    <li >
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                          onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <i class=" fa fa-power-off"></i>                           
                                                           {{              __('logout') }}
                                                       </a>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                           @csrf
                                                       </form>
                                                    </li>
                                                    <li><a href="javascript::void(0);"><i class="fa fa-magic"></i> Lock Screen</a></li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                </li>
                                @endif
                                @if(empty(Auth::user()->id))
                                <li class="dropdown-login">
                                    <a class="loginReg" data-toggle="example-dropdown" href="#">login/Register</a>
                                    <div class="login-form">
                                        <h6 class="text-center">Great to have you back!</h6>
                                        <form method="post" data-abide novalidate action="{{ route('login') }}">
                                @csrf
                                {{-- <div data-abide-error class="alert callout" style="display: none;">
                                    <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                </div> --}}                                        
                                
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                    <input class="input-group-field" name="email" type="text" value="{{ old('email') }}" placeholder="Enter your email" >
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                                
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block error">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                                <div class="checkbox">
                                    <input id="remember" type="checkbox" name="check" value="remember">
                                    <label class="customLabel" for="remember">Remember me</label>
                                </div>
                                <span class="form-error">your email is invalid</span>
                                <button class="button expanded" type="submit">Login Now</button>
                                <p class="loginclick">New Here ? <a href="{{ route('register') }}">Create A New Acoount</a></p>
                            </form>
                                    </div>
                                </li>
                            </ul>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</header><!-- End Header -->
<!-- Sidebar  -->

    <nav id="sidebar">
            <div id="dismiss"> X </div>
            <hr class="hr-border">
           <ul class="vertical menu off-menu" data-responsive-menu="drilldown" style="margin-top:60px">
                    <li class="has-submenu">
                        <a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif"><i class="fa fa-home"></i>Home</a>
                         <a  data-video_status="trending" onclick="increase()" class="trending_videos"><i class="fa fa-fire"></i></i>Trending</a>
                         <input type="hidden" name="number" id="id_number" value="0" >
                        <a><i class="fa fa-fire"></i></i>Following</a>
                    </li>
                    <hr class="hr-border">  
                    <li class="has-submenu" data-dropdown-menu="example1">
                        <a href="#"><i class="fa fa-th"></i>category</a>
                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                             @if(isset($allCategory))
                                @foreach($allCategory as $category)
                                    <li class="cat-item">
                                        <a class="class_category" onclick="increase()" data-category_id="{{ $category->id }}" >{{ ucfirst($category->name) }}&nbsp; ({{count($category->getCategoryAllVideoCount) }})
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    {{-- <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li> --}}
                    <li>
                        <a href="javascript::void(0);"><i class="fa fa-edit"></i>blog</a>
                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                            <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript::void(0);"><i class="fa fa-magic"></i>features</a>
                        {{-- <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                            <li><a href="404.html"><i class="fa fa-magic"></i>404 Page</a></li>
                            <li><a href="archives.html"><i class="fa fa-magic"></i>Archives</a></li>
                            <li><a href="login.html"><i class="fa fa-magic"></i>login</a></li>
                            <li><a href="login-forgot-pass.html"><i class="fa fa-magic"></i>Forgot Password</a></li>
                            <li><a href="login-register.html"><i class="fa fa-magic"></i>Register</a></li>
                            <li>
                                <a href="#"><i class="fa fa-magic"></i>profile</a>
                                <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                    <li><a href="profile-page-v1.html"><i class="fa fa-magic"></i>profile v1</a></li>
                                    <li><a href="profile-page-v2.html"><i class="fa fa-magic"></i>profile v2</a></li>
                                    <li><a href="profile-about-me.html"><i class="fa fa-magic"></i>Profile About Me</a></li>
                                    <li><a href="profile-comments.html"><i class="fa fa-magic"></i>profile comments</a></li>
                                    <li><a href="profile-favorite.html"><i class="fa fa-magic"></i>profile favorites</a></li>
                                    <li><a href="profile-followers.html"><i class="fa fa-magic"></i>profile followers</a></li>
                                    <li><a href="profile-settings.html"><i class="fa fa-magic"></i>profile settings</a></li>
                                </ul>
                            </li>
                            <li><a href="profile-video.html"><i class="fa fa-magic"></i>Author Page</a></li>
                            <li><a href="search-results.html"><i class="fa fa-magic"></i>search results</a></li>
                            <li><a href="terms-condition.html"><i class="fa fa-magic"></i>Terms &amp; Condition</a></li>
                        </ul> --}}
                        <hr class="hr-border">  
                    </li>
                    <li><a href="javascript::void(0);"><i class="fa fa-comments"></i>Feedback </a></li>
                    <li><a href="javascript::void(0);"><i class="fa fa-envelope"></i>Help</a></li>
                </ul>
                        
                    <div class="top-button">
                        <ul class="menu loginMenu">
                            <li>
                                <a href="{{ route('videoUpload.index') }}">upload Video</a>
                            </li>
                            @if(empty(Auth::user()->id))
                            <li class="dropdown-login">
                                <a href="{{ route('login') }}">login/Register</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                 </div>
            </ul>
    </nav>
<div class="class-rederHtml"></div>
                <div class="large-12 columns" id="makeHtml"  style="float: right">
                    <section id="verticalSlider">
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="thumb-slider">
                                    <div class="main-image player-width">
                                        @if(!empty($getLatestUpload))
                                            @foreach($getLatestUpload as $recentVideos)
                                                <div class="image {{ $recentVideos->id }}" >
                                                     <div class="large-12 columns inner-flex-video" style="padding-top: 0px !important;padding-bottom: 0px !important;">
                                                        <div class="flex-video widescreen">
                                                            <video id="video_play_id{{$recentVideos->id }}" width="925px" height="481px"class="video-js vjs-default-skin video_palyerclass" controls preload="auto"data-setup="{}">
                                                            <source src="{{asset('storage')}}/{{ $recentVideos->video_file }}" type='video/mp4'>
                                                          </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="thumbs large-2">
                                        <div class="thumbnails">
                                            @if(!empty($getLatestUpload))
                                                @foreach($getLatestUpload as $recentVideos)
                                                    <div class="ver-thumbnail image-margin" id="{{ $recentVideos->id }}" >
                                                        <img src="{{asset('storage')}}/{{ $recentVideos->image_file }}" alt="imaga">
                                                        <div class="item-title">
                                                            <span>{{ $recentVideos->getCategoryName->name }}</span>
                                                            <h6>{{ $recentVideos->title }}</h6>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <a class="up" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
                                        <a class="down" href="javascript:void(0)"><i class="fa fa-angle-down"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            <!-- Category -->
            <section id="category" class="removeMargin whiteBg">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="column row">
                            <div class="heading category-heading clearfix">
                                <div class="cat-head pull-left">
                                    <i class="fa fa-folder-open"></i>
                                    <h4>Browse Videos By Category</h4>
                                </div>
                                <div>
                                    <div class="navText pull-right show-for-large">
                                        <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                        <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- category carousel -->
                        <div id="owl-demo-cat" class="owl-carousel carousel" data-autoplay="true" data-autoplay-timeout="6000" data-autoplay-hover="true" data-car-length="5" data-items="5" data-dots="false" data-loop="true" data-auto-width="true" data-margin="10">
                        @if(isset($allCategory))
                            @foreach($allCategory as $category)
                                <div class="item-cat item thumb-border">
                                    <figure class="premium-img">
                                        <img src=" @if(!empty($category->category_banner)){{ asset('storage') }}/{{ 'category_banner/'.$category->category_banner }} @else http://placehold.it/185x130 @endif" alt="carousel">
                                        <a  onclick="increase()" data-category_id="{{ $category->id }}" class="class_category hover-posts">
                                            <span><i class="fa fa-search"></i></span>
                                        </a>
                                    </figure>
                                    <h6><a class="class_category" onclick="increase()" data-category_id="{{ $category->id }}" >{{ ucfirst($category->name) }}
                                        </a></h6>
                                </div>
                            @endforeach
                        @endif
                        </div><!-- end carousel -->
                        <div class="row collapse" style="padding-bottom: 30px;">
                       
                        </div>
                    </div>
                </div>
            </section><!-- End Category -->
            <section id="id-mainContentv3" class="mainContentv3">
                <div class="row" >
                    <!-- left side content area -->
                    <div id="add_trending_videos">
                        <div id="class_add1" class="large-12 columns">
                        <div class="sidebarBg"></div>
                        <section class="content content-with-sidebar" id="add_render_html">
                            <!-- newest video -->
                            <div class="main-heading borderBottom">
                                <div class="row padding-14 " >
                                    <div class="medium-8 small-8 columns">
                                        <div class="head-title">
                                            <i class="fa fa-film"></i>
                                            <h4>Newest Videos</h4>
                                        </div>
                                    </div>
                                    <div class="medium-4 small-4 columns">
                                        <ul class="tabs text-right pull-right" data-tabs id="newVideos">
                                            <li class="tabs-title is-active"><a href="#new-all">all</a></li>
                                            {{-- <li class="tabs-title"><a href="#new-hd">HD</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    {{-- <div class="row column head-text clearfix">
                                        <p class="pull-left">All Videos : <span id="results_video_count">Videos posted</span></p>
                                        <div class="grid-system active pull-right show-for-large">
                                            <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                                            <a class="secondary-button   grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                            <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                        </div>
                                    </div> --}}
                                    <div class="tabs-content" data-tabs-content="newVideos">
                                        <div class="tabs-panel is-active" id="new-all">
                                            <div class="row list-group"  >

                                               @if(isset($getRecentVideos))
                                                    @foreach($getRecentVideos as $relVideo)
                                                       {{-- @if($getVideoInfo->id != $relVideo->id) --}}
                                                        <div class="item large-3 medium-6 columns grid-default" style="float:left;">
                                                            <div class="post thumb-border">
                                                                <div class="post-thumb">
                                                                    <img src="{{ asset('storage') }}/{{ $relVideo->image_file }}" alt="landing">
                                                                    <a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}" class="hover-posts">
                                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                                    </a>
                                                                    <div class="video-stats clearfix">
                                                                        <div class="thumb-stats pull-left">
                                                                            <h6>HD</h6>
                                                                        </div>
                                                                        <div class="thumb-stats pull-left">
                                                                            <i class="fa fa-heart"></i>
                                                                            <span>{{ isset($relVideo->getFavorateVideo)?count($relVideo->getFavorateVideo):'' }}</span>
                                                                        </div>
                                                                        <div class="thumb-stats pull-right">
                                                                            <span>{{ isset($relVideo->video_length) ? $relVideo->video_length:'' }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="post-des">
                                                                    <h6><a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}">{{ ucfirst($relVideo->title )}}</a></h6>
                                                                    <div class="post-stats clearfix">
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-user"></i>
                                                                            <span><a href="{{ url('/profile/'.base64_encode($relVideo->user_id)) }}">{{ ucfirst($relVideo->getUserInfo->name) }}</a></span>
                                                                        </p>
                                                                        <br>
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <span>{{ \Carbon\Carbon::parse($relVideo->created_at)->format('d-M-Y') }}</span>
                                                                        </p>
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span>{{ $relVideo->view }}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="post-summary">
                                                                        <p>{{ $relVideo->description }}</p>
                                                                    </div>
                                                                    <div class="post-button">
                                                                        <a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       {{-- @endif --}}
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- popular video -->
                        <div id="id_popular_video">
                            <section  class="content content-with-sidebar">
                                <!-- popular Videos -->
                                <div class="main-heading borderBottom">
                                    <div class="row padding-14">
                                        <div class="medium-8 small-8 columns">
                                            <div class="head-title">
                                                <i class="fa fa-star"></i>
                                                <h4>Most Popular Videos</h4>
                                            </div>
                                        </div>
                                        <div class="medium-4 small-4 columns">
                                            <ul class="tabs text-right pull-right" data-tabs id="popularVideos">
                                                <li class="tabs-title is-active"><a href="#popular-all">all</a></li>
                                                {{-- <li class="tabs-title"><a href="#popular-hd">HD</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="">
                                    <div class="large-12 columns">
                                        {{-- <div class="row column head-text clearfix">
                                            <p class="pull-left">All Videos : <span> posted</span></p>
                                            <div class="grid-system pull-right show-for-large">
                                                <a class="secondary-button current  active grid-default" href="#"><i class="fa fa-th"></i></a>
                                                <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                                <a class="secondary-button  list" href="#"><i class="fa fa-th-list"></i></a>
                                            </div>
                                        </div> --}}
                                        <div class="tabs-content" data-tabs-content="popularVideos">
                                            <div class="tabs-panel is-active" id="popular-all">
                                                <div class="row list-group" id="trending_add">
                                                    @if(isset($lastSevenDaysMostViewsRecord))
                                                    @foreach($lastSevenDaysMostViewsRecord as $treanding)
                                                       {{-- @if($getVideoInfo->id != $treanding->id) --}}
                                                        <div class="item large-3 medium-6 columns grid-default" style="float:left;">
                                                            <div class="post thumb-border">
                                                                <div class="post-thumb">
                                                                    <img src="{{ asset('storage') }}/{{ $treanding->image_file }}" alt="landing">
                                                                    <a href="{{ url('video/watch/'.base64_encode( $treanding->id)) }}" class="hover-posts">
                                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                                    </a>
                                                                    <div class="video-stats clearfix">
                                                                        <div class="thumb-stats pull-left">
                                                                            <h6>HD</h6>
                                                                        </div>
                                                                        <div class="thumb-stats pull-left">
                                                                            <i class="fa fa-heart"></i>
                                                                            <span>{{ isset($treanding->getFavorateVideo)?count($treanding->getFavorateVideo):'' }}</span>
                                                                        </div>
                                                                        <div class="thumb-stats pull-right">
                                                                            <span>{{ isset($treanding->video_length) ? $treanding->video_length:'' }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="post-des">
                                                                    <h6><a href="{{ url('video/watch/'.base64_encode( $treanding->id)) }}">{{ ucfirst($treanding->title )}}</a></h6>
                                                                    <div class="post-stats clearfix">
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-user"></i>
                                                                            <span><a href="{{ url('/profile/'.base64_encode($treanding->user_id)) }}">{{ ucfirst($treanding->getUserInfo->name) }}</a></span>
                                                                        </p>
                                                                        <br>
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-clock-o"></i>
                                                                            <span>{{ \Carbon\Carbon::parse($treanding->created_at)->format('d-M-Y') }}</span>
                                                                        </p>
                                                                        <p class="pull-left">
                                                                            <i class="fa fa-eye"></i>
                                                                            <span>{{ $treanding->view }}</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="post-summary">
                                                                        <p>{{ $treanding->description }}</p>
                                                                    </div>
                                                                    <div class="post-button">
                                                                        <a href="{{ url('video/watch/'.base64_encode( $treanding->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                          
                                                       {{-- @endif --}}
                                                    @endforeach
                                                @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End main content -->
                            @foreach($allCategory as $category)
                                @if($category->id < 3)
                                    @if(count($category->getCategoryWiseVideo)>0)
                                    <section  class="content content-with-sidebar">
                                        <!-- popular Videos -->
                                        <div class="main-heading borderBottom">
                                            <div class="row padding-14">
                                                <div class="medium-8 small-8 columns">
                                                    <div class="head-title">
                                                        <i class="fa fa-star"></i>
                                                        <h4>{{ ucfirst($category->name) }}</h4>
                                                    </div>
                                                </div>
                                                <div class="medium-4 small-4 columns">
                                                    <ul class="tabs text-right pull-right" data-tabs id="popularVideos">
                                                        {{-- <li class="tabs-title is-active" style="width:50px !important;"> --}}
                                                            <a class="class_category more_videos" onclick="increase()" data-category_id="{{ $category->id }}">More >></a>
                                                        {{-- </li> --}}
                                                        {{-- <li class="tabs-title"><a href="#popular-hd">HD</a></li> --}}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="">
                                            <div class="large-12 columns">
                                                {{-- <div class="row column head-text clearfix">
                                                    <p class="pull-left">All Videos : <span> posted</span></p>
                                                    <div class="grid-system pull-right show-for-large">
                                                        <a class="secondary-button current  active grid-default" href="#"><i class="fa fa-th"></i></a>
                                                        <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                                        <a class="secondary-button  list" href="#"><i class="fa fa-th-list"></i></a>
                                                    </div>
                                                </div> --}}
                                                <div class="tabs-content" data-tabs-content="popularVideos">
                                                    <div class="tabs-panel is-active" id="popular-all">
                                                        <div class="row list-group" id="trending_add">
                                                            @if(isset($lastSevenDaysMostViewsRecord))
                                                             @foreach($category->getCategoryWiseVideo as $catVideos)
                                                               {{-- @if($getVideoInfo->id != $treanding->id) --}}
                                                                <div class="item large-3 medium-6 columns grid-default" style="float:left">
                                                                    <div class="post thumb-border">
                                                                        <div class="post-thumb">
                                                                            <img src="{{ asset('storage') }}/{{ $catVideos->image_file }}" alt="landing">
                                                                            <a href="{{ url('video/watch/'.base64_encode( $catVideos->id)) }}" class="hover-posts">
                                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                                            </a>
                                                                            <div class="video-stats clearfix">
                                                                                <div class="thumb-stats pull-left">
                                                                                    <h6>HD</h6>
                                                                                </div>
                                                                                <div class="thumb-stats pull-left">
                                                                                    <i class="fa fa-heart"></i>
                                                                                    <span>{{ isset($catVideos->getFavorateVideo)?count($catVideos->getFavorateVideo):'' }}</span>
                                                                                </div>
                                                                                <div class="thumb-stats pull-right">
                                                                                    <span>{{ isset($catVideos->video_length) ? $catVideos->video_length:'' }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="post-des">
                                                                            <h6><a href="{{ url('video/watch/'.base64_encode( $catVideos->id)) }}">{{ ucfirst($catVideos->title )}}</a></h6>
                                                                            <div class="post-stats clearfix">
                                                                                <p class="pull-left">
                                                                                    <i class="fa fa-user"></i>
                                                                                    <span><a href="{{ url('/profile/'.base64_encode($catVideos->user_id)) }}">{{ ucfirst($catVideos->getUserInfo->name) }}</a></span>
                                                                                </p><br>
                                                                                <p class="pull-left">
                                                                                    <i class="fa fa-clock-o"></i>
                                                                                    <span>{{ \Carbon\Carbon::parse($catVideos->created_at)->format('d-M-Y') }}</span>
                                                                                </p>
                                                                                <p class="pull-left">
                                                                                    <i class="fa fa-eye"></i>
                                                                                    <span>{{ $catVideos->view }}</span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="post-summary">
                                                                                <p>{{ $catVideos->description }}</p>
                                                                            </div>
                                                                            <div class="post-button">
                                                                                <a href="{{ url('video/watch/'.base64_encode( $catVideos->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               {{-- @endif --}}
                                                            @endforeach
                                                        @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section><!-- End main content -->
                                    @endif
                                @endif
                            @endforeach
                            <div id="category_wise_video_add"></div>
                        </div>
                    </div><!-- end left side content area -->
                </div>
                    
                    <!-- sidebar -->
                    {{-- <div id="class_add2" class="large-4 columns" style=" padding-left: 15px; max-width:"> --}}
                        {{-- <aside class="sidebar"> --}}
                            {{-- <div class="sidebarBg"></div> --}}
                            {{-- <div class="row" style="width: 444px; "> --}}
                              
                               {{--  <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Search Videos</h5>
                                        </div>
                                        <div class="input-group">
                                            <input class="input-group-field" id="sidebar_video_search_id" type="text"  name="sidebar_video_search" placeholder="Enter your keyword">
                                            <div class="input-group-button">
                                                <input type="submit" id="sidebar_video_search_button" class="button" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Most View Videos</h5>
                                        </div>
                                        <div class="widgetContent sidebarSearchClass">
                                            @if(isset($getMostViewVideos))
                                                @foreach($getMostViewVideos as $mVideo)
                                                    <div class="video-box thumb-border">
                                                        <div class="video-img-thumb">
                                                            <img src="{{ asset('storage') }}/{{ $mVideo->image_file }}" alt="most viewed videos">
                                                            <a href="{{ url('/video/watch/'.base64_encode($mVideo->id)) }}" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                        </div>
                                                        <div class="video-box-content">
                                                            <h6><a href="{{ url('/video/watch/'.base64_encode($mVideo->id)) }}">{{ ucfirst($mVideo->title) }}</a></h6>
                                                            <p>
                                                                <span><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($mVideo->user_id)) }}">{{ ucfirst($mVideo->getUserInfo->name) }}</a></span>
                                                                <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($mVideo->created_at)->format('d-M-Y') }}</span>
                                                                <span><i class="fa fa-eye"></i>{{ $mVideo->view }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                   
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <!-- Recent post videos -->
                                {{-- <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Recent post videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            @if(!empty($getRecentVideos))
                                                @foreach($getRecentVideos as $rVideo)
                                                    <!-- @if($getVideoInfo->id != $rVideo->id ) -->
                                                        <div class="media-object stack-for-small">
                                                            <div class="media-object-section">
                                                                <div class="recent-img">
                                                                    <img src= "{{ asset('storage') }}/{{ $rVideo->image_file }}" alt="recent">
                                                                    <a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}" class="hover-posts">
                                                                        <span><i class="fa fa-play"></i></span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="media-object-section">
                                                                <div class="media-content">
                                                                    <h6><a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}">{{ ucfirst($rVideo->title) }}</a></h6>
                                                                    <p><i class="fa fa-user"></i>
                                                                        <span>{{ ucfirst($rVideo->getUserInfo->name) }}</span>
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span>{{ \Carbon\Carbon::parse($rVideo->created_at)->format('d-M-Y') }}
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- @endif -->
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- End Recent post videos -->

                                {{-- <!-- tags -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Tags</h5>
                                        </div>
                                        <div class="tagcloud">
                                            <a href="#">3D Videos</a>
                                            <a href="#">Videos</a>
                                            <a href="#">HD</a>
                                            <a href="#">Movies</a>
                                            <a href="#">Sports</a>
                                            <a href="#">3D</a>
                                            <a href="#">Movies</a>
                                            <a href="#">Animation</a>
                                            <a href="#">HD</a>
                                            <a href="#">Music</a>
                                            <a href="#">Recreation</a>
                                        </div>
                                    </div>
                                </div><!-- End tags --> --}}
                            {{-- </div> --}}
                        {{-- </aside> --}}
                    {{-- </div> --}}
                    <!-- end sidebar -->
                </div>
            </section>
    <div class="ajax-load text-center" style="display:none">
        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More video</p>           
    </div>
@include('layout.footer')
<!-- script files -->
@include('layout.script')
    <link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/videojs-overlay-hyperlink.css') }}" rel="stylesheet">
    <script src="{{ asset('node_modules/es5-shim/es5-shim.js')}}"></script>
    <script src="{{ asset('node_modules/video.js/dist/video.min.js') }}"></script>
    <script type="text/javascript" src="https://players.brightcove.net/videojs-overlay/2/videojs-overlay.min.js"></script>
    <script src="{{ asset('node_modules/videojs-dynamic-overlay/dist/videojs-newoverlay.min.js') }}"></script>
    <script src="{{ asset('node_modules/videojs-dynamic-overlay/examples/videojs-contrib-hls.js')}}"></script>

<?php 
        /* this function use to convert time into second*/
        function second($sec) {
            $parsed = date_parse($sec);
            $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
            return $seconds; 
        }

        function lyricsFile($recentVideos,$file) {
            if($recentVideos->category_id == 2 || $recentVideos->category_id == 4 ) {
                $data['lyrics_data'] = $lyrics_data = (new FastExcel)->import(public_path("download".'/'.$recentVideos->getCategoryName->name.'/'.$recentVideos->lyrics_file));

                return $lyrics_data;

            }
            
        }
?>
<script type="text/javascript">
/*video search load more data*/
    var query =  $('.typeahead').val();
    if(query != '') { 
       var p = 1;
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                p++;
                loadMoreSearchData(p);
            }
        });
        function loadMoreSearchData(p){
            var query =  $('.typeahead').val();
            $.ajax({
                url: '{{ url('/video/search?p=') }}' + p,
                type: "get",
                data:{query:query},
                beforeSend: function() {
                    $('.ajax-load').show();
                }
            }).done(function(data) {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                   return;
                }
                $('.ajax-load').hide();
                $("#add_render_html").append(data.html);
            });
                
        }
    }
    <?php foreach($getLatestUpload as $recentVideos) { ?>
       $(document).ready(function(){
        var myPlayer,
        overlayDisplayed,
        eOverlayButton = document.getElementById("overlayButton");
   // videojs.getPlayer('myPlayerID').ready(function() {
        // When the player is ready, get a reference to it
        myPlayer =   videojs('video_play_id{{$recentVideos->id }}',{controls: true,autoplay: false});
        var aspectRatio = 360/640; 

        function resizeVideoJS(){
            var width = document.getElementById('video_play_id{{$recentVideos->id }}').parentElement.offsetWidth;
            myPlayer.width(width);
            myPlayer.height( width * aspectRatio );

         }
      
       // Initialize resizeVideoJS()
        resizeVideoJS();
      // Then on resize call resizeVideoJS()
         window.onresize = resizeVideoJS; 
      // Initialize the overlay plugin with a clickable image
        var contentDisplay = "{{ isset($getVideoInfo->lyrics) ? $getVideoInfo->lyrics:''}}";
        console.log(contentDisplay);
        myPlayer.overlay({
        debug: true,
        
        "overlays": [
      <?php 
        if(!empty($recentVideos->lyrics_file)) {
            $lyrics_data = lyricsFile($recentVideos,$recentVideos->lyrics_file);
            if(!empty($lyrics_data)){
            foreach ($lyrics_data as $lyrics) {  
                $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
      ?>

          {
            "align": "top-right",
            "start":{{ second( $start_time ) }},
            "end" :{{ second( $end_time ) }},
            "content": "{{ucfirst( $lyrics['text']) }}",
          },
          <?php }}} ?>
          {
          start:0,
          end:0,
        }],
       
    }); 
});
<?php }?>
/*only play single video in frame script*/

$(document).ready(function() {
    $(".video-js").each(function (videoIndex) { 
        var videoId = $(this).attr("id");
        videojs(videoId).ready(function(){
            this.on("play", function(e) {
                //pause other video
                $(".video-js").each(function (index) {
                    if (videoIndex !== index) {
                        this.player.pause();
                    }
                });
            });

        });
    });
});

     var obj = {
            WelcomePage:function(data){
                $.ajax({
                    url: data.action,
                    type:"get",
                    data: data,
                    success:function(r){
                        if(r.status == true) {
                            $('#script_remove_load').html('');
                            $('.class-rederHtml').html('');
                            $('#class_add1').removeClass('large-8');
                            $('#class_add1').addClass('large-7');
                            var style ="width:68.33%;";
                            $('#class_add1').attr("style",style);
                            $('#class_add2').removeClass('large-4');
                            $('#class_add2').addClass('large-3');
                            $('#category').html('');
                            $('#makeHtml').html('');
                            $('#id_popular_video').html('');
                            $('#results_video_count').html(r.video_count);
                            $(data.target).html(r.html);
                            loadMoreVideos();
                            
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
                            $('#subscribe_add').html('<button type="button" style="background-color:#e96969;"  id="id-subscribe"  class="class-subscribe" data-status="yes" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBED </button>');
                            

                        }else if(r.status == true && r.subscription_status=='no') {

                            $('#subscribe_add').html('');
                            $('#subscribe_add').html('<button type="button"   id="id-subscribe"  class="class-subscribe" data-status="no" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBE </button>');

                        }else if(r.message == 'Unauthenticated') {

                            route = "{{route('login')}}";
                            window.location.href = route;
                        }
                    }
                });
            },
            AddToFavorate:function(data){
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        //console.log(r);
                        if(r.status == true && r.favorate_status=='yes') {
                            $('#fav_add').html('');
                            $('#fav_add').html('<button style="background-color:#e96969;" data-status="yes" type="button" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
                        }else if(r.status == true && r.favorate_status=='no') {
                            $('#fav_add').html('');
                            $('#fav_add').html('<button  type="button" data-status="no" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
                        }
                    }
                });
            },
            categoryFilter:function(data) {
                $.ajax({
                    url: data.action,
                    type: "get",
                    data:data,
                    success:function(r){
                        if(r.status == true) {
                            $('.class-rederHtml').html('');
                            $('#category').html('');
                            $('#class_add1').removeClass('large-8');
                            var style =" overflow-y:scroll;width:66.33%;  height:1200px; ";

                            $('#class_add1').attr("style",style);
                            $('#class_add2').removeClass('large-4');
                            $('#class_add2').addClass('large-3');
                           
                            $('#makeHtml').html('');
                            $('#id_popular_video').html('');
                            $('#add_render_html').html('');
                             $('#results_video_count').html(r.video_count +' '+'videos posted');
                            $(data.target).html(r.html);
                        }
                    }
                });
            },
            categoryWiseFilter:function(data) {
                $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                })
                .done(function(res) {
                    $(document).scrollTop(0);
                    $('.class-rederHtml').html(' ');
                    $('#makeHtml').html(' ');
                    $('#category').html(' ');
                    changeurl(res.current_url);
                    $('#add_trending_videos').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-6');
                    $('#class_remove_of_trending').addClass('large-7');
                    $('.category_wise_filter').attr('id','');
                    $('.category_wise_filter').attr('id',res.id);
                    var myPlayer,
                    overlayDisplayed,
                    eOverlayButton = document.getElementById("overlayButton");
                    
               // videojs.getPlayer('myPlayerID').ready(function() {
                    // When the player is ready, get a reference to it
                    myPlayer =   videojs(res.id,{controls: true,autoplay: false});
                     var aspectRatio = 264/640; 

                    function resizeVideoJS(){
                        var width = document.getElementById(res.id).parentElement.offsetWidth;
                        myPlayer.width(width);
                        myPlayer.height( width * aspectRatio );

                     }
                  
                   // Initialize resizeVideoJS()
                    resizeVideoJS();
                  // Then on resize call resizeVideoJS()
                     window.onresize = resizeVideoJS; 
                  // Initialize the overlay plugin with a clickable image
                    myPlayer.overlay({
                    debug: true,                    
                    "overlays": [
                      <?php 
                        if(!empty($lyrics_data)){

                        foreach ($lyrics_data as $lyrics) {  
                        $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                        $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
                      ?>

                        {
                            "align": "top-right",
                            "start":{{ second( $start_time ) }},
                            "end" :{{ second( $end_time ) }},
                            "content": "{{ucfirst( $lyrics['text']) }}",
                        },
                          <?php }} ?>
                        {
                            start:0,
                            end:0,
                    }],
                   
                  });
                    overlayDisplayed = true;
                      //myPlayer.addClass("hide-overlay");
                      // Listen for the click event on the Toggle Overlay button
                    eOverlayButton.addEventListener("click",function() {
                    if (overlayDisplayed) {
                        // Hide the overlay
                        overlayDisplayed = false;
                        var style = "display:none";
                        $('.vjs-overlay-top-right').attr("style",style);
                    } else {
                        // Show the overlay
                        overlayDisplayed = true;
                        $('.vjs-overlay-top-right').removeAttr("style",style);
                    }
                });
                subscribeButtonHide();
                 getAllComment();
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                     
                });
            },
            trendingWiseFilter:function(data) {
                 $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                })
                .done(function(res) { 
                    $(document).scrollTop(0);
                    $('.class-rederHtml').html(' ');
                    $('#makeHtml').html(' ');
                    $('#category').html(' ');
                    changeurl(res.current_url);
                    $('#add_trending_videos').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-6');
                    $('#class_remove_of_trending').addClass('large-7');
                    
                    $('.class_change_id').attr('id','');
                    $('.class_change_id').attr('id',res.id);

                    var myPlayer,
                    overlayDisplayed,
                    eOverlayButton = document.getElementById("overlayButton");
                    var aspectRatio = 264/640; 

                    function resizeVideoJS(){
                        var width = document.getElementById(res.id).parentElement.offsetWidth;
                        myPlayer.width(width);
                        myPlayer.height( width * aspectRatio );

                     }
                  
                   // Initialize resizeVideoJS()
                    resizeVideoJS();
                  // Then on resize call resizeVideoJS()
                     window.onresize = resizeVideoJS; 
                     // videojs.getPlayer('myPlayerID').ready(function() {
                    // When the player is ready, get a reference to it
                    myPlayer =   videojs(res.id,{controls: true,autoplay: false});
                  // Initialize the overlay plugin with a clickable image
                  myPlayer.overlay({
                    debug: true,                    
                    "overlays": [

                  <?php 
                    if(!empty($lyrics_data)){

                    foreach ($lyrics_data as $lyrics) {  
                    $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                    $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
                  ?>

                      {
                        "align": "top-right",
                        "start":{{ second( $start_time ) }},
                        "end" :{{ second( $end_time ) }},
                        "content": "{{ucfirst( $lyrics['text']) }}",
                      },
                      <?php }} ?>
                      {
                      start:0,
                      end:0,
                    }],
                   
                  });
              overlayDisplayed = true;
              //myPlayer.addClass("hide-overlay");
              // Listen for the click event on the Toggle Overlay button
              eOverlayButton.addEventListener("click",function(){
                if (overlayDisplayed) {
                    // Hide the overlay
                    overlayDisplayed = false;
                   var style = "display:none";
                    $('.vjs-overlay-top-right').attr("style",style);
                } else {
                    // Show the overlay
                    overlayDisplayed = true;
                   $('.vjs-overlay-top-right').removeAttr("style",style);
                }
              });
                 subscribeButtonHide();
                  getAllComment();   
              });
            },
            sidebarVideoSearch:function(data) {
                $.ajax({
                    url:  data.action,
                    type: "post",
                    data: data,
                })
                .done(function(res) {
                    if(res.status == true) {
                        $('.sidebarSearchClass').html('');
                        $('.sidebarSearchClass').html(res.html);
                        $('.sidebarSearchClass').css('overflow-y', 'scroll');
                        $('.sidebarSearchClass').css('max-height', '400px');
                    }
                })
            },
             commentSection:function(data) {
                console.log(data);
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
                            var comment =  $('.class_commentText').val('');
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
         }
        jQuery(document).ready(function() {
            jQuery(document).on('keyup','.typeahead',function() {
                var query =  $('.typeahead').val();
                var category =  $('#id-category').val();
                //var _token = $("input[name='_token']").val();
                var action = '{{ route('videoSearch') }}';
                var data = {query:query,category:category,target:'#add_render_html',action:action};
                obj.WelcomePage(data);
            });
        });

        // jQuery(document).ready(function() { 
        //     jQuery(document).on('change','.class-category',function() { 
        //         var query =  $('.typeahead').val();
        //         var category =  $('.class-category').val();
        //         var action = '{{ route('videoSearch') }}';
        //         var data = {query:query,category:category,target:'#add_render_html',action:action};
        //         obj.categoryFilter(data);
        //     });
        // });

     /* category wise video load */

        $(document).on('click','.class_category',function() { 

            var category_id =  $(this).data('category_id');
            var click = $('#id_number').val();
            var action = '{{ route('video.categoryWise.filter') }}';
            var _token = "{{ csrf_token() }}";
            data = {category_id:category_id,click:click,action:action,_token:_token};
            obj.categoryWiseFilter(data);
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

    /* video trending wise video filter*/

    $(document).on('click','.trending_videos',function() {
            
        var category_id =  $(this).data('video_status');
        var click = $('#id_number').val();
        var action = '{{ route('video.trendingWise.filter') }}';
        var _token = "{{ csrf_token() }}";
        data = {category_id:category_id,click:click,action:action,_token:_token};
        obj.trendingWiseFilter(data);

    });

/* increment value function for video player load on category and trending filter*/

   function increase() {
    var textBox = $('#id_number').val();
    var inc = ++textBox;
        $('#id_number').val(inc);
    }


    $(document).ready(function(){
        subscribeButtonHide();
    });
    function subscribeButtonHide() {
        $(document).ready(function(){
            var user_id = "{{ isset($getVideoInfo->getUserInfo->id) ? $getVideoInfo->getUserInfo->id:'' }}";

            var auth  = "{{ isset(Auth::user()->id)?Auth::user()->id:'' }}";
            console.log(user_id);
            console.log(auth);
            if(auth == user_id) {
                $('#id-subscribe').hide();
            }
        });
    }

    /*sidebar videos search result*/

    $(document).on('click','#sidebar_video_search_button',function() {
        var keyword = $('#sidebar_video_search_id').val();
        var action = "{{ route('video.search.sidebar') }}";
        var _token = "{{ csrf_token() }}";
        data = {keyword:keyword,action:action,_token:_token};
        obj.sidebarVideoSearch(data);
    });

/* add to favorate*/

    $(document).ready(function() {
        $(document).on('click','#id-fav',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
            if(checkUserLogin == '') {
                route = "{{url('/login')}}";
                window.location.href = route;
            }
            var user_id = $(this).data('user_id');
            var video_id = $(this).data('vid');
            var status = $(this).data('status');
            var action = '{{ route('favorate') }}';
            var _token = "{{ csrf_token() }}";
            var data = {user_id:user_id,video_id:video_id,status:status,_token:_token,target:'#',action:action};
            obj.AddToFavorate(data);

        });
    });

    /*like and dislike */

    $(document).ready(function() { 
        $(document).on('click','.class-like',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
                if(checkUserLogin == '') {
                    route = "{{route('login')}}";
                    window.location.href = route;
                }else{
                    var vid = $(this).data('vid');
                    var user_id ="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                    var thumb = $(this).data('thumb');
                    var url = "{{ route('ajaxRequest') }}";
                    var _token = "{{ csrf_token() }}";
                    $.ajax({
                        type:'post',
                        url : url,
                        data: {vid:vid,thumb:thumb,user_id:user_id,_token:_token},
                        success:function(res){
                            if(res.status == true && thumb == 'likes') {
                                $('#id-likes').text(' '+ res.data[0].likes);
                                $('#id-dislike').text(' '+ res.data[0].dislikes);
                            }else if(res.status == true && thumb == 'dislikes') {
                                $('#id-likes').text(' '+ res.data[0].likes);
                                $('#id-dislike').text(' '+ res.data[0].dislikes);
                            }
                        }
                    })
                }  
            }); 
        });


</script>
<div id="script_remove_load">
    <script type="text/javascript">
   var page = 3;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });


    function loadMoreData(page){
       var category = page;
      $.ajax({

               url: '{{ url('/video/load/categoywise/search?page=') }}' + page,
               type: "get",
                data:{category:category},
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html===""){
                    $('.ajax-load').html("No more records found");
                   return;
               }
                $('.ajax-load').hide();
                
                $("#category_wise_video_add").append(data.html);
            });
            
    }

    /*comment store*/

    $(document).on('click','#commentStore',function() { 
        var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
        if(checkUserLogin == '') {
            route = "{{url('/login')}}";
            window.location.href = route;
        }
        var user_id = $(this).data('user_id');
        var video_id = $(this).data('video_id');
        var comment = $('.class_commentText').val();
        var action  =  "{{ route('comment') }}";
        var _token = "{{ csrf_token() }}";
        var data = {user_id:user_id,comment:comment,video_id:video_id,action:action,_token:_token};
        obj.commentSection(data);

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
    function getAllComment() {
        var user_id = "{{ isset($getVideoInfo->user_id) ? $getVideoInfo->user_id:" " }}";
        var video_id = "{{ isset($getVideoInfo->id) ? $getVideoInfo->id:"" }}";
        
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
                      $('#comment_section_addition').html('');
                      $('#comment_section_addition').html(r.html);
                      $('#comment_count_id').text('');                        
                      $('#comment_count_id').text('('+r.comment+')');                        
                    }
                }
            });
        }
    }
    $(document).ready(function(){
        getAllComment();
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
        $(document).on('click','.comment_likes',function() {
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

/*update the url */

function changeurl(url) {
    var new_url=url;
    window.history.pushState("data","Title",new_url);
    document.title=url;
}
</script>
</div>
    
</body>
</html>



