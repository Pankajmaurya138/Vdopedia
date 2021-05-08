<!doctype html>
<html class="no-js" lang="en">

@include('layout.header')
<body>
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <!--header-->
         @include('layout.top-menu')
        <div class="off-canvas-content" data-off-canvas-content>
            @include('layout.header-top')
            <!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                                <li>
                                    <span class="show-for-sr">Current: </span> Register
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <!-- registration -->
            @yield('body-content')
            <!-- footer -->
            @include('layout.footer')
            @include('layout.script')
            
        @push('extra-script')
        @yield('script')
</body>
</html>