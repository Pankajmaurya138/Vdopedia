@extends('layout.app_new')
@section('breadcrumb')
    <!--breadcrumbs-->
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Profile
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section><!--end breadcrumbs-->
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
                <h3>World’s Biggest</h3>
                <h1>Powerfull Video Theme</h1>
            </div>
        </div>
    </div>
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img">
                    <img src="@if(isset($userInfo->profile_image)){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="profile author img">
                </div>
                <div class="profile-subscribe">
                    <span><i class="fa fa-users"></i>@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span>
                    <button type="submit" name="subscribe">subscribe</button>
                </div>
                <div class="profile-share">
                    <div class="easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com">
                        <!-- Facebook -->
                        <button data-easyshare-button="facebook">
                            <span class="fa fa-facebook"></span>
                            <span>Share</span>
                        </button>
                        <span data-easyshare-button-count="facebook">0</span>

                        <!-- Twitter -->
                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                            <span class="fa fa-twitter"></span>
                            <span>Tweet</span>
                        </button>
                        <span data-easyshare-button-count="twitter">0</span>

                        <!-- Google+ -->
                        <button data-easyshare-button="google">
                            <span class="fa fa-google-plus"></span>
                            <span>+1</span>
                        </button>
                        <span data-easyshare-button-count="google">0</span>

                        <div data-easyshare-loader>Loading...</div>
                    </div>
                </div>

                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h4>@if(isset($userInfo->name)){{ucfirst($userInfo->name)}} @endif</h4>
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
                                    <p class="number-text">@if(isset($userInfo->getAllVideos)){{ count($userInfo->getAllVideos) }}@endif</p>
                                    <span>favorites</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">@if(isset($userInfo->getAllVideos)){{ count($userInfo->getAllVideos) }}@endif</p>
                                    <span>followers</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">@if(isset($userInfo->getAllVideos)){{ count($userInfo->getAllVideos) }}@endif</p>
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
                    </div>
                    <div class="description">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

                        <div class="site profile-margin">
                            <button><i class="fa fa-globe"></i>Site</button>
                            <a href="#" class="inner-btn">www.betube.com</a>
                        </div>
                        <div class="email profile-margin">
                            <button><i class="fa fa-envelope"></i>Email</button>
                            <span class="inner-btn">@if(isset($userInfo->email)){{ $userInfo->email }}@endif</span>
                        </div>
                        @if(isset($userInfo->privacy))
                            @if($userInfo->privacy == 'yes')
                                <div class="phone profile-margin">
                                    <button><i class="fa fa-phone"></i>Phone</button>
                                    <span class="inner-btn">@if(isset($userInfo->mobile)){{ $userInfo->mobile }}@endif</span>
                                </div>
                            @endif
                        @endif
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

        <!-- author videos -->
        <section class="content content-with-sidebar margin-bottom-10">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="row column head-text clearfix">
                        <h4 class="pull-left"><i class="fa fa-video-camera"></i>Videos</h4>
                        <div class="grid-system pull-right show-for-large">
                            <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                            <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                            <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                    <div class="tabs-content" data-tabs-content="newVideos">
                        <div class="tabs-panel is-active" id="new-all">
                            <div class="row list-group">
                                @if(isset($userInfo->getAllVideos))
                                @foreach($userInfo->getAllVideos as $video)
                                <div class="item large-4 medium-6 columns group-item-grid-default">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="{{asset('storage')}}\{{ $video->image_file }}" alt="new video">
                                            <a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="hover-posts">
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
                                            <h6><a href="#">{{ $video->title }}</a></h6>
                                            <div class="post-stats clearfix">
                                                <p class="pull-left">
                                                    <i class="fa fa-user"></i>
                                                    <span><a href="#">{{ $video->getUserInfo->name }}</a></span>
                                                </p>
                                                <p class="pull-left">
                                                    <i class="fa fa-clock-o"></i>
                                                    <span>{{  \Carbon\Carbon::parse($video->upload_date)->format('d-M-Y') }}</span>
                                                </p>
                                                <p class="pull-left">
                                                    <i class="fa fa-eye"></i>
                                                    <span>{{ $video->likes }}</span>
                                                </p>
                                            </div>
                                            <div class="post-summary">
                                                <p> {{ $video->discription }}</p>
                                            </div>
                                            <div class="post-button">
                                                <a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                {{-- <div class="item large-4 medium-6 columns group-item-grid-default">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns group-item-grid-default">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns group-item-grid-default">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns group-item-grid-default">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns group-item-grid-default end">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="text-center row-btn">
                        <a class="button radius" href="#">View All Video</a>
                    </div>
                </div>
            </div>
        </section>

        {{-- <!--author favorite videos-->
        <section class="content content-with-sidebar margin-bottom-10">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="row column head-text clearfix">
                        <h4 class="pull-left"><i class="fa fa-video-camera"></i>Videos</h4>
                        <div class="grid-system pull-right show-for-large">
                            <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                            <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                            <a class="secondary-button current list" href="#"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div>
                    <div class="tabs-content" data-tabs-content="newVideos">
                        <div class="tabs-panel is-active" id="favorite">
                            <div class="row list-group">

                                <div class="item large-4 medium-6 columns list">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns list">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns list">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item large-4 medium-6 columns list end">
                                    <div class="post thumb-border">
                                        <div class="post-thumb">
                                            <img src="http://placehold.it/370x220" alt="new video">
                                            <a href="#" class="hover-posts">
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
                                            <h6><a href="#">There are many variations of passage.</a></h6>
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
                                                <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
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
        </section> --}}

        <!-- followers -->
        <section class="content content-with-sidebar followers margin-bottom-10">
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
                                        <span>{{ $subscriber->subscriberInfo->name }}</span>
                                        <button type="submit" name="follow">Subscribe</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Comments -->
        <section class="content comments">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-12 small-12 columns">
                                <div class="head-title">
                                    <i class="fa fa-comments"></i>
                                    <h4>Comments <span>(4)</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-box thumb-border">
                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                     <img src="@if($userInfo->profile_image){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="profile author img">
                                </div>
                                <h6><a href="#">{{ ucfirst($userInfo->name) }}</a></h6>
                            </div>
                            <div class="media-object-section comment-textarea">
                                {{-- <form method="post"> --}}
                                    <textarea name="commentText" id="commentText" placeholder="Add a comment here.."></textarea>
                                    <div class="error comment"></div>
                                    <input type="submit" id="id-comment" data-user_id="{{ $userInfo->id }}" data-video_id="{{ $video->id }}"name="comment" value="send">
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="comment-sort text-right">
                        <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                    </div>

                   <div id="add-comment">
                        <!-- main comment -->
                    <div class="main-comment showmore_one">
                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                    <img src= "http://placehold.it/80x80" alt="comment">
                                </div>
                            </div>
                            <div class="media-object-section comment-desc">
                                <div class="comment-title">
                                    <span class="name"><a href="#">Joseph John</a> Said:</span>
                                    <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                </div>
                                <div class="comment-text">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                </div>
                                <div class="comment-btns">
                                    <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                    <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                    <span class='reply float-right hide-reply'></span>
                                </div>

                                <!--sub comment-->
                                <div class="media-object stack-for-small reply-comment">
                                    <div class="media-object-section comment-img text-center">
                                        <div class="comment-box-img">
                                            <img src= "http://placehold.it/80x80" alt="comment">
                                        </div>
                                    </div>
                                    <div class="media-object-section comment-desc">
                                        <div class="comment-title">
                                            <span class="name"><a href="#">Nancy John</a> Said:</span>
                                            <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                        </div>
                                        <div class="comment-text">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                        </div>
                                        <div class="comment-btns">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                            <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                            <span class='reply float-right hide-reply'></span>
                                        </div>
                                    </div>
                                </div><!-- end sub comment -->

                                <!--sub comment-->
                                <div class="media-object stack-for-small reply-comment">
                                    <div class="media-object-section comment-img text-center">
                                        <div class="comment-box-img">
                                            <img src= "http://placehold.it/80x80" alt="comment">
                                        </div>
                                    </div>
                                    <div class="media-object-section comment-desc">
                                        <div class="comment-title">
                                            <span class="name"><a href="#">frank</a> Said:</span>
                                            <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                        </div>
                                        <div class="comment-text">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                        </div>
                                        <div class="comment-btns">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                            <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                            <span class='reply float-right hide-reply'></span>
                                        </div>

                                    </div>
                                </div><!-- end sub comment -->

                            </div>
                        </div>

                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                    <img src= "http://placehold.it/80x80" alt="comment">
                                </div>
                            </div>
                            <div class="media-object-section comment-desc">
                                <div class="comment-title">
                                    <span class="name"><a href="#">Joseph John</a> Said:</span>
                                    <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                </div>
                                <div class="comment-text">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                </div>
                                <div class="comment-btns">
                                    <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                    <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                    <span class='reply float-right hide-reply'></span>
                                </div>

                            </div>
                        </div>

                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                    <img src= "http://placehold.it/80x80" alt="comment">
                                </div>
                            </div>
                            <div class="media-object-section comment-desc">
                                <div class="comment-title">
                                    <span class="name"><a href="#">Nancy John</a> Said:</span>
                                    <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                </div>
                                <div class="comment-text">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                </div>
                                <div class="comment-btns">
                                    <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                    <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                    <span class='reply float-right hide-reply'></span>
                                </div>
                                <!--sub comment-->
                                <div class="media-object stack-for-small reply-comment">
                                    <div class="media-object-section comment-img text-center">
                                        <div class="comment-box-img">
                                            <img src= "http://placehold.it/80x80" alt="comment">
                                        </div>
                                    </div>
                                    <div class="media-object-section comment-desc">
                                        <div class="comment-title">
                                            <span class="name"><a href="#">Joseph John</a> Said:</span>
                                            <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                        </div>
                                        <div class="comment-text">
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                        </div>
                                        <div class="comment-btns">
                                            <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                            <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                            <span class='reply float-right hide-reply'></span>
                                        </div>
                                        <!--sub comment-->
                                        <div class="media-object stack-for-small reply-comment">
                                            <div class="media-object-section comment-img text-center">
                                                <div class="comment-box-img">
                                                    <img src= "http://placehold.it/80x80" alt="comment">
                                                </div>
                                            </div>
                                            <div class="media-object-section comment-desc">
                                                <div class="comment-title">
                                                    <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                    <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                </div>
                                                <div class="comment-text">
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                </div>
                                                <div class="comment-btns">
                                                    <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                    <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                    <span class='reply float-right hide-reply'></span>
                                                </div>
                                            </div>
                                        </div><!-- end sub comment -->
                                    </div>
                                </div><!-- end sub comment -->
                            </div>
                        </div>
                    </div><!-- End main comment -->
                   </div>

                </div>
            </div>
        </section>
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
                                        <span class="float-right">26</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/setting/'.base64_encode($userInfo->id)) }}">
                                        <i class="fa fa-gears"></i>Profile Settings
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

                <!-- categories -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox clearfix">
                        <div class="widgetTitle">
                            <h5>Categories</h5>
                        </div>
                        <div class="widgetContent">
                            <ul>
                                <li class="cat-item"><a href="#">Entertainment &nbsp; (6)</a></li>
                                <li class="cat-item"><a href="#">Historical &amp; Archival &nbsp;(8)</a></li>
                                <li class="cat-item"><a href="#">Technology&nbsp;(4)</a></li>
                                <li class="cat-item"><a href="#">People&nbsp;(3)</a></li>
                                <li class="cat-item"><a href="#">Fashion &amp; Beauty&nbsp;(2)</a></li>
                                <li class="cat-item"><a href="#">Nature&nbsp;(1)</a></li>
                                <li class="cat-item"><a href="#">Automotive&nbsp;(5)</a></li>
                                <li class="cat-item"><a href="">Foods &amp; Drinks&nbsp;(5)</a></li>
                                <li class="cat-item"><a href="#">Foods &amp; Drinks&nbsp;(10)</a></li>
                                <li class="cat-item"><a href="#">Animals&nbsp;(12)</a></li>
                                <li class="cat-item"><a href="#">Sports &amp; Recreation&nbsp;(14)</a></li>
                                <li class="cat-item"><a href="">Places &amp; Landmarks&nbsp;(16)</a></li>
                                <li class="cat-item"><a href="">Places &amp; Landmarks&nbsp;(1)</a></li>
                                <li class="cat-item"><a href="#">Travel&nbsp;(2)</a></li>
                                <li class="cat-item"><a href="#">Transportation&nbsp;(3)</a></li>
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
 @endif
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

            <!-- footer -->
@endsection

@section('script')
    
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
                      var comment =  $('#commentText').val('');
                       getAllComment();
                        
                    }
                }
            });
        },
    }
    jQuery(document).ready(function() {
        jQuery(document).on('click','#id-comment',function() {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var comment =  $('#commentText').val();
            var _token ="{{ csrf_token() }}";
          console.log(user_id);
          console.log(video_id);
          console.log(comment);
            var action = '{{ route('comment') }}';
            var data = {user_id:user_id,video_id:video_id,_token:_token,comment:comment,action:action};
            obj.commentSection(data);
        });
    });

   jQuery(document).ready(function() {
        
       getAllComment();
   });
    </script>
@endsection


