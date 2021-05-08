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
        <div class="off-canvas position-left light-off-menu dark-off-menu" id="offCanvas" data-off-canvas>
            <div class="off-menu-close">
                <h3>Menu</h3>
                <span data-toggle="offCanvas"><i class="fa fa-times"></i></span>
            </div>
            <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
                <li class="has-submenu">
                    <a href="{{ route('home') }}">Home</a>
                   <!-- <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="index.html">Home page v1</a></li>
                        <li><a href="home-v2.html">Home page v2</a></li>
                        <li><a href="home-v3.html">Home page v3</a></li>
                        <li><a href="home-v4.html">Home page v4</a></li>
                        <li><a href="home-v5.html">Home page v5</a></li>
                        <li><a href="home-v6.html">Home page v6</a></li>
                        <li><a href="home-v7.html">Home page v7</a></li>
                        <li><a href="home-v8.html">Home page v8</a></li>
                        <li><a href="home-v9.html">Home page v9</a></li>
                        <li><a href="home-v10.html">Home page v10</a></li>
                    </ul>
                   -->
                </li>
                <li class="has-submenu" data-dropdown-menu="example1">
                    <a href="#">Videos</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="single-video-v1.html">single video v1</a></li>
                        <li><a href="single-video-v2.html">single video v2</a></li>
                        <li><a href="single-video-v3.html">single video v3</a></li>
                        <li><a href="submit-post.html">submit post</a></li>
                    </ul>
                </li>
                <li><a href="categories.html">category</a></li>
                <li>
                    <a href="blog.html">blog</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="blog-single-post.html">blog single post</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">features</a>
                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="archives.html">Archives</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="login-forgot-pass.html">Forgot Password</a></li>
                        <li><a href="login-register.html">Register</a></li>
                        <li>
                            <a href="#">profile</a>
                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                <li><a href="profile-page-v1.html">profile v1</a></li>
                                <li><a href="profile-page-v2.html">profile v2</a></li>
                                <li><a href="profile-about-me.html">Profile About Me</a></li>
                                <li><a href="profile-comments.html">profile comments</a></li>
                                <li><a href="profile-favorite.html">profile favorites</a></li>
                                <li><a href="profile-followers.html">profile followers</a></li>
                                <li><a href="profile-settings.html">profile settings</a></li>
                            </ul>
                        </li>
                        <li><a href="profile-video.html">Author Page</a></li>
                        <li><a href="search-results.html">search results</a></li>
                        <li><a href="terms-condition.html">Terms &amp; Condition</a></li>
                    </ul>
                </li>
                <li><a href="about-us.html">about</a></li>
                <li><a href="contact-us.html">contact</a></li>
            </ul>
            <div class="responsive-search">
                <form method="post">
                    <div class="input-group">
                        <input class="input-group-field" type="text" placeholder="search Here">
                        <div class="input-group-button">
                            <button type="submit" name="search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="off-social">
                <h6>Get Socialize</h6>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <!--
                <a href="#"><i class="fa fa-vimeo"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                -->
            </div>
            <div class="top-button">
                <ul class="menu">
                    <li>
                        <a href="{{ route('videoUpload.index') }}"><i class="fas fa-file-upload"></i></a>
                    </li>
                    <li class="dropdown-login">
                        <a href="{{ route('register') }}">login/Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <header>
                <!-- Top -->
                <section id="top" class="topBar topBarBlack show-for-large">
                    {{-- <div class="row">
                        <div class="medium-6 columns">
                            <div class="topBarMenu">
                                <ul class="menu">
                                    <li>
                                        <a href="welcome"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="categories.html"><i class="fa fa-th-large"></i>Categories</a>
                                    </li>
                                    <li>
                                        <a href="about-us.html"><i class="fa fa-user"></i>About</a>
                                    </li>
                                    <li>
                                        <a href="blog.html"><i class="fa fa-pencil-square-o"></i>Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.html"><i class="fa fa-envelope"></i>Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="medium-6 columns">
                            <div class="top-button">
                                <div class="socialLinks float-right">
                                    
                                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <!--
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </section><!-- End Top -->
                <!--Navber-->
                <section id="navBar">
                    <div class="middleNav show-for-large">
                        <div class="row">
                            <div class="large-3 columns">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img src="images/logo.jpg" width="164px" alt="betube"></a>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="topCenterAdv text-center">
                                    <div style="display: box; text-align: center; border-radius: 2px; width:400px; height: 70px;  border: 1px solid red;  ">
                                        <p ><a href="http://youtube.com">Paste Your Site url</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="large-3 columns">
                                <div class="search-btns float-right">
                                    <ul class="menu">
                                         <li class="upl-btn" >
                                            <a href="{{ route('videoUpload.index') }}"><i class="fa fa-upload"></i></a>
                                        </li>                                 
                                       @if(!empty(Auth::id()))
                                       
                                        <li class="upl-btn">
                                            <a href="notification" style="margin:10px;text-align: center;"><i class="fa fa-bell"></i></a>
                                        </li> 
                                        <li class="upl-btn">
                                            <ul class="menu vertical medium-horizontal dropdown" data-responsive-menu="drilldown medium-dropdown" role="menubar" data-dropdown-menu="xwxxk2-dropdown-menu" aria-expanded="false" data-is-click="false">
                                            <li role="menuitem" class="is-dropdown-submenu-parent opens-right" aria-haspopup="true" aria-expanded="false" aria-label="features" data-is-click="false">
                                                <a href="#"><i class="fa fa-user"></i></a>
                                                <ul class="submenu menu vertical is-dropdown-submenu first-sub" data-submenu="" data-animate="slide-in-down slide-out-up" aria-hidden="true" role="menu">
                                                    <li role="menuitem" class="upl-btn" style="padding-bottom: 10px;">
                                                        <a href="{{ url('profile/'.base64_encode(Auth::user()->id)) }}"><img src="{{ asset('images/profile-bg1.png') }}"  class="img-circle" style="border-radius: 50%;height: 30px; width: 30px;">Profile</a>
                                                    </li>
                                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item" style="padding-bottom: 10px;">
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                          onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            <i class=" fa fa-power-off"></i>                           
                                                           {{ __('logout') }}
                                                       </a>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                           @csrf
                                                       </form>
                                                    </li>
                                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item" style="padding-bottom: 10px;"><a href="javascript::void(0);"><i class="fa fa-magic"></i>Lock Screen</a></li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                        </li>
                                         @else
                                            <li class="login">
                                                <a href="{{ route('register') }}">login/register</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="large-12 columns">
                    <nav class="sticky-container navBlack navFull-v2" data-sticky-container>
                        <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #444;" data-sticky-on="large">
                            <div class="row">
                                <div class="large-12 columns">
                                    {{-- <div class="title-bar title-bar-dark" data-responsive-toggle="beNav" data-hide-for="large">
                                        <button class="menu-icon" type="button" data-toggle="offCanvas"></button>
                                        <div class="title-bar-title"><img src="images/logo.jpg" width="82px" alt="logo"></div>
                                    </div> --}}
                                    <div class="top-bar show-for-large topbar-light-dark" id="beNav" style="width: 100%;">
                                        <div class="top-bar-left">
                                            <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                                {{-- <li class="has-submenu active" data-dropdown-menu="example">
                                                    <a href="#">Home</a>                                                    
                                                </li> --}}
                                                
                                                <li class="has-submenu" style="text-align: center;">
                                                    <form id="search">
                                                        <div align="center" class="float-left">
                                                            <input type="search" class="search-class typeahead" name="search" placeholder="Seach Here your video" style="width: 700px;">
                                                        </div>
                                                        <div class="search-btn float-right text-right" style="margin-bottom: 7px;">
                                                            <select name="category_id" id="id-category" class="form-control class-category" class="category">
                                                                <option value="all" >All</option>
                                                            <?php $category = \App\Models\Category::all();?>
                                                            @foreach ($category as $key => $cat)
                                                                <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                             @endforeach
                                                            </select>
                                                        </div>
                                                    </form>
                                                </li>
                                                <!--
                                                <li>
                                                    <a href="#">features</a>
                                                    <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                        <li><a href="404.html">404 Page</a></li>
                                                        <li><a href="archives.html">Archives</a></li>
                                                        <li><a href="login.html">login</a></li>
                                                        <li><a href="login-forgot-pass.html">Forgot Password</a></li>
                                                        <li><a href="login-register.html">Register</a></li>
                                                        <li>
                                                            <a href="#">profile</a>
                                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                                <li><a href="profile-page-v1.html">profile v1</a></li>
                                                                <li><a href="profile-page-v2.html">profile v2</a></li>
                                                                <li><a href="profile-about-me.html">Profile About Me</a></li>
                                                                <li><a href="profile-comments.html">profile comments</a></li>
                                                                <li><a href="profile-favorite.html">profile favorites</a></li>
                                                                <li><a href="profile-followers.html">profile followers</a></li>
                                                                <li><a href="profile-settings.html">profile settings</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="profile-video.html">Author Page</a></li>
                                                        <li><a href="search-results.html">search results</a></li>
                                                        <li><a href="terms-condition.html">Terms &amp; Condition</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Animation</a></li>
                                                <li><a href="#">Animals</a></li>
                                                <li><a href="#">Sports</a></li>
                                                <li><a href="#">Slow Motion</a></li>
                                                <li><a href="#">HD</a></li>
                                                <li><a href="#">News</a></li>
                                                <li><a href="#">Random</a></li>
                                                <li><a href="#">Boxed Layout</a></li>
                                                -->
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>
        </header><!-- End Header -->
            <!-- verticle thumb slider -->
            <div class="large-2 columns">
                <div class="light-off-menu" id="offCanvas" data-off-canvas style="overflow-y: scroll; height:450px;">
                    <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
                        <li class="has-submenu">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a>
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
                                <li><a href="javascript::void(0);"><i class="fa fa-edit"></i>blog single post</a></li>
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
                 </div>
            </div>
            <div class="class-rederHtml"></div>
                <div class="large-10 columns" id="makeHtml"  style="float: right">
                    <section id="verticalSlider">
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="thumb-slider">
                                    <div class="main-image player-width" style="width: 770px;">
                                        @if(!empty($getLatestUpload))
                                            @foreach($getLatestUpload as $recentVideos)
                                                <div class="image {{ $recentVideos->id }}" >
                                                     <div class="large-12 columns inner-flex-video">
                                                        <div class="flex-video widescreen">
                                                            <video id="video_play_id{{$recentVideos->id }}"  width="770" height="315"   class="video-js vjs-default-skin video_palyerclass" controls>
                                                            <source src="{{asset('storage')}}/{{ $recentVideos->video_file }}" type='video/mp4'>
                                                          </video>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="thumbs large-2" style="margin-left: 20px;">
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
                                           {{--  <div class="ver-thumbnail image-margin " id="2" >
                                                <img src="http://placehold.it/800x400" alt="imaga">
                                                <div class="item-title">
                                                    <span>Entertainment</span>
                                                    <h6>The standard chunk of Lorem Ipsum used since.</h6>
                                                </div>
                                            </div>
                                            <div class="ver-thumbnail image-margin" id="3">
                                                <img src="http://placehold.it/800x400" alt="imaga">
                                                <div class="item-title">
                                                    <span>Technology</span>
                                                    <h6>The standard chunk of Lorem Ipsum used since.</h6>
                                                </div>
                                            </div>
                                            <div class="ver-thumbnail image-margin" id="4">
                                                <img src="http://placehold.it/800x400" alt="imaga">
                                                <div class="item-title">
                                                    <span>Technology</span>
                                                    <h6>The standard chunk of Lorem Ipsum used since.</h6>
                                                </div>
                                            </div> --}}
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
                        <div id="owl-demo-cat" class="owl-carousel carousel" data-autoplay="true" data-autoplay-timeout="3000" data-autoplay-hover="true" data-car-length="5" data-items="6" data-dots="false" data-loop="true" data-auto-width="true" data-margin="10">
                        @if(isset($allCategory))
                            @foreach($allCategory as $category)
                                <div class="item-cat item thumb-border">
                                    <figure class="premium-img">
                                        <img src="http://placehold.it/185x130" alt="carousel">
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
                        <div class="row collapse">
                            <div class="large-12 columns text-center row-btn">
                                <a href="categories.html" class="button radius">View All Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Category -->
            <section id="id-mainContentv3" class="mainContentv3">
                <div class="row" >
                    <!-- left side content area -->
                    <div id="add_trending_videos">
                        <div id="class_add1" class="large-8 columns">
                        <div class="sidebarBg"></div>
                        <section class="content content-with-sidebar">
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
                                    <div class="row column head-text clearfix">
                                        <p class="pull-left">All Videos : <span id="results_video_count">Videos posted</span></p>
                                        <div class="grid-system active pull-right show-for-large">
                                            <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                            <a class="secondary-button current  grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                            <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                        </div>
                                    </div>
                                    <div class="tabs-content" data-tabs-content="newVideos">
                                        <div class="tabs-panel is-active" id="new-all">
                                            <div class="row list-group" id="add_render_html" >

                                               @if(isset($getRecentVideos))
                                                    @foreach($getRecentVideos as $relVideo)
                                                       {{-- @if($getVideoInfo->id != $relVideo->id) --}}
                                                        <div class="item large-4 medium-6 columns grid-default" style="float:left;">
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
                                                                            <span>506</span>
                                                                        </div>
                                                                        <div class="thumb-stats pull-right">
                                                                            <span>05:56</span>
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
                                        {{-- <div class="tabs-panel" id="new-hd">
                                            <div class="row list-group">
                                                <div class="item large-4 medium-6 columns grid-default">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="http://placehold.it/370x220" alt="new video">
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
                                                                <div class="thumb-stats pull-left">
                                                                    <h6>HD</h6>
                                                                </div>
                                                                <div class="thumb-stats pull-left">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>506</span>
                                                                </div>
                                                                <div class="thumb-stats pull-right">
                                                                    <span>05:56</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-des">
                                                            <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                            <div class="post-stats clearfix">
                                                                <p class="pull-left">
                                                                    <i class="fa fa-user"></i>
                                                                    <span><a href="#">admin</a></span>
                                                                </p>
                                                                <p class="pull-left">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span>5 January 16</span>
                                                                </p>
                                                                <p class="pull-left">
                                                                    <i class="fa fa-eye"></i>
                                                                    <span>1,862K</span>
                                                                </p>
                                                            </div>
                                                            <div class="post-summary">
                                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                            </div>
                                                            <div class="post-button">
                                                                <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item large-4 medium-6 columns grid-medium end">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="http://placehold.it/370x220" alt="new video">
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
                                                                <div class="thumb-stats pull-left">
                                                                    <h6>HD</h6>
                                                                </div>
                                                                <div class="thumb-stats pull-left">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>506</span>
                                                                </div>
                                                                <div class="thumb-stats pull-right">
                                                                    <span>05:56</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-des">
                                                            <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                            <div class="post-stats clearfix">
                                                                <p class="pull-left">
                                                                    <i class="fa fa-user"></i>
                                                                    <span><a href="#">admin</a></span>
                                                                </p>
                                                                <p class="pull-left">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span>5 January 16</span>
                                                                </p>
                                                                <p class="pull-left">
                                                                    <i class="fa fa-eye"></i>
                                                                    <span>1,862K</span>
                                                                </p>
                                                            </div>
                                                            <div class="post-summary">
                                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                            </div>
                                                            <div class="post-button">
                                                                <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="text-center row-btn">
                                        <a class="button radius" href="#">View All Video</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- ad Section -->
                        <div class="googleAdv text-center">
                            <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
                        </div><!-- End ad Section -->

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
                                        <div class="row column head-text clearfix">
                                            <p class="pull-left">All Videos : <span>1,862 Videos posted</span></p>
                                            <div class="grid-system pull-right show-for-large">
                                                <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                                <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                                <a class="secondary-button current list" href="#"><i class="fa fa-th-list"></i></a>
                                            </div>
                                        </div>
                                        <div class="tabs-content" data-tabs-content="popularVideos">
                                            <div class="tabs-panel is-active" id="popular-all">
                                                <div class="row list-group" id="trending_add">
                                                    
                                                    @if(isset($lastSevenDaysMostViewsRecord))
                                                    @foreach($lastSevenDaysMostViewsRecord as $treanding)
                                                       {{-- @if($getVideoInfo->id != $treanding->id) --}}
                                                        <div class="item large-4 medium-6 columns grid-default" style="float:left;">
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
                                                                            <span>506</span>
                                                                        </div>
                                                                        <div class="thumb-stats pull-right">
                                                                            <span>05:56</span>
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
                                            {{-- <div class="tabs-panel" id="popular-hd">
                                                <div class="row list-group">
                                                    <div class="item large-4 medium-6 columns list">
                                                        <div class="post thumb-border">
                                                            <div class="post-thumb">
                                                                <img src="http://placehold.it/370x220" alt="new video">
                                                                <a href="single-video-v2.html" class="hover-posts">
                                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                                </a>
                                                                <div class="video-stats clearfix">
                                                                    <div class="thumb-stats pull-left">
                                                                        <h6>HD</h6>
                                                                    </div>
                                                                    <div class="thumb-stats pull-left">
                                                                        <i class="fa fa-heart"></i>
                                                                        <span>506</span>
                                                                    </div>
                                                                    <div class="thumb-stats pull-right">
                                                                        <span>05:56</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-des">
                                                                <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                                <div class="post-stats clearfix">
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-user"></i>
                                                                        <span><a href="#">admin</a></span>
                                                                    </p>
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span>5 January 16</span>
                                                                    </p>
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-eye"></i>
                                                                        <span>1,862K</span>
                                                                    </p>
                                                                </div>
                                                                <div class="post-summary">
                                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                                </div>
                                                                <div class="post-button">
                                                                    <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item large-4 medium-6 columns list">
                                                        <div class="post thumb-border">
                                                            <div class="post-thumb">
                                                                <img src="http://placehold.it/370x220" alt="new video">
                                                                <a href="single-video-v2.html" class="hover-posts">
                                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                                </a>
                                                                <div class="video-stats clearfix">
                                                                    <div class="thumb-stats pull-left">
                                                                        <h6>HD</h6>
                                                                    </div>
                                                                    <div class="thumb-stats pull-left">
                                                                        <i class="fa fa-heart"></i>
                                                                        <span>506</span>
                                                                    </div>
                                                                    <div class="thumb-stats pull-right">
                                                                        <span>05:56</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-des">
                                                                <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                                <div class="post-stats clearfix">
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-user"></i>
                                                                        <span><a href="#">admin</a></span>
                                                                    </p>
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-clock-o"></i>
                                                                        <span>5 January 16</span>
                                                                    </p>
                                                                    <p class="pull-left">
                                                                        <i class="fa fa-eye"></i>
                                                                        <span>1,862K</span>
                                                                    </p>
                                                                </div>
                                                                <div class="post-summary">
                                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                                </div>
                                                                <div class="post-button">
                                                                    <a href="single-video-v2.html#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="text-center row-btn">
                                            <a class="button radius" href="all-video.html">View All Video</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- ad Section -->
                                <div class="googleAdv">
                                    <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
                                </div><!-- End ad Section -->
                            </section><!-- End main content -->
                        </div>
                    </div><!-- end left side content area -->
                    </div>
                    
                    <!-- sidebar -->
                    <div id="class_add2" class="large-4 columns" style=" padding-left: 15px; max-width:">
                        <aside class="sidebar">
                            <div class="sidebarBg"></div>
                            <div class="row" style="width: 444px; ">
                                <!-- search Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
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
                                </div><!-- End search Widget -->

                                <!-- most view Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Most View Videos</h5>
                                        </div>
                                        <div class="widgetContent sidebarSearchClass">
                                            @if(isset($getMostViewVideos))
                                                @foreach($getMostViewVideos as $mVideo)
                                                    {{-- @if($getVideoInfo->id != $mVideo->id ) --}}
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
                                                    {{-- @endif --}}
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end most view Widget -->

                                <!-- social Fans Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>social fans</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="social-links">
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                    <span>698K</span>
                                                    <span>fans</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                    <span>598</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-google-plus"></i>
                                                    <span>98k</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-youtube"></i>
                                                    <span>168k</span>
                                                    <span>followers</span>
                                                </a>
                                                <a class="socialButton" href="#">
                                                    <i class="fa fa-vimeo"></i>
                                                    <span>498</span>
                                                    <span>followers</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End social Fans Widget -->

                                <!-- ad banner widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Recent post videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="advBanner text-center">
                                                <a href="#"><img src="images/sideradv.png" alt="sidebar adv"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end ad banner widget -->

                                <!-- Recent post videos -->
                                <div class="large-12 medium-7 medium-centered columns">
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
                                </div><!-- End Recent post videos -->

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
                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section>

            <!-- movies -->
            
            <!-- End movie -->
            <div class="ajax-load text-center" style="display:none">
                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More video</p>
            </div>
            <!-- footer -->
            @include('layout.footer')
            <!-- footer -->
        </div><!--end off canvas content-->
    </div><!--end off canvas wrapper inner-->
</div><!--end off canvas wrapper-->

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
?>
<script type="text/javascript">

    <?php foreach($getLatestUpload as $recentVideos) { ?>
       $(document).ready(function(){
            var myPlayer,
        overlayDisplayed,
        eOverlayButton = document.getElementById("overlayButton");
   // videojs.getPlayer('myPlayerID').ready(function() {
        // When the player is ready, get a reference to it
        myPlayer =   videojs('video_play_id{{$recentVideos->id }}',{controls: true,autoplay: false});
      // Initialize the overlay plugin with a clickable image
        var contentDisplay = "{{ isset($getVideoInfo->lyrics) ? $getVideoInfo->lyrics:''}}";
        console.log(contentDisplay);
        myPlayer.overlay({
        debug: true,
        
        "overlays": [
      <?php 
        if(!empty($lyrics_data)) {

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
});
<?php }?>


     var obj = {
            WelcomePage:function(data){
                $.ajax({
                    url: data.action,
                    type:"get",
                    data: data,
                    success:function(r){
                        if(r.status == true) {
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
                            $('#add_subscribe').html('');
                            $('#add_subscribe').html('<button type="button" style="background-color:#e96969;"  id="id-subscribe"  class="class-subscribe" data-status="yes" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBED </button>');
                            

                        }else if(r.status == true && r.subscription_status=='no') {

                            $('#add_subscribe').html('');
                            $('#add_subscribe').html('<button type="button"   id="id-subscribe"  class="class-subscribe" data-status="no" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBE </button>');

                        }else if(r.message == 'Unauthenticated') {

                            route = "{{route('login')}}";
                            window.location.href = route;
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
                            var style =" overflow-y:scroll;width:67.9%;  height:1200px; ";

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
                    $('.class-rederHtml').html(' ');
                    $('#makeHtml').html(' ');
                    $('#category').html(' ');
                    $('#add_trending_videos').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-6');
                    $('#class_remove_of_trending').addClass('large-7');
                    $('#class_remove_of_trending').css('width','68.3333%');
                    $('#class_add2').css('width','25.3333%');
                    $('.category_wise_filter').attr('id','');
                    $('.category_wise_filter').attr('id',res.id);
                     var myPlayer,
                    overlayDisplayed;
                   
                    
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
                     if(res.category_id == 2 || res.category_id == 4) {
                        eOverlayButton = document.getElementById("overlayButton");
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
                    }else{
                        var  eOverlayButton = document.getElementById("pdf");
                        overlayDisplayed = false;
                        var style = "display:none";
                        $('.vjs-overlay-top-right').attr("style",style);
                    }
               subscribeButtonHide();
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
                    $('.class-rederHtml').html(' ');
                    $('#makeHtml').html(' ');
                    $('#category').html(' ');
                    $('#add_trending_videos').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-6');
                    $('#class_remove_of_trending').addClass('large-7');
                     $('#class_remove_of_trending').css('width','68.3333%');
                    $('#class_add2').css('width','25.3333%');
                    $('.class_change_id').attr('id','');
                    $('.class_change_id').attr('id',res.id);

                    var myPlayer,
                    overlayDisplayed;
                    
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
                   if(res.category_id == 2 || res.category_id == 4) {
                        eOverlayButton = document.getElementById("overlayButton");
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
                    }else{
                        var  eOverlayButton = document.getElementById("pdf");
                        overlayDisplayed = false;
                        var style = "display:none";
                        $('.vjs-overlay-top-right').attr("style",style);
                    }
                 subscribeButtonHide();   
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
            AddToFavorate:function(data){
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        //console.log(r);
                        if(r.status == true && r.favorate_status=='yes') {
                            $('#add_fav').html('');
                            $('#add_fav').html('<button style="background-color:#e96969;" data-status="yes" type="button" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
                        }else if(r.status == true && r.favorate_status=='no') {
                            $('#add_fav').html('');
                            $('#add_fav').html('<button  type="button" data-status="no" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
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

        jQuery(document).ready(function() { 
            jQuery(document).on('change','.class-category',function() { 
                var query =  $('.typeahead').val();
                var category =  $('.class-category').val();
                var action = '{{ route('videoSearch') }}';
                var data = {query:query,category:category,target:'#add_render_html',action:action};
                obj.categoryFilter(data);
            });
        });

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
</body>
</html>



