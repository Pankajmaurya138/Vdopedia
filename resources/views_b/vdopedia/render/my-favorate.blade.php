@foreach($userInfo->getAllfavorateVideo as $video)
    <div class="profile-video">
        <div class="media-object stack-for-small">
            <div class="media-object-section media-img-content">
                <div class="video-img">
                    <img src="{{asset('storage')}}/{{ $video->getVideoInfo->image_file }}" alt="video thumbnail">
                </div>
            </div>
            <div class="media-object-section media-video-content">
                <div class="video-content">
                    <h5><a href="{{ url('/video/watch/'.base64_encode($video->getVideoInfo->id)) }}">{{  $video->getVideoInfo->title }}</a></h5>
                    <p>{{  $video->getVideoInfo->description }}</p>
                </div>
                <div class="video-detail clearfix">
                    <div class="video-stats">
                        <span><i class="fa fa-check-square-o"></i>published</span>
                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse( $video->getVideoInfo->upload_date)->format('d-M-Y') }}</span>
                        <span><i class="fa fa-eye"></i> {{  $video->getVideoInfo->view }}</span>
                    </div>
                    <div class="video-btns">
                        <button type="submit" data-unfavorate_id="{{ $video->id }}" id="unfavorate" name="unfav"><i class="fa fa-heart-o"></i>Unfavorite</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach