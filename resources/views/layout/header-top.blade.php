<header>
<!-- Top -->
    <section id="top" class="topBar show-for-large">
        <div class="row">
            <div class="medium-6 columns">
                <div class="socialLinks">
                    <a href="{{ url('auth/facebook') }}"><i class="fa fa-facebook-f"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-vimeo"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="medium-6 columns">
                <div class="top-button">
                    <ul class="menu float-right">
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
                                            <a href="404.html"><img src="{{ asset('images/profile-bg1.png') }}"  class="img-circle" style="border-radius: 50%;height: 30px; width: 30px;">Profile</a>
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
                                        <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item">
                                            <a href="login.html"><i class="fa fa-magic"></i>Lock Screen</a>
                                        </li>
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
    </section><!-- End Top -->
                <!--Navber-->
    <section id="navBar">
        <nav class="sticky-container" data-sticky-container>
            <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                            <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                            <div class="title-bar-title"><img src="{{ asset('images/logo-small.png')}}" alt="logo"></div>
                        </div>

                        <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                            <div class="top-bar-left">
                                <ul class="menu">
                                    <li class="menu-text">
                                        <a href="@if(Auth::id()){{ route('home')}} @else {{ url('/')}} @endif"><img src="{{ asset('images/logo.jpg')}}" alt="Betube" width="164px"></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-bar-right search-btn">
                                <ul class="menu">
                                    <li class="search">
                                        <i class="fa fa-search"></i>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="top-bar-right">
                                <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                    <li class="has-submenu active">
                                        <a href="#"><i class="fa fa-home"></i>Home</a>
                                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                            <li><a href="index.html"><i class="fa fa-home"></i>Home page v1</a></li>
                                            <li><a href="home-v2.html"><i class="fa fa-home"></i>Home page v2</a></li>
                                            <li><a href="home-v3.html"><i class="fa fa-home"></i>Home page v3</a></li>
                                            <li><a href="home-v4.html"><i class="fa fa-home"></i>Home page v4</a></li>
                                            <li><a href="home-v5.html"><i class="fa fa-home"></i>Home page v5</a></li>
                                            <li><a href="home-v6.html"><i class="fa fa-home"></i>Home page v6</a></li>
                                            <li><a href="home-v7.html"><i class="fa fa-home"></i>Home page v7</a></li>
                                            <li><a href="home-v8.html"><i class="fa fa-home"></i>Home page v8</a></li>
                                            <li><a href="home-v9.html"><i class="fa fa-home"></i>Home page v9</a></li>
                                            <li><a href="home-v10.html"><i class="fa fa-home"></i>Home page v10</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu" data-dropdown-menu="example1">
                                        <a href="#"><i class="fa fa-film"></i>Videos</a>
                                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                            <li><a href="single-video-v1.html"><i class="fa fa-film"></i>single video v1</a></li>
                                            <li><a href="single-video-v2.html"><i class="fa fa-film"></i>single video v2</a></li>
                                            <li><a href="single-video-v3.html"><i class="fa fa-film"></i>single video v3</a></li>
                                            <li><a href="submit-post.html"><i class="fa fa-film"></i>submit post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li>
                                    <li>
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
                                    </li>
                                    <li><a href="about-us.html"><i class="fa fa-user"></i>about</a></li>
                                    <li><a href="contact-us.html"><i class="fa fa-envelope"></i>contact</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div id="search-bar" class="clearfix search-bar-light">
                    <form method="post">
                        <div class="search-input float-left">
                            <input type="search" name="search" placeholder="Seach Here your video">
                        </div>
                        <div class="search-btn float-right text-right">
                            <button class="button" name="search" type="submit">search now</button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </section>
</header>
<!-- End Header -->