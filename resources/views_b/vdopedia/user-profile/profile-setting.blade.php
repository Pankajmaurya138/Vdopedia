@extends('layout.profile.profile-app')

@section('profile-breadcrumb')

 <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($userInfo->id)) }}">Profile</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Setting
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section><!--end breadcrumbs-->
@endsection

@section('profile-sidebar')

	<div class="widgetContent">
	    <ul class="profile-overview">
	        <li class="clearfix">
                <a  href="{{ url('profile/about-me/'.base64_encode(Auth::user()->id))}}">
                    <i class="fa fa-user"></i>about me
                </a>
            </li>
	        <li class="clearfix">
                <a  href="{{ url('profile/video/'.base64_encode(Auth::user()->id))}}">
                    <i class="fa fa-video-camera"></i>Videos 
                    <span class="float-right">{{ count($userInfo->getAllVideos) }}</span>
                </a>
            </li>
	        <li class="clearfix">
                <a  href="{{ url('profile/favorate/videos/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-heart"></i>Favorite Videos
                    <span class="float-right">{{ count($userInfo->getAllfavorateVideo) }}</span>
                </a>
            </li>
	        <li class="clearfix">
                <a href="{{ url('profile/follower/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-users"></i>Followers
                    <span class="float-right">@if(isset($userInfo->getAllSubscriber)) {{ count($userInfo->getAllSubscriber) }}   @endif</span>
                </a>
            </li>
	         <li class="clearfix">
                <a  href="{{ url('profile/comments/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-comments-o"></i>comments
                    <span class="float-right">{{ !empty(Session::get('commentCount')) ? '('.Session::get('commentCount').')':'' }}</span>
                </a>
            </li>
            <li class="clearfix">
                <a class="active" href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
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

@endsection

@section('user-profile')
<!-- right side content area -->
<div class="large-8 columns profile-inner">
    <!-- profile settings -->
    <section class="profile-settings">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="heading">
                    <i class="fa fa-gears"></i>
                    <h4>Profile Settings</h4>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="setting-form">
                            <form  id="profileSettingsForm" enctype="multipart/form-data">
                                @csrf
                                <div class="setting-form-inner">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom">Username Setting:</h6>
                                        </div>
                                        <div class="medium-6 columns" style="float: left;">
                                            <label>Username:
                                                <input type="text" value="{{ $userInfo->name }}" name="username" placeholder="enter your first name..">
                                            </label>
                                            <div class="error username "></div>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $userInfo->id }}">
                                    </div>
                                </div>
                                <div class="setting-form-inner">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom">About Me:</h6>
                                        </div>
                                        <div class="medium-6 columns">
                                            <label>Email ID:
                                                <input type="email" value="{{ $userInfo->email }}"  name="email" placeholder="enter your email address..">
                                            </label>
                                             <div class="error email "></div>
                                        </div>
                                        <div class="medium-6 columns">
                                            <label>Age:
                                                <input type="text" name="age" value="{{ $userInfo->age }}" placeholder="enter your age..">
                                            </label>
                                            <div class="error age "></div>
                                        </div>
                                        <div class="medium-6 columns end">
                                            <label>Mobile No:
                                                <input type="tel" value="{{ $userInfo->mobile }}"  name="mobile" placeholder="enter your mobile number ..">
                                            </label>
                                            <div class="error mobile "></div>
                                        </div>
                                        <div class="medium-6 columns end">
                                            <label>Sex:
                                                <select name="sex" id="sex" class="input-group-field form-control">
                                                    <option class="input-group-field" @if($userInfo->sex == 'male')
                                                    selected="selected" @endif value="male">Male</option>
                                                    <option class="input-group-field" @if( $userInfo->sex == 'female')
                                                    selected="selected" @endif value="female">Female</option>
                                                </select>
                                            </label>
                                            <div class="error sex "></div>
                                        </div>
                                        <div class="medium-12 columns">
                                            <label>Bio Description:
                                                <textarea name="bio_description" placeholder="enter your bio discription">{{ $userInfo->bio_description }}</textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-form-inner">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom">Profile Image:</h6>
                                        </div>
                                        <div class="large-12 columns">
                                            <div class="medium-6 columns">
                                                <input type="file" id="profile_image" @if($userInfo->profile_image){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif name="profile_image" >
                                                <div class="error profile_image "></div>
                                            </div>
                                            <div class="medium-6 columns end">
                                                <div id="image" style="display: block; border: 1px solid gray;" >
                                                    <img id="id-profileimage" name="profile" class="class-image" src=" @if($userInfo->profile_image){{asset('storage')  }}/{{ $userInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" style="width:400px; height:150px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom"> Background Image:</h6>
                                            <div class="medium-6 columns" style="float: left;">
                                                <input type="file" id="background_image" name="background_image" >
                                                <div class="error background_image "></div>
                                            </div>
                                           <div class="medium-6 columns end">
                                                <div id="background" style="display: block; border: 1px solid gray;" >
                                                    <img id="id-background" class="class-image" src=" @if($userInfo->profile_image){{asset('storage')  }}/{{ $userInfo->background_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" style="width:400px; height:150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-form-inner">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom"> Privacy:</h6>
                                        </div>
                                        <div class="medium-6 columns" style="float: left;">
                                            <label>Info Display:
                                                <select name="privacy">
                                                    <option  @if($userInfo->privacy == 'no')  selected="selected" @endif value="no">No</option>
                                                    <option @if($userInfo->privacy == 'yes')  selected="selected" @endif value="yes">Yes</option>
                                                </select>
                                                <div class="error privacy "></div>
                                            </label>
                                        </div>
                                        <div class="medium-6 columns" style="float: left;">
                                            <label>Enter Your Website:
                                               
                                                <input type="text" value="{{ $userInfo->website_url }}" name="website_url" placeholder="enter your website name..">
                                                  <div class="error website_url "></div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-form-inner">
                                    <button class="button expanded" onclick="submitProfileForm()" type="button">update now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End profile settings -->
</div><!-- end left side content area -->

@endsection

@section('script')

    <script type="text/javascript">
       
     /*image script url reader*/
        function readURL(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#id-profileimage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile_image").change(function () { 
        readURL(this);
    });
     /*image script url reader*/
        function readBackgroundURL(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#id-background').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#background_image").change(function () {
        readBackgroundURL(this);
    });


    /* Profile form submit */

    function submitProfileForm() {
            var url = "{{route('profile.update')}}";
            var formData = new FormData($('#profileSettingsForm')[0]);
            console.log(formData);
            $.ajax({
                type:'post',
                url: url,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (res) { 
                    if(res.status==false) {
                        $('.error').text("");
                        jQuery.each(res.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if (res.status==true) {
                        $('.error').text("");
                        swal({
                            title: "Done",
                            text: res.msg,
                            icon: "success",
                            button: "close",
                            timer: 10000,
                        });
                        window.location.href=window.location.href;
                    } 
                }
            });
         }
    </script>


@endsection
