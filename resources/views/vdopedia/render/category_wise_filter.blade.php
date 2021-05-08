    <div id="class_remove_of_trending" class="large-8 columns">
        <!--single inner video-->
        <section class="inner-video">
            <div class="row secBg">
                <div class="large-12 columns inner-flex-video">
                    <div class="flex-video widescreen">
                        <video id="id_video"  width="770px" height="480px" alt="{{ $getVideoInfo->title }}" title="{{ $getVideoInfo->title }}"  class="video-js vjs-default-skin category_wise_filter" controls>
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
                                    <a href="{{ url('/profile/'.base64_encode($getVideoInfo->getUserInfo->id)) }}" title="author profile link">
                                        <img src= "@if($getVideoInfo->getUserInfo->profile_image){{asset('storage')  }}/{{ $getVideoInfo->getUserInfo->profile_image  }}@else {{asset('storage')  }}/{{ 'images/user.png'  }} @endif" alt="author profile image"></a>
                                </div>
                                <p class="text-center"><a href="{{ url('/profile/'.base64_encode($getVideoInfo->getUserInfo->id)) }}" itle="author profile name">{{ ucfirst($getVideoInfo->getUserInfo->name) }} </a></p>
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
                                    <button type="button" id="id-subscribe"
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
                                    <a class="secondary-button class-like" data-thumb="likes" title="video like link" data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> 
                                    <a  class="secondary-button class-like" data-thumb="dislikes" title="video dislikes link"  data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a>
                                    @if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4)
                                            <a class="secondary-button" id="overlayButton" >Lyrics</a> 
                                            <a href="@if(isset($file_name)){{ asset('download'.'/'.$getVideoInfo->getCategoryName->name.'/'.$file_name) }} @endif
                                        " class="secondary-button" download="{{ isset($file_name) ? $file_name :'' }}" target="_blank" data-vid="{{ $getVideoInfo->id }}" id="download_lyrics"><i class="fa fa-download"></i></a>
                                        @else
                                       <a class="secondary-button" id="pdf" title="video pdf file download" >pdf</a> 
                                        <a href="@if(isset($file_name)){{ asset('download'.'/'.$getVideoInfo->getCategoryName->name.'/'.$file_name) }} @endif
                                        " class="secondary-button" download="{{ isset($file_name) ? $file_name :'' }}" target="_blank" data-vid="{{ $getVideoInfo->id }}" id="download_lyrics"><i class="fa fa-download"></i></a>
                                        @endif
                                        <a href=" {{ asset('storage') }}/{{ 'mp3/'.$getVideoInfo->mp3_file }}" class="secondary-button" download="{{ $getVideoInfo->mp3_file  }}" data-toggle="tooltip" data-placement="top" title="download mp3"  target="_blank" title="video mp3 file download"  ><i class="fa fa-music"></i></a>
                                    
                                        <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://vdopedia.com">
                                            <button data-easyshare-button="facebook" style="padding-right: 10px;">
                                                <i style="color: blue;" class="fa fa-facebook"></i>
                                            </button>
                                            <button data-easyshare-button="twitter" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                                <i  style="color:#00acee" class="fa fa-twitter"></i>
                                            </button>
                                            <button data-easyshare-button="google" >
                                                <i style="color:#db4a39"  class="fa fa-google-plus"></i>
                                            </button>                          
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
                            <a href="javascript::void(0);" class="inner-btn"> 
                                {{ ucfirst($category->getCategory->name) }}
                            @endforeach</a>
                        </div>
                        @if(!empty(Auth::user()->id))
                            <div class="tags">
                                <button><i class="fa fa-tags"></i>Tags</button>
                                @foreach($getVideoInfo->getTags as $tag)
                                     <a href="javascript::void(0);" class="inner-btn">{{ ucfirst($tag->name) }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
         <!-- Comments -->
        <section class="content comments">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-12 small-12 columns">
                                <div class="head-title">
                                    <i class="fa fa-comments"></i>
                                    <h4>Comments <span id="comment_count_id"></span></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comment-box thumb-border">
                        <div class="media-object stack-for-small">
                            <div class="media-object-section comment-img text-center">
                                <div class="comment-box-img">
                                    <img src= "{{ isset(Auth::user()->id) ? asset('storage/').'/'.Auth::user()->profile_image: asset('storage'.'/images/user.png')}}" alt="profile image">
                                </div>
                                <h6><a href="{{ isset(Auth::user()->id) ? url('/profile/'.base64_encode(Auth::user()->id)):'' }}" title="author name"> {{isset(Auth::user()->id)?ucfirst(Auth::user()->name ):''}}</a></h6>
                            </div>
                            <div class="media-object-section comment-textarea">
                                    <textarea name="commentText" id="comment_body" class="class_commentText" placeholder="Add a comment here.."></textarea>
                                    <input type="submit" data-video_id="{{ $getVideoInfo->id }}" data-user_id="{{ isset(Auth::user()->id)? Auth::user()->id:''}}" id="commentStore"  name="submit" value="send">                            
                            </div>
                        </div>
                    </div>

                    <div class="comment-sort text-right">
                        <span>Sort By : <a href="javascript::void(0);">newest</a> | <a href="javascript::void(0);">oldest</a></span>
                    </div>
                    <div id="comment_section_addition"></div> 
                </div>
            </div>
        </section>
    </div>
    <div class="large-4 columns">
        <aside class="secBg sidebar">
            <div class="row">
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


