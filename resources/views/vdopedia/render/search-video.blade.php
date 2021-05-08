<section  class="content content-with-sidebar">
    <div class="row" id="">
        <div class="large-12 columns">
            <div class="tabs-content" data-tabs-content="popularVideos">
                <div class="tabs-panel is-active" id="popular-all">
                    <div class="row list-group" id="trending_add">
                        @if(isset($getSearchData))
                            @foreach($getSearchData as $value)
                                @if(empty($value->deleted_at))
                           {{-- @if($getVideoInfo->id != $treanding->id) --}}
                            <div class="item large-4 medium-6 columns list" style="float:left;">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="{{ asset('storage') }}/{{ $value->image_file }}" alt="{{ $value->title }} landing">
                                        <a href="{{ url('video/watch/'.base64_encode( $value->id)) }}" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                        <div class="video-stats clearfix">
                                            <div class="thumb-stats pull-left">
                                                <h1>HD</h1>
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
                                                <span><a href="{{ url('/profile/'.base64_encode($value->user_id)) }}"></a></span>
                                            </p>
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
                           @endif
                        @endforeach
                    @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    /*video search load more data*/
    function loadMoreVideos() {
        var query =  $('.typeahead').val();
        if(query != '') { 
           var p = 1;
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    p++;
                    loadMoreSearchData(p);
                }
            });
            function loadMoreSearchData(p){
                var query =  $('.typeahead').val();
                $.ajax({
                    url: '{{ url('/video/search?p=') }}' + p,
                    type: "get",
                    data:{query:query,page:p},
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                }).done(function(data) {
                    if(data.html == ''){
                        $('.ajax-load').html("No more records found");
                    }
                    $('.ajax-load').hide();
                    $("#add_render_html").append(data.html);
                }); 
            }
        }
    }
    
</script>