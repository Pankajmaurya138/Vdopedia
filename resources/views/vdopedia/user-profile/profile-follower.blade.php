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
                            <span class="show-for-sr">Current: </span> Follower
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
                <a   href="{{ url('profile/favorate/videos/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-heart"></i>Favorite Videos
                    <span class="float-right" id="fav_videos">{{ count($userInfo->getAllfavorateVideo) }}</span>
                </a>
            </li>
            <li class="clearfix">
                <a  class="active" href="{{ url('profile/follower/'.base64_encode(Auth::user()->id)) }}">
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
                <a href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
                    <i class="fa fa-gears"></i>Profile Settings
                </a>
            </li>
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

@endsection

@section('user-profile')
<!-- right side content area -->
    <div class="large-8 columns profile-inner">
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
                                        @endif" alt="followers ">
                                    </div>
                                    <span>{{ $subscriber->subscriberInfo->name }}</span>
                                    <div class="subscribe" id="add_subscribe{{$subscriber->subscriber_id}}">
                                        {{-- @if(isset($userInfo->getSubscriber) && (count($userInfo->getSubscriber))>0)  
                                            <button type="submit"
                                                @foreach($userInfo->getSubscriber as $user_subscription)
                                                    @if($user_subscription->subscriber_id == Auth::user()->id && $user_subscription->subscribe_status =='yes')
                                                        style="background: #e96969;" data-status="yes" @else data-status="no" @endif @endforeach data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow">
                                                    @foreach($userInfo->getSubscriber as $user_subscription )
                                                        @if($user_subscription->subscriber_id == Auth::user()->id && $user_subscription->subscribe_status =='yes')
                                                            SUBSCRIBED
                                                            @else SUBSCRIBE 
                                                        @endif 
                                                    @endforeach


                                            </button> --}}
                                            {{--  @elseif(count($userInfo->getSubscriber)<=0)  --}}
                                            @if(!empty($userInfo->getSubscriber) && (count($userInfo->getSubscriber))>0) 
                                                <button type="submit" 
                                                    @foreach($userInfo->getSubscriber as $user_subscription)

                                                        @if(($subscriber->subscriber_id == $user_subscription->user_id) && ($user_subscription->subscribe_status=='yes'))
                                                             data-status="yes" style="background: #e96969;"
                                                        @endif
                                                        @if(($subscriber->subscriber_id == $user_subscription->user_id) && ($user_subscription->subscribe_status=='no'))
                                                            data-status="no"
                                                        @endif
                                                        id="{{ $subscriber->subscriber_id  }}"

                                                    @endforeach
                                                    data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow" >
                                                    @foreach($userInfo->getSubscriber as $user_subscription)
                                                        @if(($subscriber->subscriber_id == $user_subscription->user_id))
                                                            @if($user_subscription->subscribe_status == 'yes')
                                                                SUBSCRIBED
                                                            @endif
                                                            @if($user_subscription->subscribe_status == 'no')
                                                                SUBSCRIBE
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </button>
                                            @endif
                                            @if(empty($userInfo->getSubscriber) && (count($userInfo->getSubscriber))<=0) 
                                                <button type="submit"  id="{{ $subscriber->subscriber_id  }}" data-status="no"  data-user_id="{{ $subscriber->subscriber_id }}" class="class-subscribe" name="follow" > SUBSCRIBE</button> 
                                            @endif  
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                  
                </div>
            </div>
            <div class="show-more-inner text-center">
                <a href="#" class="show-more-btn">show more</a>
            </div>
        </div>
    </section>
</div><!-- end left side content area -->

@endsection


@section('script')

    <script type="text/javascript">
        var obj = {
            Subscribe:function(data){
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        $('.class-subscribe').each(function(i, v) {
                            if(r.user_id == v.id) {
                                if((r.subscription_status == 'yes')) {
                                    $('#add_subscribe'+r.user_id).html('');
                                    $('#add_subscribe'+r.user_id).html('<button type="button" style="background-color:#e96969;"  id="'+r.user_id+'"  class="class-subscribe" data-status="yes" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBED </button>');
                                }
                                if(r.subscription_status=='no') {
                                    console.log('user_id='+r.user_id);
                                    console.log('id='+v.id);
                                    console.log(r.subscription_status);
                                    $('#add_subscribe'+r.user_id).html('');
                                    $('#add_subscribe'+r.user_id).html('<button type="button"   id="'+r.user_id+'"  class="class-subscribe" data-status="no" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBE </button>');
                                }
                            }else if(r.message == 'Unauthenticated') {
                                route = "{{route('login')}}";
                                window.location.href = route;
                            }
                        });
                    }
                });
            },
        }

        $(document).ready(function() {
            $(document).on('click','.class-subscribe',function() {
                var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
                if(checkUserLogin == '') {
                    route = "{{route('login')}}";
                    window.location.href = route;
                }
                var user_id = $(this).data('user_id');
                var status = $(this).data('status');
                var action = '{{ route('subscribed') }}';
                var _token = "{{ csrf_token() }}";
                var data = {user_id:user_id,status:status,_token:_token,target:'#',action:action};
                obj.Subscribe(data);
            });
        });
    </script>
@endsection
