<section  class="content content-with-sidebar">
    <div class="main-heading borderBottom">
        <div class="row padding-14">
            <div class="medium-8 small-8 columns">
                <div class="head-title">
                    <i class="fa fa-star"></i>
                    <h4>{{ ucfirst($checkCategoryExist->name) }}</h4>
                </div>
            </div>
            <div class="medium-4 small-4 columns">
                <ul class="tabs text-right pull-right" data-tabs id="popularVideos">
                    <li class="tabs-title is-active " ><a style="width:60px ;color: #ffffff !important;background: #e96969 !important; " class="class_category" onclick="increase()" data-category_id="{{ $checkCategoryExist->id }}">More >></a></li>
                </ul>
            </div>                            
        </div>
    </div>
    <div class="row" id="">
        <div class="large-12 columns">
            {{-- <div class="row column head-text clearfix">
                <p class="pull-left">All Videos : <span> posted</span></p>
                <div class="grid-system pull-right show-for-large">
                    <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                    <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                    <a class="secondary-button  list" href="#"><i class="fa fa-th-list"></i></a>
                </div>
            </div> --}}
            <div class="tabs-content" data-tabs-content="popularVideos">
                <div class="tabs-panel is-active" id="popular-all">
                    <div class="row list-group" id="trending_add">
                        @if(!empty($getSearchData ))
                        @foreach($getSearchData as $value)
                           {{-- @if($getVideoInfo->id != $value->id) --}}
                            <div class="item large-3 medium-6 columns grid-default" style="float:left;">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="{{ asset('storage') }}/{{ $value->image_file }}" alt="landing">
                                        <a href="{{ url('video/watch/'.base64_encode( $value->id)) }}" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                        <div class="video-stats clearfix">
                                            <div class="thumb-stats pull-left">
                                                <h6>HD</h6>
                                            </div>
                                            <div class="thumb-stats pull-left">
                                                <i class="fa fa-heart"></i>
                                                <span>{{ isset($value->getFavorateVideo)?count($value->getFavorateVideo):'' }}</span>
                                            </div>
                                            <div class="thumb-stats pull-right">
                                                <span>{{ isset($value->video_length) ? $value->video_length:'' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-des">
                                        <h6><a href="{{ url('video/watch/'.base64_encode( $value->id)) }}">{{ ucfirst($value->title )}}</a></h6>
                                        <div class="post-stats clearfix">
                                            <p class="pull-left">
                                                <i class="fa fa-user"></i>
                                                <span><a href="{{ url('/profile/'.base64_encode($value->user_id)) }}">{{ ucfirst($value->getUserInfo->name) }}</a></span>
                                            </p><br>
                                            <p class="pull-left">
                                                <i class="fa fa-clock-o"></i>
                                                <span>{{ \Carbon\Carbon::parse($value->created_at)->format('d-M-Y') }}</span>
                                            </p>
                                            <p class="pull-left">
                                                <i class="fa fa-eye"></i>
                                                <span>{{ $value->view }}</span>
                                            </p>
                                        </div>
                                        <div class="post-summary">
                                            <p>{{ $value->description }}</p>
                                        </div>
                                        <div class="post-button">
                                            <a href="{{ url('video/watch/'.base64_encode( $value->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           {{-- @endif --}}
                        @endforeach
                    @endif                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End main content -->


