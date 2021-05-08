<div id="class_remove_of_trending"  class="large-8 columns">
    <!--single inner video-->
    <section class="inner-video">
        <div class="row secBg">
            <div class="large-12 columns inner-flex-video">
                <div class="flex-video widescreen">
                    {{-- <iframe id="id-iframe" width="560" height="315" src="{{asset('storage')}}/{{ $getVideoInfo->video_file }}" allowfullscreen></iframe> --}}
                    <video id="id-iframe"  width="770px" height="480px"   controls   class="video-js vjs-default-skin class_change_id">
                    <source src="{{asset('storage')}}/{{ $getVideoInfo->video_file }}" type="video/mp4"> 
                  </video>
                </div>
                
            </div>
        </div>
    </section>
    <!-- single post stats -->
    <section class="SinglePostStats">
        <!-- newest video -->
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="media-object stack-for-small">
                    <div class="media-object-section">
                        <div class="author-img-sec">
                            <div class="thumbnail author-single-post">
                                <a href="{{ url('/profile/'.base64_encode($getVideoInfo->getUserInfo->id)) }}">
                                    
                                    <img src= "@if($getVideoInfo->getUserInfo->profile_image){{asset('storage')  }}/{{ $getVideoInfo->getUserInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="author image"></a>
                            </div>
                            <p class="text-center"><a href="{{ url('/profile/'.base64_encode($getVideoInfo->getUserInfo->id)) }}">{{ ucfirst($getVideoInfo->getUserInfo->name) }} </a></p>
                        </div>
                    </div>
                    <div class="media-object-section object-second">
                        <div class="author-des clearfix">
                            <div class="post-title">
                                <h4>{{ ucfirst($getVideoInfo->title) }}</h4>
                                <p>
                                    <span><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($getVideoInfo->upload_date)->format('d-M-Y') }}</span>
                                    <span><i class="fa fa-eye"></i>{{ custom_number_format($getVideoInfo->view) }}</span>

                                    <span><i class="fa fa-thumbs-o-up" id="id-likes">
                                     @foreach($getCount as $key => $value)
                                            {{$value->likes  }}
                                    @endforeach</i> </span>
                                    <span><i class="fa fa-thumbs-o-down" id="id-dislike">@foreach($getCount as $key => $value)
                                            {{$value->dislikes  }}
                                    @endforeach</i> </span>
                                    <span><i class="fa fa-commenting" id="id-comments"> 9</i> </span>
                                </p>
                            </div>
                            <div class="subscribe" id="subscribe_add">
                                <button type="button"id="id-subscribe"
                                 <?php
                                
                                if(isset($getVideoInfo->getUserInfo->getAllSubscriber )) {
                                    foreach ($getVideoInfo->getUserInfo->getAllSubscriber as $key => $value) {

                                       if(!empty(Auth::user()->id)) {
                                             if(($value->subscriber_id == Auth::user()->id) && $value->subscribe_status =='yes' ) {
                                       
                                ?>
                                   style="background: #e96969;" data-status="yes" <?php }  }}}   ?>data-status="no"  class="class-subscribe" data-user_id="{{$getVideoInfo->user_id }}" name="subscribe"> 
                                @if(!empty(Auth::user()->id))
                                    @if(!empty($getVideoInfo->getUserInfo->getAllSubscriber ))
                                        @foreach ($getVideoInfo->getUserInfo->getAllSubscriber as $key => $value) 

                                                @if($value->subscriber_id == Auth::user()->id )
                                                    @if($value->subscribe_status =='yes')
                                                    SUBSCRIBED
                                                   @endif
                                                     @if($value->subscribe_status =='no') 
                                                        SUBSCRIBE
                                                     @endif
                                                @endif
                                         @endforeach
                                     @endif
                                @endif
                                    @if(empty(Auth::user()->id))         
                                        SUBSCRIBE
                                    @endif
                                   </button>
                            </div>
                        </div>
                        <div class="social-share">
                            <div class="post-like-btn clearfix">
                                <form method="post">                                       
                                    <div id="fav_add">
                                        <button type="button" id="id-fav"
                                    <?php 
                                        if(isset($getVideoInfo->getFavorateVideo )) {
                                            foreach ($getVideoInfo->getFavorateVideo as $key => $value) {

                                               if(!empty(Auth::user()->id)) {
                                                     if($value->favorate_id == Auth::user()->id ) {
                                               
                                    ?>
                                     style="background: #e96969;" data-status="yes" <?php }  }} } ?>
                                     data-vid="{{ $getVideoInfo->id }}" data-status="no" data-user_id="{{ $getVideoInfo->user_id  }}"><i class="fa fa-heart"></i>Add to</button>
                                    </div>
                                </form>
                                <a class="secondary-button class-like" data-thumb="likes" data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> 
                                <a  class="secondary-button class-like" data-thumb="dislikes"  data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a>
                               
                                 @if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4)
                                        <a class="secondary-button" id="overlayButton" >Lyrics</a> 
                                        <a href="@if(!empty($file_name)){{ asset('download/lyrics_file') }}/{{ $file_name }}@endif
                                    " class="secondary-button" download="{{ isset($file_name)?$file_name:'' }}" target="_blank" data-vid="{{ $getVideoInfo->id }}" id="download_lyrics"><i class="fa fa-download"></i></a>
                                    @else
                                   <a class="secondary-button" id="pdf" >pdf</a> 
                                    <a href="@if(!empty($file_name)){{ asset('download'.'/'.$getVideoInfo->getCategoryName->name.'/'.$file_name) }} @endif
                                    " class="secondary-button" download="{{ isset($file_name)?$file_name:'' }}" target="_blank" data-vid="{{ $getVideoInfo->id }}" id="download_lyrics"><i class="fa fa-download"></i></a>
                                    @endif
                                <a href=" {{ asset('storage') }}/{{ 'mp3/'.$getVideoInfo->mp3_file }}" class="secondary-button" download="{{ $getVideoInfo->mp3_file  }}" data-toggle="tooltip" data-placement="top" title="download mp3"  target="_blank"  ><i class="fa fa-music"></i></a>
                                 <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://vdopedia.com">
                                        <!-- Total -->
                                        

                                        <!-- Facebook -->
                                        <button data-easyshare-button="facebook" style="padding-right: 10px;">
                                            <i style="color: blue;" class="fa fa-facebook"></i>
                                        </button>
                                        {{-- <span data-easyshare-button-count="facebook"></span> --}}

                                        <!-- Twitter -->
                                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                            <i  style="color:#00acee" class="fa fa-twitter"></i>
                                           
                                        </button>
                                        {{-- <span data-easyshare-button-count="twitter"></span> --}}

                                        <!-- Google+ -->
                                        <button data-easyshare-button="google" >
                                            <i style="color:#db4a39"  class="fa fa-google-plus"></i>
                                            
                                        </button>
                                        
 
                                        
                                        {{-- <span data-easyshare-button-count="google"></span> --}}

                                        {{-- <div data-easyshare-loader>Loading...</div> --}}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End single post stats -->

    <!-- single post description -->
    <section class="singlePostDescription">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="heading">
                    <h5>Description</h5>
                </div>
                <div class="description showmore_one">
                    <p>{{ $getVideoInfo->description }}</p>
                    <div class="categories">
                        <button><i class="fa fa-folder"></i>Categories</button>
                       @foreach($getVideoInfo->getCategoryName1 as $category) 
                            <a href="#" class="inner-btn"> 
                                {{ ucfirst($category->getCategory->name) }}
                            @endforeach</a>
                        {{-- <a href="#" class="inner-btn">comedy</a> --}}
                    </div>
                    @if(!empty(Auth::user()->id))
                        <div class="tags">
                            <button><i class="fa fa-tags"></i>Tags</button>
                            @foreach($getVideoInfo->getTags as $tag)
                                 <a href="#" class="inner-btn">{{ ucfirst($tag->name) }}</a>
                            @endforeach
                        </div>
                     @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End single post description -->
    <section class="content comments">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-12 small-12 columns">
                                <div class="head-title">
                                    <i class="fa fa-comments"></i>
                                    <h4>Comments <span id="comment_count_id">(4)</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-box thumb-border">
                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                    <img src= "{{ isset(Auth::user()->id) ? asset('storage/').'/'.Auth::user()->profile_image: asset('storage'.'/images/user.png')}}" alt="comment">
                                </div>
                                <h6><a href="{{ isset(Auth::user()->id) ? url('/profile/'.base64_encode(Auth::user()->id)):'' }}"> {{isset(Auth::user()->id)?ucfirst(Auth::user()->name ):''}}</a></h6>
                            </div>
                            <div class="media-object-section comment-textarea">
                                {{-- <form method="post"> --}}
                                    <textarea name="commentText" id="comment_body" class="class_commentText" placeholder="Add a comment here.."></textarea>
                                    <input type="submit" data-video_id="{{ $getVideoInfo->id }}" data-user_id="{{ isset(Auth::user()->id)? Auth::user()->id:''}}" id="commentStore"  name="submit" value="send">
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class="comment-sort text-right">
                        <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                    </div>

                    <!-- main comment -->
                    <div id="comment_section_addition"></div>
                   
                    <!-- End main comment -->

                </div>
            </div>
        </section>
        <!-- related Posts -->
   {{--  <section class="content content-with-sidebar related">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="main-heading borderBottom">
                    <div class="row padding-14">
                        <div class="medium-12 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>Related Videos</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row list-group" style="overflow-y: scroll; max-height:1200px;">
                    @if(isset($getRelatedVideos))
                        @foreach($getRelatedVideos as $relVideo)
                           @if($getVideoInfo->id != $relVideo->id)
                            <div class="item large-4 columns" style="float: left;">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="{{ asset('storage') }}/{{ $relVideo->image_file }}" alt="landing">
                                        <a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}" class="hover-posts">
                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                        </a>
                                        <div class="video-stats clearfix">
                                            <div class="thumb-stats pull-left">
                                                <h6>HD</h6>
                                            </div>
                                            <div class="thumb-stats pull-left">
                                                <i class="fa fa-heart"></i>
                                                <span>{{ custom_number_format($relVideo->view) }}</span>
                                            </div>
                                            <div class="thumb-stats pull-right">
                                                <span>05:56</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-des">
                                        <h6><a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}">{{ ucfirst($relVideo->title )}}</a></h6>
                                        <div class="post-stats clearfix">
                                            <p class="pull-left">
                                                <i class="fa fa-user"></i>
                                                <span><a href="{{ url('/profile/'.base64_encode($relVideo->user_id)) }}">{{ ucfirst($relVideo->getUserInfo->name) }}</a></span>
                                            </p>
                                            <p class="pull-left">
                                                <i class="fa fa-clock-o"></i>
                                                <span>{{ \Carbon\Carbon::parse($relVideo->created_at)->format('d-M-Y') }}</span>
                                            </p>
                                            <p class="pull-left">
                                                <i class="fa fa-eye"></i>
                                                <span>{{ custom_number_format($relVideo->view) }}</span>
                                            </p>
                                        </div>
                                        <div class="post-summary">
                                            <p>{{ $relVideo->description }}</p>
                                        </div>
                                        <div class="post-button">
                                            <a href="{{ url('video/watch/'.base64_encode( $relVideo->id)) }}" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section> --}}
    <!--end related posts-->
      
    </div>
    <!-- end left side content area -->
    <!-- sidebar -->
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
    <!-- end sidebar -->

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


