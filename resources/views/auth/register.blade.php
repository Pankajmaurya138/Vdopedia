@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Login/Register
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
@section('body-content')

<section class="registration">
    <div class="row secBg">
        <div class="large-12 columns">
            <div class="login-register-content">
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Header_Ad -->
            <ins class="adsbygoogle"
                 style="display:block;height: 100px !important;"data-ad-client="ca-pub-6588458573329944"data-ad-slot="2349247468"
                 data-full-width-responsive="true"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
                <div class="row collapse borderBottom">
                    <div class="medium-6 large-centered medium-centered">
                        <div class="page-heading text-center">
                            <h3>User Registeration</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                        </div>
                    </div>
                </div>
                <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                    <div class="large-4 large-offset-1 medium-6 columns">
                        <div class="social-login" data-equalizer-watch>
                            <h5 class="text-center">Login via Social Profile</h5>
                            <div class="social-login-btn facebook">
                                <a href="{{ route('facebook') }}"><i class="fa fa-facebook"></i>login via facebook</a>
                            </div>
                            {{-- <div class="social-login-btn twitter">
                                <a href="#"><i class="fa fa-twitter"></i>login via twitter</a>
                            </div> --}}
                            <div class="social-login-btn g-plus">
                                <a href="{{ route('googleLogin') }}"><i class="fa fa-google"></i>login via google account</a>
                            </div>
                            {{-- <div class="social-login-btn linkedin">
                                <a href="#"><i class="fa fa-linkedin"></i>login via linkedin</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="large-2 medium-2 columns show-for-large">
                        <div class="middle-text text-center hide-for-small-only" data-equalizer-watch>
                            <p>
                                <i class="fa fa-arrow-left arrow-left"></i>
                                <span>OR</span>
                                <i class="fa fa-arrow-right arrow-right"></i>
                            </p>
                        </div>
                    </div>
                    <div class="large-4 medium-6 columns end">
                        <div class="register-form">
                            <h5 class="text-center">Create your Account</h5>
                            <form method="post" id="register" data-abide novalidate action="{{ route('register') }}">
                                @csrf
                                {{-- <div data-abide-error class="alert callout" style="display: none;">
                                    <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                </div> --}}
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input class="input-group-field  @error('name') is-invalid @enderror" name="name" type="text" id="name" placeholder="Enter your username"  value="{{ old('name') }}">
                                </div>
                                 <span class="help-block name_error error"></span>
                                 <span id="username_check"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block error">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-info"></i></span>
                                    <input class="input-group-field  @error('age') is-invalid @enderror" name="age" type="text" id="age" placeholder="Enter your Age"  value="{{ old('age') }}">
                                </div>
                                <span class="help-block age_error error"></span>
                                @if ($errors->has('age'))
                                    <span class="help-block error">
                                        {{ $errors->first('age') }}
                                    </span>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    {{-- <input class="input-group-field  @error('sex') is-invalid @enderror" name="sex" type="text" placeholder="Enter your sex"  value="{{ old('sex') }}"> --}}

                                    <select name="sex" id="sex" class="input-group-field form-control">
                                        <option class="input-group-field" value="male">Male</option>
                                        <option class="input-group-field" value="female">Female</option>
                                    </select>
                                </div>
                                <span class="help-block sex_error error"></span>
                                @if ($errors->has('sex'))
                                    <span class="help-block error">
                                        {{ $errors->first('sex') }}
                                    </span>
                                @endif

                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                    <input class="input-group-field" name="email" id="email" type="text" value="{{ old('email') }}" placeholder="Enter your email" >
                                </div>
                                <span class="help-block email_error error"></span>
                                <span id="email_check"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter your mobile number" >
                                </div>
                                <span class="help-block mobile_error error"></span>
                                @if ($errors->has('mobile'))
                                    <span class=" error">
                                        {{ $errors->first('mobile') }}
                                    </span>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password" >
                                </div>
                                 <span class="help-block password_error error"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block error">{{ $errors->first('password') }}</span>
                                @endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" id="" value="{{ old('password_confirmation') }}" placeholder="Re-type your password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block error">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                @endif
                                <span class="help-block password_confirmation_error error"></span>
                                <div class="input-group" style="display: inline-block;">
                                    <input id="term_condition" type="checkbox"  name="terms_condition" value="agree">
                                    <label for="remember">Please Click to Accept the Terms and Conditions.<br/> <a href="{{route('termsAndCondition')}}">click here</a></label>
                                </div>
                                 <span class="help-block terms_condition_error error"></span>
                                @if ($errors->has('terms_condition'))
                                        <span class="help-block  error">
                                            {{ $errors->first('terms_condition') }}
                                        </span>
                                    @endif
                                <button class="button expanded" type="submit">register Now</button>
                                <p class="loginclick"> <a href="{{ route('login') }}">Login here</a><a href="{{ route('login') }}">Already have acoount?</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/additional-methods.min.js')}}"></script>
<script src="{{asset('js//jquery.validate.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
 
        $('#register').validate({ 
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
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
                age: {
                    required: true,
                    digits: true,
                    range:[18,100],
                    min:3,
                },
                gender: {
                    required: true,
                },
                terms_condition: {
                    required: true,
                },
                mobile: {
                    required: true,
                    digits:true,
                    minlength: 10,
                    maxlength:10,
                }
            },
            messages: {
                name: {
                    required: "Username field required."
                },
                email: {
                    required: "Email field required"
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
                mobile: {
                    digits: "mobile must be digit only.",
                    minlength:"mobile must be 10 digits allowed.",
                    maxlength:"mobile must be 10 digits allowed.",
                   
                },
                age: {
                    digits: "Age field must be numeric.",
                    range: "Age range must be  between 18 to 100",
                   
                },
                terms_condition: {
                    required: 'please click to accept the Terms and Conditions.',
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

  

    var obj = {

        EmailRegisterCheck:function(data) {
            $.ajax({
                url: data.action,
                type: 'post',
                data: data,
            })
            .done(function(res) {
                 $('#email_check').text('');
                if(res.status == true) {
                    $('#email_check').text(res.msg);
                    $('#email_check').attr('style', 'color:green;');
                }else if(res.status == false) {
                    $('#email_check').text(res.msg);
                    $('#email_check').attr('style', 'color:red;');
                }
            });
        },
        usernameCheck:function(data) {
            $.ajax({
                url: data.action,
                type: 'post',
                data: data,
            })
            .done(function(res) {
                 $('#username_check').text('');
                if(res.status == true) {
                    $('#username_check').text(res.msg);
                    $('#username_check').attr('style', 'color:green;');
                }else if(res.status == false) {
                    $('#username_check').text(res.msg);
                    $('#username_check').attr('style', 'color:red;');
                }
            });
        },

    }

    /* check email exists or not*/
    $(document).on('keyup','#email',function() {

        var email = $('#email').val();
        var action = "{{ route('userEmailCheck') }}";
        var _token = "{{ csrf_token() }}";
        var data = {email:email,action:action,_token:_token};
        obj.EmailRegisterCheck(data);
       
    });

    /* check email exists or not*/
    $(document).on('keyup','#name',function() {
        var name = $('#name').val();
        var action = "{{ route('usernameCheck') }}";
        var _token = "{{ csrf_token() }}";
        var data = {name:name,action:action,_token:_token};
        obj.usernameCheck(data);       
    });

/*only numeric entry check*/

    $(document).on('keydown','#mobile,#age', function(evt) {
        var key = evt.charCode || evt.keyCode || 0;

        return (key == 8 ||key == 9 ||key == 46 ||key == 110 ||
                key == 190 ||(key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
    });

/*block specail chars in username*/

$(document).on('keypress','#name',function(event) { 
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);     
});

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}

</script>

@endsection