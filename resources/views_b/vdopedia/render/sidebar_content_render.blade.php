<div class="large-4 columns">
        <aside class="secBg sidebar">
            <div class="row">
                <!-- most view Widget -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Related Videos</h5>
                        </div>
                        <div class="widgetContent sidebarSearchClass">
                            @if(isset($getRelatedVideos))
                                @foreach($getRelatedVideos as $rVideo)
                                    {{-- @if($getVideoInfo->id != $rVideo->id ) --}}
                                        <div class="video-box thumb-border">
                                            <div class="video-img-thumb">
                                                <img src="{{ asset('storage') }}/{{ $rVideo->image_file }}" alt="most viewed videos">
                                                <a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>Watch Video</span>
                                                </a>
                                            </div>
                                            <div class="video-box-content">
                                                <h6><a href="{{ url('/video/watch/'.base64_encode($rVideo->id)) }}">{{ ucfirst($rVideo->title) }}</a></h6>
                                                <p>
                                                    <span><i class="fa fa-user"></i><a href="{{ url('/profile/'.base64_encode($rVideo->user_id)) }}">{{ ucfirst($rVideo->getUserInfo->name) }}</a></span>
                                                    <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($rVideo->created_at)->format('d-M-Y') }}</span>
                                                    <span><i class="fa fa-eye"></i>{{ custom_number_format($rVideo->view) }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    {{-- @endif --}}
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end most view Widget -->
            </div>
        </aside>
    </div>
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