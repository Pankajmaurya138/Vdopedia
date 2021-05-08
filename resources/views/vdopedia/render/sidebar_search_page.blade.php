@if(isset($getSearchResults))
    @foreach($getSearchResults as $searchVideos)
        {{-- @if($getVideoInfo->id != $searchVideos->id ) --}}
            <div class="video-box thumb-border">
                <div class="video-img-thumb">
                    <img src="{{ asset('storage') }}/{{ $searchVideos->image_file }}" alt="{{ $searchVideos->title }} most viewed videos">
                    <a href="{{ url('/video/watch/'.base64_encode($searchVideos->id)) }}" class="hover-posts">
                        <span><i class="fa fa-play"></i>Watch Video</span>
                    </a>
                </div>
                <div class="video-box-content">
                    <h6><a href="{{ url('/video/watch/'.base64_encode($searchVideos->id)) }}">{{ ucfirst($searchVideos->title) }}</a></h6>
                    <p>
                        <span><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($searchVideos->user_id)) }}">{{ ucfirst($searchVideos->name) }}</a></span>
                        <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($searchVideos->created_at)->format('d-M-Y') }}</span>
                        <span><i class="fa fa-eye"></i>{{ custom_number_format($searchVideos->view) }}</span>
                    </p>
                </div>
            </div>
        {{-- @endif --}}
    @endforeach
@endif

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