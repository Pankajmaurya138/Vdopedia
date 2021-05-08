@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
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
                            <form method="post" data-abide novalidate action="{{ route('register') }}">
                            	@csrf
                                {{-- <div data-abide-error class="alert callout" style="display: none;">
                                    <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                </div> --}}
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input class="input-group-field  @error('name') is-invalid @enderror" name="name" type="text" placeholder="Enter your username" required value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                        			<span class="help-block">
                          		   		{{ $errors->first('name') }}
                        			</span>
                    			@endif
                    			<div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-info"></i></span>
                                    <input class="input-group-field  @error('age') is-invalid @enderror" name="age" type="text" placeholder="Enter your Age" required value="{{ old('age') }}">
                                </div>
                                @if ($errors->has('age'))
                        			<span class="help-block">
                          		   		{{ $errors->first('age') }}
                        			</span>
                    			@endif
                    			<div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-user"></i></span>
                                    <input class="input-group-field  @error('sex') is-invalid @enderror" name="sex" type="text" placeholder="Enter your sex" required value="{{ old('sex') }}">
                                </div>
                                @if ($errors->has('sex'))
                        			<span class="help-block">
                          		   		{{ $errors->first('sex') }}
                        			</span>
                    			@endif

                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                    <input class="input-group-field" name="email" type="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                                </div>
                                @if ($errors->has('email'))
                        			<span class="help-block error">
                          		   		{{ $errors->first('email') }}
                        			</span>
                    			@endif
                    			<div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Enter your mobile number" required>
                                </div>
                                @if ($errors->has('mobile'))
                        			<span class=" error">
                          		   		{{ $errors->first('mobile') }}
                        			</span>
                    			@endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Enter your password" required>
                                </div>
                                @if ($errors->has('password'))
                        			<span class="help-block error">{{ $errors->first('password') }}</span>
                    			@endif
                                <div class="input-group">
                                    <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Re-type your password" required pattern="alpha_numeric" data-equalto="password">
                                </div>
                                @if ($errors->has('password_confirmation'))
                        			<span class="help-block">
                          		   		{{ $errors->first('password_confirmation') }}
                        			</span>
                    			@endif
                                <span class="form-error">your email is invalid</span>
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

@push('extra-script')


@endpush