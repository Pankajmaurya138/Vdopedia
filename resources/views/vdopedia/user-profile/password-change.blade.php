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
                            <span class="show-for-sr">Current: </span> Password Change
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
                <a  class="active" href="{{ url('profile/password/change/'.base64_encode(Auth::user()->id)) }}">
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
            </li>                            </ul>
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
                    <i class="fa fa-key"></i>
                    <h4>Password Change</h4>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="setting-form">
                            <form  id="profilePasswordChangeForm" enctype="multipart/form-data">
                                @csrf
                                <div class="setting-form-inner">
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <h6 class="borderBottom">Password change:</h6>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="old_password" id="old_password" value="{{ old('old_password') }}" placeholder="Enter your old password" >
                                        </div>
                                          <div class="help-block old_password_error old_password error" style="color: red;"></div>
                                         @if ($errors->has('old_password'))
                                            <div class="help-block error" style="color: red;">{{ $errors->first('old_password') }}</div>
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password" >
                                        </div>
                                     <div class="help-block password_error password error" style="color: red;"></div>
                                         @if ($errors->has('password'))
                                            <div class="help-block error" style="color: red;">{{ $errors->first('password') }}</div>
                                        @endif
                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password_confirmation" id="" value="{{ old('password_confirmation') }}" placeholder="Re-type your password">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block error" style="color: red;">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                    <div class="help-block password_confirmation_error password_confirmation error" style="color: red;"></div>
                                            <input type="hidden" name="user_id" value="{{ $userInfo->id }}">
                                        </div>
                                    </div>
                                <div class="setting-form-inner">
                                    <button class="button expanded" onclick="profilePasswordChangeForm()" type="button">update Password</button>
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
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/additional-methods.min.js')}}"></script>
<script src="{{asset('js//jquery.validate.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
 
        $('#profilePasswordChangeForm').validate({ 
            rules: {
                
                old_password:{
                    required:true,
                    pwcheck:true,
                    minlength:8,
                },
                password:{
                    required:true,
                    pwcheck:true,
                    minlength:8,
                },

                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                
            },
            messages: {
               
                old_password: {
                    required: "Password filed required.",
                    pwcheck: "Password must be cobination of one digit,lower case ,one special chars and one uppercase allowed.",
                    minlength: "Password minminum 8 chars allowed."
                },
                password: {
                    required: "Password filed required.",
                    pwcheck: "Password must be cobination of one digit,lower case ,one special chars and one uppercase allowed.",
                    minlength: "Password minminum 8 chars allowed."
                },
                password2: {
                    required: "Password confirmation field required.",
                    equalTo: "Pasword did not match."
                },
            },
             errorPlacement: function (error, element) {
            if (element.attr("name") == element.attr("name"))
                $("."+element.attr("name")+"_error").html(error);
            }, 
        });
       $.validator.addMethod("pwcheck", function(value) {
        return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
    });

});
    
/* Profile form submit */
    function profilePasswordChangeForm() {
            var url = "{{route('password.update')}}";
            var formData = new FormData($('#profilePasswordChangeForm')[0]);
            console.log(formData);
            $.ajax({
                type:'post',
                url: url,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (res) { 
                    $('.error').text("");
                    if(res.status==false) {
                        
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
                    }else if(res.status == 'old_password'){
                       $('.old_password').text(res.msg);
                    }
                }
            });
         }
    </script>


@endsection
