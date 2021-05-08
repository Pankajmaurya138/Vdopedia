 @if(isset($userInfo->getAllVideos))
@foreach($userInfo->getAllVideos as $video)
<div class="item large-4 medium-6 columns" style="float: left;">
    <div class="post thumb-border">
        <div class="post-thumb">
            <img src="{{asset('storage')}}/{{ $video->image_file }}" alt="new video">
            <a href="{{ url('/video/watch/'.base64_encode($video->id)) }}" class="hover-posts">
                <span><i class="fa fa-play"></i>Watch Video</span>
            </a>
            <div class="video-stats clearfix">
                <div class="thumb-stats pull-left">
                    <h6>HD</h6>
                </div>
                <div class="thumb-stats pull-left">
                    <i class="fa fa-heart"></i>
                    <span>@if(isset($video->getFavorateVideo)){{ count($video->getFavorateVideo) }} @endif</span>
                </div>
                <div class="thumb-stats pull-right">
                    <span>{{ isset($video->video_length)?$video->video_length:'' }}</span>
                </div>
            </div>
        </div>
        <div class="post-des">
            <h6><a href="{{ url('/video/watch/'.base64_encode($video->id)) }}">{{ ucfirst($video->title) }}</a></h6>
            <div class="post-stats clearfix">
                <p class="pull-left">
                    <i class="fa fa-user"></i>
                    <span><a href="javascript::void(0);">{{ ucfirst($video->getUserInfo->name) }}</a></span>
                </p>
                <p class="pull-left">
                    <i class="fa fa-clock-o"></i>
                    <span>{{  \Carbon\Carbon::parse($video->upload_date)->format('d-M-Y') }}</span>
                </p>
                <p class="pull-left">
                    <i class="fa fa-eye"></i>
                    <span>{{ $video->view }}</span>
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
@endif