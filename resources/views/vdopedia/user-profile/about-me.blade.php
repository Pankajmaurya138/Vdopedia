@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($userInfo->id)) }}">Profile</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> About-me
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section><!--end breadcrumbs-->
@endsection
@section('body-content')
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
                    <img src="@if($userInfo->profile_image){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="profile author image">
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
                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                            <span class="fa fa-twitter" style="color: #00acee; padding-right: 20px;"></span>
                        </button>
                        <button data-easyshare-button="google">
                            <span class="fa fa-google-plus" style="color: #dd4b39; padding-right: 20px;"></span>
                        </button>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h3>{{ucfirst($userInfo->name)}}</h3>
                        <p>Join Date : <span>{{ \Carbon\Carbon::parse($userInfo->created_at)->format('d-M-Y') }}</span></p>
                    </div>
                    <div class="profile-author-stats float-right">
                        <ul class="menu">
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-video-camera"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">{{ count($userInfo->getAllVideos) }}</p>
                                    <span>Videos</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon float-left">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="li-text float-left">
                                    <p class="number-text">{{ count($userInfo->getAllfavorateVideo) }}</p>
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
                        <div class="widgetContent">
                            <ul class="profile-overview">
                                <li class="clearfix">
                                    <a class="active" href="{{ url('profile/about-me/'.base64_encode(Auth::user()->id))}}">
                                        <i class="fa fa-user"></i>about me
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/video/'.base64_encode(Auth::user()->id))}}">
                                        <i class="fa fa-video-camera"></i>Videos 
                                        <span class="float-right">{{ count($userInfo->getAllVideos) }}</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/favorate/videos/'.base64_encode(Auth::user()->id)) }}">
                                        <i class="fa fa-heart"></i>Favorite Videos<span class="float-right">{{ count($userInfo->getAllfavorateVideo) }}</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/follower/'.base64_encode(Auth::user()->id)) }}">
                                        <i class="fa fa-users"></i>Followers<span class="float-right">@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/comments/'.base64_encode(Auth::user()->id)) }}">
                                        <i class="fa fa-comments-o"></i>comments<span class="float-right">{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</span>
                                    </a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
                                        <i class="fa fa-gears"></i>Profile Settings</a></li>
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
            </div>
        </aside>
    </div><!-- end sidebar -->
    <!-- right side content area -->
    <div class="large-8 columns profile-inner">
        <!-- single post description -->
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <i class="fa fa-user"></i>
                        <h4>Description</h4>
                    </div>
                    <div class="description">
                        <p>{{ $userInfo->bio_description }} </p>
                        <div class="site profile-margin">
                            <button><i class="fa fa-globe"></i>Site</button>
                            <a href="https://{{ $userInfo->website_url}}" class="inner-btn">{{ $userInfo->website_url}}</a>
                        </div>
                        <div class="email profile-margin" >
                            <button  ><i class="fa fa-envelope"  ></i>Email </button> <button id="userInfoEmail" data-user_id="{{isset(Auth::user()->id) ? Auth::user()->id:''}}">click here to see email</button>
                            <span class="inner-btn show_info" style="display: none;">@if(isset($userInfo->email)){{ $userInfo->email }}@endif</span>
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
                            <div style="float;left;" class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://vdopedia.com">
                                <button class="secondary-button" data-easyshare-button="facebook" data-toggle="tooltip" data-placement="top"  title="share on facebook" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                    <i   class="fa fa-facebook"></i>
                                </button>
                                <button class="secondary-button" data-easyshare-button="twitter" data-toggle="tooltip" data-placement="top" title="share on twitter" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                    <i  class="fa fa-twitter"></i>
                                </button>
                                 <button class="secondary-button" data-easyshare-button="linkedin" data-toggle="tooltip" data-placement="top" title="share on linkedin" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                    <i   class="fa fa-linkedin"></i>
                                </button>
                                <!-- Google+ -->
                                <button  class="secondary-button" data-easyshare-button="google" >
                                    <i data-toggle="tooltip" data-placement="top" title="share on google plus" class="fa fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End single post description -->
    </div><!-- end left side content area -->
</div>

@endsection

@section('script')
<script type="text/javascript">
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