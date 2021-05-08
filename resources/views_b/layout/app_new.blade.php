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
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!--header-->  
        <div class="off-canvas position-left light-off-menu dark-off-menu" id="offCanvas" data-off-canvas>
           
            <div class="off-social">
                <h6>Get Socialize</h6>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/vdopedia_/"><i class="fa fa-instagram"></i></a>
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
                                    <a href="{{ route('home')}}"><img src="{{ asset('images/logo.jpg') }}" width="164px" alt="betube"></a>
                                </div>
                            </div>
                            <div class="large-6 columns">
                                <div class="topCenterAdv text-center">
                                    <img src="{{ asset('images/header-top-img.png') }}" alt="betube">
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
                                                    {{-- <li role="menuitem" class="is-submenu-item is-dropdown-submenu-item"><a href="login.html"><i class="fa fa-magic"></i>Lock Screen</a></li> --}}
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



