<!doctype html>
<html class="no-js" lang="en">
<style type="text/css">
    .light-off-menu .off-menu li a {
        border-bottom: none;
    }
    
</style>
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.jpg') }}" />
    @yield('meta')
    @include('layout.header')  

</head>

<body>

<div class="off-canvas-wrapper">
    
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
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
                        <a href="{{ route('register') }}">Login/Register</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <header>
                <!--Navber-->
                <section id="navBar">
                    <div class="middleNav show-for-large">
                        <div class="row">
                            <div class="large-3 columns">
                                <div class="logo">
                                    <a href="@if(!empty(Auth::user()->id)) {{ route('home')}} @else {{ url('/')}} @endif"><img src="{{ asset('images/logo.jpg') }}" width="164px" alt="betube"></a>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="topCenterAdv text-center">
                                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- Header_Ad -->
                                    <ins class="adsbygoogle"
                                         style="display:block;height: 100px !important;"data-ad-client="ca-pub-6588458573329944"data-ad-slot="2349247468"
                                         data-full-width-responsive="true"></ins>
                                    <script>
                                         (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
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
                                                        <a href="{{ !empty(Auth::user()->id)? url('/profile/'.base64_encode(Auth::user()->id)) :''}}"><img src="{{ asset('images/profile-bg1.png') }}"  class="img-circle" style="border-radius: 50%;height: 30px; width: 30px;">Profile</a>
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
                                                <a href="{{ route('register') }}">Login/Register</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </section>
                 @yield('breadcrumb')
                 
            </header>
            <!-- End Header -->
            <!-- verticle thumb slider -->
            {{-- <div class="large-2 columns">
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
                        {{-- <li>
                            <a href="blog.html"><i class="fa fa-edit"></i>blog</a>
                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-magic"></i>features</a>
                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
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
                            </ul>
                            <hr class="hr-border">  
                        </li>
                        <li><a href="about-us.html"><i class="fa fa-comments"></i>Feedback </a></li>
                        <li><a href="contact-us.html"><i class="fa fa-envelope"></i>Help</a></li>
                    </ul>
                 </div> --}}
            {{-- </div> --}}

            @yield('body-content')
            @include('layout.footer')
            <!-- footer -->
        </div><!--end off canvas content-->
    </div><!--end off canvas wrapper inner-->
</div><!--end off canvas wrapper-->
<!-- script files -->
@include('layout.script')
@yield('script')
</body>
</html>



