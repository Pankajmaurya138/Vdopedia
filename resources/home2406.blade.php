<!doctype html>
<html class="no-js" lang="en">
<style type="text/css">
    .light-off-menu .off-menu li a {
        border-bottom: none;
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
                    <a href="welcome">Home</a>
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
                                    <a href="index.html"><img src="images/logo.jpg" width="164px" alt="betube"></a>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="topCenterAdv text-center">
                                    <img src="images/header-top-img.png" alt="betube">
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
                                                    <li role="menuitem" class="upl-btn">
                                                        <a href="{{ url('profile/'.base64_encode(Auth::user()->id)) }}"><img src="{{ asset('images/profile-bg1.png') }}"  class="img-circle" style="border-radius: 50%;height: 30px; width: 30px;">Profile</a>
                                                    </li>
                                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item">
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
                                                    <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="login.html"><i class="fa fa-magic"></i>Lock Screen</a></li>
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
                                                            <select name="category_id" id="id-category" class="form-control" class="category">
                                                                <option value="" >All</option>
                                                            <?php $category = \App\Models\Category::all();?>
                                                            @foreach ($category as $key => $cat)
                                                                <option onchange="getCategory()"value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                            <a href="#"><i class="fa fa-home"></i>Home</a>
                            <a href="#"><i class="fa fa-fire"></i></i>Trending</a>
                            <a href="#"><i class="fa fa-fire"></i></i>Following</a>
                        </li>
                        <hr class="hr-border">  
                        <li class="has-submenu" data-dropdown-menu="example1">
                            <a href="#"><i class="fa fa-th"></i>category</a>
                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                <li><a href="single-video-v1.html"><i class="fa fa-film"></i>New Videos</a></li>
                                <li><a href="single-video-v2.html"><i class="fa fa-film"></i>New Songs</a></li>
                                <li><a href="single-video-v3.html"><i class="fa fa-film"></i>Technology</a></li>
                                <li><a href="submit-post.html"><i class="fa fa-film"></i>News</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li> --}}
                        <li>
                            <a href="blog.html"><i class="fa fa-edit"></i>blog</a>
                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-magic"></i>features</a>
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
                        <li><a href="about-us.html"><i class="fa fa-comments"></i>Feedback </a></li>
                        <li><a href="contact-us.html"><i class="fa fa-envelope"></i>Help</a></li>
                    </ul>
                 </div>
            </div>
            <div class="class-rederHtml"></div>
            <div class="large-10 columns" id="makeHtml"  style="float: right">
                <section id="verticalSlider" >
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="thumb-slider">
                                <div class="main-image player-width" style="width: 780px;">
                                    <div class="image 1" >
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/YE7VzlLtp-4" allowfullscreen></iframe>
                                    </div>
                                    <div class="image 2">
                                        <img src="http://placehold.it/800x400" alt="imaga">
                                        <a href="https://www.youtube.com/embed/YE7VzlLtp-4" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                    </div>
                                    <div class="image 3">
                                        <img src="http://placehold.it/800x400" alt="imaga">
                                        <a href="single-video-v1.html" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                    </div>
                                    <div class="image 4">
                                        <img src="http://placehold.it/800x400" alt="imaga">
                                        <a href="single-video-v1.html" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="thumbs large-2" style="margin-left: 20px;">
                                    <div class="thumbnails">
                                        <div class="ver-thumbnail image-margin" id="1" >
                                             <iframe width="370" height="200" src="https://www.youtube.com/embed/YE7VzlLtp-4" allowfullscreen></iframe>
                                            <div class="item-title">
                                                <span>Technology</span>
                                                <h6>The standard chunk of Lorem Ipsum used since.</h6>
                                            </div>
                                        </div>
                                        <div class="ver-thumbnail image-margin " id="2" >
                                            <img src="http://placehold.it/800x400" alt="imaga">
                                            <div class="item-title">
                                                <span>Technology</span>
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
                                        </div>
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
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Entertainment</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Technology</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Fashion &amp; Beauty</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Sports</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Foods &amp; Drinks</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Automotive</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Sports</a></h6>
                            </div>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="http://placehold.it/185x130" alt="carousel">
                                    <a href="categories.html" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="categories.html">Foods &amp; Drinks</a></h6>
                            </div>
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
                <div class="row">
                    <!-- left side content area -->
                    <div class="large-8 columns parentbg">
                        <div class="sidebarBg"></div>
                        <section class="content content-with-sidebar">
                            <!-- newest video -->
                            <div class="main-heading borderBottom">
                                <div class="row padding-14 ">
                                    <div class="medium-8 small-8 columns">
                                        <div class="head-title">
                                            <i class="fa fa-film"></i>
                                            <h4>Newest Videos</h4>
                                        </div>
                                    </div>
                                    <div class="medium-4 small-4 columns">
                                        <ul class="tabs text-right pull-right" data-tabs id="newVideos">
                                            <li class="tabs-title is-active"><a href="#new-all">all</a></li>
                                            <li class="tabs-title"><a href="#new-hd">HD</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <div class="row column head-text clearfix">
                                        <p class="pull-left">All Videos : <span>1,862 Videos posted</span></p>
                                        <div class="grid-system pull-right show-for-large">
                                            <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                            <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                            <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                        </div>
                                    </div>
                                    <div class="tabs-content" data-tabs-content="newVideos">
                                        <div class="tabs-panel is-active" id="new-all">
                                            <div class="row list-group">
                                                <div class="item large-4 medium-6 columns grid-medium">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="{{ asset('/') }}" alt="new video">
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
                                                <div class="item large-4 medium-6 columns grid-medium">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="http://placehold.it/370x220" alt="new video">
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
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

                                                <div class="item large-4 medium-6 columns grid-medium">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="http://placehold.it/370x220" alt="new video">
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
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
                                        </div>
                                        <div class="tabs-panel" id="new-hd">
                                            <div class="row list-group">
                                                <div class="item large-4 medium-6 columns grid-medium">
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
                                        </div>
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
                        <section class="content content-with-sidebar">
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
                                            <li class="tabs-title"><a href="#popular-hd">HD</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                                                <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item large-4 medium-6 columns list end">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="http://placehold.it/370x220" alt="new video">
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
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
                                            </div>
                                        </div>
                                        <div class="tabs-panel" id="popular-hd">
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
                                        </div>
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

                    </div><!-- end left side content area -->
                    <!-- sidebar -->
                    <div class="large-4 columns">
                        <aside class="sidebar">
                            <div class="sidebarBg"></div>
                            <div class="row">
                                <!-- search Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Search Videos</h5>
                                        </div>
                                        <form id="searchform" method="get" role="search">
                                            <div class="input-group">
                                                <input class="input-group-field" type="text" placeholder="Enter your keyword">
                                                <div class="input-group-button">
                                                    <input type="submit" class="button" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- End search Widget -->

                                <!-- most view Widget -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>Most View Videos</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <div class="video-box thumb-border">
                                                <div class="video-img-thumb">
                                                    <img src="http://placehold.it/300x190" alt="most viewed videos">
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
                                                <div class="video-box-content">
                                                    <h6><a href="#">There are many variations of passage. </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                        <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                        <span><i class="fa fa-eye"></i>1,862K</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="video-box thumb-border">
                                                <div class="video-img-thumb">
                                                    <img src="http://placehold.it/300x190" alt="most viewed videos">
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
                                                <div class="video-box-content">
                                                    <h6><a href="#">There are many variations of passage. </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                        <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                        <span><i class="fa fa-eye"></i>1,862K</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="video-box thumb-border">
                                                <div class="video-img-thumb">
                                                    <img src="http://placehold.it/300x190" alt="most viewed videos">
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
                                                <div class="video-box-content">
                                                    <h6><a href="#">There are many variations of passage. </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                        <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                        <span><i class="fa fa-eye"></i>1,862K</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="video-box thumb-border">
                                                <div class="video-img-thumb">
                                                    <img src="http://placehold.it/300x190" alt="most viewed videos">
                                                    <a href="#" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                </div>
                                                <div class="video-box-content">
                                                    <h6><a href="#">There are many variations of passage. </a></h6>
                                                    <p>
                                                        <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                        <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                        <span><i class="fa fa-eye"></i>1,862K</span>
                                                    </p>
                                                </div>
                                            </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Recent post videos -->

                                <!-- tags -->
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
                                </div><!-- End tags -->
                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section>

            <!-- movies -->
            
            <!-- End movie -->
            
            <!-- footer -->
            @include('layout.footer')
            <!-- footer -->
        </div><!--end off canvas content-->
    </div><!--end off canvas wrapper inner-->
</div><!--end off canvas wrapper-->
<!-- script files -->
@include('layout.script')
<script type="text/javascript">
     var obj = {
            WelcomePage:function(data){
                $.ajax({
                    url: data.action,
                    type:"get",
                    data: data,
                    success:function(r){
                        console.log(r);
                        if(r.status == true) {
                            $('.class-rederHtml').html('');
                            $('#category').html('');
                            $('#makeHtml').html('');
                            $('#verticalSlider').html('');
                            $('#id-mainContentv3').html('');
                            $(data.target).html(r.html);
                            
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
                var data = {query:query,category:category,target:'.class-rederHtml',action:action};
                obj.WelcomePage(data);
            });
        });
        
    
</script>

</body>
</html>



