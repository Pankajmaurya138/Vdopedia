@foreach($userInfo->getAllVideos as $video)
    <div class="profile-video showmore_content">
        <div class="media-object stack-for-small">
            <div class="media-object-section media-img-content">
                <div class="video-img">
                    <img src="{{asset('storage')}}\{{ $video->image_file }}" alt="{{$video->title}} video thumbnail">
                </div>
            </div>
            <div class="media-object-section media-video-content">
                <div class="video-content">
                    <h5><a href="{{ url('/video/watch/'.base64_encode($video->id)) }}">{{ $video->title }}</a></h5>
                    <p>{{ $video->description }}</p>
                </div>
                <div class="video-detail clearfix">
                    <div class="video-stats">
                        <span><i class="fa fa-check-square-o"></i>published</span>
                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($video->upload_date)->format('d-M-Y') }}</span>
                        <span><i class="fa fa-eye"></i> {{ custom_number_format($video->view) }}</span>
                    </div>
                    <div class="video-btns">
                        <a class="video-btn" data-toggle="tooltip" data-placement="bottom" title="edit the video" href="{{ url('upload/video/edit/'.base64_encode($video->id)) }}"><i class="fa fa-pencil-square-o"></i>edit</a>
                        <button ata-toggle="tooltip" data-placement="bottom" title="delete the video" type="submit" data-video_id="{{ $video->id }}" id="id-delete" name="delete"><i class="fa fa-trash"></i>delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <?php
        function custom_number_format($n,$precision = 1) {
       
            if ($n < 900) {
            // Default
             $n_format = number_format($n);
            } else if ($n < 10000) {
            // Thausand
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n < 100000) {
            // Million
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n < 1000000) {
            // Billion
            $n_format = number_format($n / 1000, $precision). 'K';
            } else if ($n >= 1000000) {
            // Trillion
            $n_format = number_format($n / 1000000, $precision). 'M';
        }
        return $n_format;
    }
 ?>