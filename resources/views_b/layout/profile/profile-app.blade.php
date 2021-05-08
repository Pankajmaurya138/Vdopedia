@extends('layout.app_new')
@section('breadcrumb')
    <!--breadcrumbs-->
@yield('profile-breadcrumb')
@endsection
@section('body-content')

<!-- profile top section -->
<?php 

if(isset($userInfo->background_image)){
   $url = asset('storage')."/".$userInfo->background_image;
}
?>
<section class="topProfile" @if(isset($userInfo->background_image))  style="background: url({{ $url }});  @endif">
    <div class="main-text text-center">
        <div class="row">
            <div class="large-12 columns">
                <h3>World’s Biggest</h3>
                <h1>Powerfull Video Theme</h1>
            </div>
        </div>
    </div>
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img">
                    <img src="@if($userInfo->profile_image){{asset('storage')}}/{{$userInfo->profile_image}}@else {{asset('storage')  }}/{{'images/user.png'}} @endif" alt="profile author img">
                </div>
                <div class="profile-subscribe">
                    <span><i class="fa fa-users"></i>@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span>
                    <button type="submit" name="subscribe">subscribe</button>
                </div>
                 <div class="profile-share">
                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://vdopedia.com">
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
                        <h4>{{ucfirst($userInfo->name)}}</h4>
                        <p>Join Date : <span>{{ \Carbon\Carbon::parse($userInfo->created_at)->format('d-M-Y') }}</span></p>
                    </div>
                    <div class="profile-author-stats float-right">
                        <ul class="menu">
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text" id="updateCountOfAllVideos">{{ count($userInfo->getAllVideos) }}</p>
                                    <span>Videos</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text" id="updateCountOfFavorateVideos">{{ count($userInfo->getAllfavorateVideo) }}</p>
                                    <span>favorites</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</p>
                                    <span>followers</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text comment_count_id" >{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</p>
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
    <!-- left sidebar -->
    <div class="large-4 columns">
        <aside class="secBg sidebar">
            <div class="row">
                <!-- profile overview -->
                <div class="large-12 columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Profile Overview</h5>
                        </div>
                        @yield('profile-sidebar')
                    </div>
                </div><!-- End profile overview -->
            </div>
        </aside>
    </div><!-- end sidebar -->
    <!-- right side content area -->
    {{-- <div class="large-8 columns profile-inner">
        <!-- single post description -->
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <i class="fa fa-user"></i>
                        <h4>Description</h4>
                    </div>
                    <div class="description">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                        <div class="site profile-margin">
                            <button><i class="fa fa-globe"></i>Site</button>
                            <a href="#" class="inner-btn">www.betube.com</a>
                        </div>
                        <div class="email profile-margin">
                            <button><i class="fa fa-envelope"></i>Email</button>
                            <span class="inner-btn">{{ $userInfo->email }}</span>
                        </div>
                        <div class="phone profile-margin">
                            <button><i class="fa fa-phone"></i>Phone</button>
                            <span class="inner-btn">{{ $userInfo->mobile }}</span>
                        </div>
                        <div class="socialLinks profile-margin">
                            <button><i class="fa fa-share-alt"></i>get socialize</button>
                            <a href="#" class="inner-btn"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="inner-btn"><i class="fa fa-flickr"></i></a>
                        </div>


                    </div>
                </div>
            </div>
        </section><!-- End single post description -->
    </div> --}}<!-- end left side content area -->

    @yield('user-profile')
</div>

@endsection

@section('script')

@endsection