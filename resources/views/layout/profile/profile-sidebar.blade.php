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
                <a  href="{{ url('profile/setting/'.base64_encode(Auth::user()->id)) }}">
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



