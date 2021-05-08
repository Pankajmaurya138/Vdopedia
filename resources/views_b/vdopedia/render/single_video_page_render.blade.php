<div id="trending">
@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span>watch
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
@section('body-content')
<style type="text/css">
#overlay {
  position: absolute; 
  top: 169px; 
  left:671px;
  color: #FFF; 
  text-align: center;
  font-size: 20px;
  background-color: rgba(221, 221, 221, 0.29);
  width: 300px;
  height: 300px;
  padding: 10px 0;
  z-index: 2147483647;
}

#id-iframe{
  z-index: 1;
}
 .hide-overlay .vjs-overlay {
        display: none;
    }
</style>
<div class="row" style="max-width: 100rem;">
    <div class="large-2 columns">
            <div class="light-off-menu" id="offCanvas" data-off-canvas style="overflow-y: scroll; height:450px;">
                <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
                    <li class="has-submenu">
                        <a href="@if(!empty(Auth::user()->id)){{ route('home')}} @else {{ url('/') }} @endif" data-toggle="tooltip" data-placement="bottom" title="Home" ><i class="fa fa-home"></i>Home</a>
                         <a data-toggle="tooltip" data-placement="bottom" title="trending videos"  data-video_status="trending" onclick="increase()" class="trending_videos"><i class="fa fa-fire"></i></i>Trending</a>
                         <input type="hidden" name="number" id="id_number" value="0" >
                        <a data-toggle="tooltip" data-placement="bottom" title="following category"><i class="fa fa-fire"></i></i>Following</a>
                    </li>
                    <hr class="hr-border">  
                    <li class="has-submenu" data-dropdown-menu="example1">
                        <a href="#"><i class="fa fa-th" data-toggle="tooltip" data-placement="bottom" title="category of videos"></i>category</a>
                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                             @if(isset($allCategory))
                                @foreach($allCategory as $category)
                                    <li class="cat-item">
                                        <a class="class_category" onclick="increase()" data-category_id="{{ $category->id }}" >{{ ucfirst($category->name) }}&nbsp; ({{count($category->getCategoryAllVideoCount) }})
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    {{-- <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li> --}}
                    <li>
                        <a href="javascript::void(0);" data-toggle="tooltip" data-placement="bottom" title="follow our blog"><i class="fa fa-edit"></i>blog</a>
                        <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                            <li><a href="javascript::void(0);"><i class="fa fa-edit"></i>blog single post</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript::void(0);"><i class="fa fa-magic"></i>features</a>
                        {{-- <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                            <li><a href="404.html"><i class="fa fa-magic"></i>404 Page</a></li>
                            <li><a href="archives.html"><i class="fa fa-magic"></i>Archives</a></li>
                            <li><a href="login.html"><i class="fa fa-magic"></i>login</a></li>
                            <li><a href="login-forgot-pass.html"><i class="fa fa-magic"></i>Forgot Password</a></li>
                            <li><a href="login-register.html"><i class="fa fa-magic"></i>Register</a></li>
                            <li>
                                <a href="#"><i class="fa fa-magic"></i>profile</a>
                                <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                    <li><a href="profile-page-v1.html"><i class="fa fa-magic"></i>profile v1</a></li>
                                    <li><a href="profile-page-v2.html"><i class="fa fa-magic"></i>profile v2</a></li>
                                    <li><a href="profile-about-me.html"><i class="fa fa-magic"></i>Profile About Me</a></li>
                                    <li><a href="profile-comments.html"><i class="fa fa-magic"></i>profile comments</a></li>
                                    <li><a href="profile-favorite.html"><i class="fa fa-magic"></i>profile favorites</a></li>
                                    <li><a href="profile-followers.html"><i class="fa fa-magic"></i>profile followers</a></li>
                                    <li><a href="profile-settings.html"><i class="fa fa-magic"></i>profile settings</a></li>
                                </ul>
                            </li>
                            <li><a href="profile-video.html"><i class="fa fa-magic"></i>Author Page</a></li>
                            <li><a href="search-results.html"><i class="fa fa-magic"></i>search results</a></li>
                            <li><a href="terms-condition.html"><i class="fa fa-magic"></i>Terms &amp; Condition</a></li>
                        </ul> --}}
                        <hr class="hr-border">  
                    </li>
                    <li><a href="javascript::void(0);"><i class="fa fa-comments"></i>Feedback </a></li>
                    <li><a href="javascript::void(0);"><i class="fa fa-envelope"></i>Help</a></li>
                </ul>
             </div>
        </div>
        <div id="categoryWiseFilter" class="content_reload">
            <div class="large-6 columns">
                <!--single inner video-->
                <section class="inner-video">
                    <div class="row secBg">
                        <div class="large-12 columns inner-flex-video">
                            <div class="flex-video widescreen">
                                {{-- <iframe id="id-iframe" width="560" height="315" src="{{asset('storage')}}/{{ $getVideoInfo->video_file }}" allowfullscreen></iframe> --}}
                                <video id="video_play_id{{ $getVideoInfo->id}}"  width="770px" height="480px"    class="video-js vjs-default-skin video_palyerclass" controls preload="auto" data-setup='{ "asdf": true }'>
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
                                        <span><i class="fa fa-thumbs-o-down" id="id-dislike" >
                                         @foreach($getCount as $key => $value)
                                                {{$value->dislikes  }}
                                        @endforeach</i> </span>
                                        <span><i class="fa fa-commenting" id="id-comments"> {{ count($getVideoInfo->getAllComment) }}</i> </span>
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

                                            @if(count($getVideoInfo->getUserInfo->getAllSubscriber)<=0)
                                                SUBSCRIBE
                                            @elseif(empty($checkuserSubscribeThisUserOrNot))
                                             SUBSCRIBE
                                            @endif
                                        @if(count($getVideoInfo->getUserInfo->getAllSubscriber ) > 0)
                                            @foreach ($getVideoInfo->getUserInfo->getAllSubscriber as $key => $value) 

                                                    @if($value->subscriber_id == Auth::user()->id )
                                                        @if($value->subscribe_status =='yes')
                                                        SUBSCRIBED
                                                       @endif
                                                         @if($value->subscribe_status =='no') 
                                                            SUBSCRIBE
                                                         @endif
                                                        @elseif($value->subscriber_id != Auth::user()->id)
                                                            @if(empty($value->subscribe_status))
                                                                SUBSCRIBE
                                                            @endif
                                                    @endif
                                             @endforeach
                                         @endif
                                         {{-- @if(empty($getVideoInfo->getUserInfo->getAllSubscriber)<=0)
                                          SUBSCRIBE
                                          
                                         @endif --}}
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
                                            <button type="button" id="id-fav" data-toggle="tooltip" data-placement="top" title="add to favorate" 
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
                                    <a class="secondary-button class-like" data-thumb="likes" id="setColorOfLike" data-toggle="tooltip" data-placement="top" title="likes the vidoes" 
                                     @foreach($getVideoInfo->likeAndDislike as $likes)
                                        @if(!empty(Auth::user()->id))
                                            @if((Auth::user()->id == $likes->user_id) && ($likes->likes ==1))
                                                style="background:#ec5840;" 
                                            @endif
                                        @endif
                                    @endforeach
                                     data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-up" id="ajaxlike"></i></a> 

                                    <a  class="secondary-button class-like" data-toggle="tooltip" data-placement="top" title="dislikes the vidoes"  data-thumb="dislikes" id="setColorOfDislike" 
                                    @foreach($getVideoInfo->likeAndDislike as $dislikes)
                                        @if(!empty(Auth::user()->id))
                                            @if((Auth::user()->id == $dislikes->user_id) && ($dislikes->dislikes ==1))
                                                style="background:#ec5840;" 
                                            @endif
                                        @endif
                                    @endforeach
                                     data-user_id="{{ $getVideoInfo->user_id  }}" data-vid="{{ $getVideoInfo->id }}"><i class="fa fa-thumbs-o-down" id="ajaxdislike"></i></a>

                                    @if($getVideoInfo->category_id == 2 || $getVideoInfo->category_id == 4)
                                        <a class="secondary-button" id="overlayButton" data-toggle="tooltip" data-placement="top" title="Lyrics on/off" >Lyrics</a> 
                                        <a href="{{ isset($file_name) ? asset('download/lyrics_file').'/'.$file_name : '' }}
                                    " class="secondary-button" data-toggle="tooltip" data-placement="top" title="download lyrics file"  download="{{ isset($file_name)? $file_name:'' }}" target="_blank" data-vid="{{ $getVideoInfo->id }}" id="download_lyrics"><i class="fa fa-download"></i></a>
                                    @else
                                   <a class="secondary-button" data-toggle="tooltip" data-placement="top" title="download pdf file">pdf</a> 
                                    <a href="@if(isset($file_name)){{ asset('download'.'/'.$getVideoInfo->getCategoryName->name.'/'.$file_name) }} @endif
                                    " class="secondary-button" download="{{isset( $file_name )? $file_name :''}}" target="_blank" data-vid="{{ $getVideoInfo->id }}" data-toggle="tooltip" data-placement="top" title="doenload lyrics file"  id="download_lyrics"><i class="fa fa-download"></i></a>
                                    @endif
                                    <a href=" {{ asset('storage') }}/{{ 'mp3/'.$getVideoInfo->mp3_file }}" class="secondary-button" download="{{ $getVideoInfo->mp3_file  }}" data-toggle="tooltip" data-placement="top" title="download mp3"  target="_blank"  ><i class="fa fa-music"></i></a>
                                     
                                    <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://vdopedia.com">
                                        <!-- Total -->
                                        

                                        <!-- Facebook -->
                                        <button data-easyshare-button="facebook" style="padding-right: 10px;">
                                            <i style="color: blue;" data-toggle="tooltip" data-placement="top" title="share on facebook"  class="fa fa-facebook"></i>
                                        </button>
                                        {{-- <span data-easyshare-button-count="facebook"></span> --}}

                                        <!-- Twitter -->
                                        <button data-easyshare-button="twitter" data-toggle="tooltip" data-placement="top" title="share on twitter" data-easyshare-tweet-text="" style="padding-right: 10px;">
                                            <i  style="color:#00acee" class="fa fa-twitter"></i>
                                           
                                        </button>
                                        {{-- <span data-easyshare-button-count="twitter"></span> --}}

                                        <!-- Google+ -->
                                        <button data-easyshare-button="google" >
                                            <i style="color:#db4a39" data-toggle="tooltip" data-placement="top" title="share on google plus" class="fa fa-google-plus"></i>
                                            
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
        </section><!-- End single post description -->
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
                    <div id="comment_section_addition">
                        
                    </div>
                </div>
            </div>
        </section><!-- End Comments -->
    </div><!-- end left side content area -->
        
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
</div>
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
@endsection

@section('script')
    <link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('css/videojs-overlay-hyperlink.css') }}" rel="stylesheet">
    <script src="{{ asset('node_modules/es5-shim/es5-shim.js')}}"></script>
    <script src="{{ asset('node_modules/video.js/dist/video.min.js') }}"></script>
    <script type="text/javascript" src="https://players.brightcove.net/videojs-overlay/2/videojs-overlay.min.js"></script>
    <script src="{{ asset('node_modules/videojs-dynamic-overlay/dist/videojs-newoverlay.min.js') }}"></script>
    <script src="{{ asset('node_modules/videojs-dynamic-overlay/examples/videojs-contrib-hls.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/JavaScript" id="playfile" class="content_reload">
     
   
         var myPlayer,
        overlayDisplayed;
      

   // videojs.getPlayer('myPlayerID').ready(function() {
        // When the player is ready, get a reference to it
        myPlayer =   videojs('video_play_id{{ $getVideoInfo->id }}',{controls: true,autoplay: false,fluid:true});
        var aspectRatio = 315/640; 

        function resizeVideoJS(){
            var width = document.getElementById('video_play_id{{ $getVideoInfo->id }}').parentElement.offsetWidth;
            myPlayer.width(width);
            myPlayer.height( width * aspectRatio );

         }
      
       // Initialize resizeVideoJS()
        resizeVideoJS();
      // Then on resize call resizeVideoJS()
         window.onresize = resizeVideoJS; 
      // Initialize the overlay plugin with a clickable image
        var category_id = "{{ isset($getVideoInfo->category_id) ? $getVideoInfo->category_id:''}}";
       
        myPlayer.overlay({
        debug: true,
        <?php 
        /* this function use to convert time into second*/
        function second($sec) {
            $parsed = date_parse($sec);
            $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
            return $seconds; 
        }
        ?>
        "overlays": [
      <?php 
        if(!empty($lyrics_data)) {

            foreach ($lyrics_data as $lyrics) {  
                $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
      ?>

          {
            "align": "top-right",
            "start":{{ second( $start_time ) }},
            "end" :{{ second( $end_time ) }},
            "content": "{{ucfirst( $lyrics['text']) }}",
          },
          <?php }} ?>
          {
          start:0,
          end:0,
        }],
       
      }); 

        if(category_id == 2 || category_id == 4) {
            var  eOverlayButton = document.getElementById("overlayButton");
            //Initially show the overlay
            overlayDisplayed = true;
            //myPlayer.addClass("hide-overlay");
            // Listen for the click event on the Toggle Overlay button
            eOverlayButton.addEventListener("click",function(){
            if (overlayDisplayed) {
            // Hide the overlay
                overlayDisplayed = false;
                myPlayer.addClass("hide-overlay");
            } else {
                // Show the overlay
                overlayDisplayed = true;
                myPlayer.removeClass("hide-overlay");
            }
        });
    }else{
        var  eOverlayButton = document.getElementById("pdf");
        overlayDisplayed = false;
        myPlayer.addClass("hide-overlay");
    }

   

    $(document).ready(function() {
        $(document).on('click','.class-like',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
                if(checkUserLogin == '') {
                    route = "{{route('login')}}";
                    window.location.href = route;
                }else{
                    var vid = $(this).data('vid');
                    var user_id ="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                    var thumb = $(this).data('thumb');
                    var url = "{{ route('ajaxRequest') }}";
                    var _token = "{{ csrf_token() }}";
                    $.ajax({
                        type:'post',
                        url : url,
                        data: {vid:vid,thumb:thumb,user_id:user_id,_token:_token},
                        success:function(res){
                            if(res.status == true && thumb == 'likes') {
                                $('#id-likes').text(' '+ res.data[0].likes);
                                $('#setColorOfDislike').attr('style','');
                                $('#setColorOfLike').attr('style','background:#ec5840;');
                                $('#id-dislike').text(' '+ res.data[0].dislikes);
                            }else if(res.status == true && thumb == 'dislikes') {
                                $('#id-likes').text(' '+ res.data[0].likes);
                                $('#setColorOfLike').attr('style','');
                                $('#setColorOfDislike').attr('style','background:#ec5840;');
                                $('#id-dislike').text(' '+ res.data[0].dislikes);
                            }
                        }
                    })
                }  
            }); 
        });

    <?php 
        /* this function use to convert time into second*/
        function secondTime($sec) {
            $parsed = date_parse($sec);
            $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
            return $seconds; 
        }
    ?>
</script>
<script type="text/javascript" >
    var obj = {
            Subscribe:function(data){
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        //console.log(r);
                        if(r.status == true && r.subscription_status=='yes') {
                            $('#subscribe_add').html('');
                            $('#subscribe_add').html('<button type="button" style="background-color:#e96969;"  id="id-subscribe"  class="class-subscribe" data-status="yes" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBED </button>');
                        }else if(r.status == true && r.subscription_status=='no') {

                            $('#subscribe_add').html('');
                            $('#subscribe_add').html('<button type="button"   id="id-subscribe"  class="class-subscribe" data-status="no" data-user_id="'+r.user_id+'" name="subscribe"> SUBSCRIBE </button>');
                        }else if(r.message == 'Unauthenticated') {

                            route = "{{route('login')}}";
                            window.location.href = route;
                        }
                    }
                });
            },
            AddToFavorate:function(data) {
                $.ajax({
                    url: data.action,
                    type:"post",
                    data: data,
                    success:function(r){
                        //console.log(r);
                        if(r.status == true && r.favorate_status=='yes') { 
                            $('#fav_add').html('');
                            $('#fav_add').html('<button style="background-color:#e96969;" data-status="yes" type="button" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
                        }else if(r.status == true && r.favorate_status=='no') {
                            $('#fav_add').html('');
                            $('#fav_add').html('<button  type="button" data-status="no" id="id-fav" data-vid="'+r.video_id+'" data-user_id="'+r.user_id+'"><i class="fa fa-heart"></i>Add to</button>');
                        }
                    }
                });
            },
            downloadLyricsFile:function(data) {
                $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                })
                .done(function(res) {
                    console.log("success");
                })
                .fail(function(res) {
                    console.log("error");
                })
                .always(function(res) {
                    console.log("complete");
                });
                
            },
            categoryWiseFilter:function(data) {
                $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                }).done(function(res) {
                    $(document).scrollTop(0);
                    $('#script_remove').html(' ');
                    $('#categoryWiseFilter').html(' ');
                    changeurl(res.current_url);
                   
                    window.location.href=window.location.href;
                    $('#categoryWiseFilter').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-8');
                    $('#class_remove_of_trending').removeClass('large-7');
                    $('#class_remove_of_trending').addClass('large-6');
                    $('.category_wise_filter').attr('id','');
                    $('.category_wise_filter').attr('id',res.id);

                    var myPlayer,
                    overlayDisplayed;
                    
                   
                    
               // videojs.getPlayer('myPlayerID').ready(function() {
                    // When the player is ready, get a reference to it
                    myPlayer =   videojs(res.id,{controls: true,autoplay: false});
                    var aspectRatio = 310/640; 

                    function resizeVideoJS(){
                        var width = document.getElementById(res.id).parentElement.offsetWidth;
                        myPlayer.width(width);
                        myPlayer.height( width * aspectRatio );

                     }
      
                // Initialize resizeVideoJS()
                     resizeVideoJS();
                // Then on resize call resizeVideoJS()
                    window.onresize = resizeVideoJS; 
                  // Initialize the overlay plugin with a clickable image
                  myPlayer.overlay({
                    debug: true,                    
                    "overlays": [
                  <?php 

                    if(!empty($lyrics_data)){

                    foreach ($lyrics_data as $lyrics) {  
                    $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                    $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
                  ?>

                      {
                        "align": "top-right",
                        "start":{{ secondTime( $start_time ) }},
                        "end" :{{ secondTime( $end_time ) }},
                        "content": "{{ucfirst( $lyrics['text']) }}",
                      },
                      <?php }} ?>
                      {
                      start:0,
                      end:0,
                    }],
                   
                  });
                  if(res.category_id == 2 || res.category_id == 4) {

                     var  eOverlayButton = document.getElementById("overlayButton");
                    overlayDisplayed = true;
                  //myPlayer.addClass("hide-overlay");
                  // Listen for the click event on the Toggle Overlay button
                  eOverlayButton.addEventListener("click",function(){
                    if (overlayDisplayed) {
                        // Hide the overlay
                        overlayDisplayed = false;
                        myPlayer.addClass("hide-overlay");
                    } else {
                        // Show the overlay
                        overlayDisplayed = true;
                        myPlayer.removeClass("hide-overlay");
                    }
                  });
               }
               else{
                 var  eOverlayButton = document.getElementById("pdf");
                    overlayDisplayed = false;
                    myPlayer.addClass("hide-overlay");
               }
               subscribeButtonHide();
                getAllComment();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                 
            });    
    },
            trendingWiseFilter:function(data) {
                 $.ajax({
                    url: data.action,
                    type: 'post',
                    data: data,
                })
                .done(function(res) { 
                    $(document).scrollTop(0);
                    $('#script_remove').html(' ');
                    $('#search_result').html('');
                    $('#categoryWiseFilter').html(' ');
                    changeurl(res.current_url);
                    window.location.href=window.location.href;
                    $('#categoryWiseFilter').html(res.html);
                    $('#class_remove_of_trending').removeClass('large-8');
                    $('#class_remove_of_trending').removeClass('large-7');
                    $('#class_remove_of_trending').addClass('large-6');
                    $('.class_change_id').attr('id','');
                    $('.class_change_id').attr('id',res.id);

                    var myPlayer,
                    overlayDisplayed;
                   
               // videojs.getPlayer('myPlayerID').ready(function() {
                    // When the player is ready, get a reference to it
                    myPlayer =   videojs(res.id,{controls: true,autoplay: false});
                  // Initialize the overlay plugin with a clickable image
                    var aspectRatio = 310/640; 

                    function resizeVideoJS(){
                        var width = document.getElementById(res.id).parentElement.offsetWidth;
                        myPlayer.width(width);
                        myPlayer.height( width * aspectRatio );

                     }
      
                // Initialize resizeVideoJS()
                     resizeVideoJS();
                // Then on resize call resizeVideoJS()
                    window.onresize = resizeVideoJS; 
                    myPlayer.overlay({
                    debug: true,                    
                    "overlays": [
                  <?php 
                    if(!empty($lyrics_data)){

                    foreach ($lyrics_data as $lyrics) {  
                    $start_time =  \Carbon\Carbon::parse($lyrics['start_time'])->format('H:i:s');
                    $end_time =  \Carbon\Carbon::parse($lyrics['end_time'])->format('H:i:s');
                  ?>

                      {
                        "align": "top-right",
                        "start":{{ secondTime( $start_time ) }},
                        "end" :{{ secondTime( $end_time ) }},
                        "content": "{{ucfirst( $lyrics['text']) }}",
                      },
                      <?php }} ?>
                      {
                      start:0,
                      end:0,
                    }],
                   
                  });
                if(res.category_id == 2 || res.category_id == 4) {
                        eOverlayButton = document.getElementById("overlayButton");
                        overlayDisplayed = true;
                      //myPlayer.addClass("hide-overlay");
                      // Listen for the click event on the Toggle Overlay button
                        eOverlayButton.addEventListener("click",function(){
                            if (overlayDisplayed) {
                                // Hide the overlay
                                overlayDisplayed = false;
                                myPlayer.addClass("hide-overlay");
                            } else {
                                // Show the overlay
                                overlayDisplayed = true;
                                myPlayer.removeClass("hide-overlay");
                            }
                        });
                }else{
                    var  eOverlayButton = document.getElementById("pdf");
                    overlayDisplayed = false;
                    myPlayer.addClass("hide-overlay");
                }
                    subscribeButtonHide();
                });
            
        },
        sidebarVideoSearch:function(data) {
                $.ajax({
                    url:  data.action,
                    type: "post",
                    data: data,
                })
                .done(function(res) {
                    if(res.status == true) {
                        $('.sidebarSearchClass').html('');
                        $('.sidebarSearchClass').html(res.html);
                        $('.sidebarSearchClass').css('overflow-y', 'scroll');
                        $('.sidebarSearchClass').css('max-height', '400px');
                    }
                })
            },
            commentSection:function(data) {
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                    if(r.status==false) {
                        $('.error').text("");
                        jQuery.each(r.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if(r.status == true) {
                        
                        var comment =  $('.class_commentText').val('');
                         getAllComment();
                        
                    }
                }
            });
        },
        commentCategoryWiseSection:function(data) {
                console.log(data);
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                    if(r.status==false) {
                        $('.error').text("");
                        jQuery.each(r.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if(r.status == true) {
                        
                        var comment =  $('.class_commentText').val('');
                        // getAllComment();
                        
                    }
                }
            });
        },
        getCategoryWiseAllCommnet:function(data) {
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                     if(r.status == true) {
                      $('#comment_section_addition').html('');
                      $('#comment_section_addition').html(r.html);
                      $('#comment_count_id').text('');                        
                      $('#comment_count_id').text('('+r.comment+')');                        
                    }
                }
            });
        },

        replyCommentSection:function(data) {
            $.ajax({
                url: data.action,
                type:"post",
                data: data,
                success:function(r){
                    if(r.status==false) {
                        $('.error').text("");
                        jQuery.each(r.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if(r.status == true) {
                        var comment =  $('.class-textComment').val('');
                         getAllComment();

                    }
                }
            });
        },
    }
/* subscribe and un subcribe function */
        $(document).ready(function() {
            $(document).on('click','.class-subscribe',function() {
                var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
                if(checkUserLogin == '') {
                    route = "{{route('login')}}";
                    window.location.href = route;
                }
                var user_id = $(this).data('user_id');
                var status = $(this).data('status');
                var action = '{{ route('subscribed') }}';
                var _token = "{{ csrf_token() }}";
                var data = {user_id:user_id,status:status,_token:_token,target:'#',action:action};
                obj.Subscribe(data);
            });
        });

        $(document).ready(function() {
            $(document).on('click','#id-fav',function() {

                var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                if(checkUserLogin == '') {
                    route = "{{url('/login')}}";
                    window.location.href = route;
                }
                var user_id = $(this).data('user_id');
                var video_id = $(this).data('vid');
                var status = $(this).data('status');
                var action = '{{ route('favorate') }}';
                var _token = "{{ csrf_token() }}";
                var data = {user_id:user_id,video_id:video_id,status:status,_token:_token,target:'#',action:action};
                obj.AddToFavorate(data);

            });
        });

       
    $(document).ready(function(){
        subscribeButtonHide();
    });
    function subscribeButtonHide() {
        $(document).ready(function(){
            var user_id = "{{ isset($getVideoInfo->getUserInfo->id) ? $getVideoInfo->getUserInfo->id:'' }}";
            var auth  = "{{ isset(Auth::user()->id)?Auth::user()->id:'' }}";
            if(auth == user_id) {

                $('#id-subscribe').hide();
            }
        });
    }
         
    /* category wise video load */
        $(document).on('click','.class_category',function() {

            var category_id =  $(this).data('category_id');
            var click = $('#id_number').val();
            var action = '{{ route('video.categoryWise.filter') }}';
            var _token = "{{ csrf_token() }}";
            data = {category_id:category_id,click:click,action:action,_token:_token};
            obj.categoryWiseFilter(data);
        });

    /* video trending wise video filter*/

    $(document).on('click','.trending_videos',function() {
        $('#script_remove').html(' ');   
        var category_id =  $(this).data('video_status');
        var click = $('#id_number').val();
        var action = '{{ route('video.trendingWise.filter') }}';
        var _token = "{{ csrf_token() }}";
        data = {category_id:category_id,click:click,action:action,_token:_token};
        obj.trendingWiseFilter(data);

    });

/* increment value function for video player load on category and trending filter*/

function increase() {
    var textBox = $('#id_number').val();
    var inc = ++textBox;
    $('#id_number').val(inc);
}

/*sidebar videos search result*/

    $(document).on('click','#sidebar_video_search_button',function() {
        var keyword = $('#sidebar_video_search_id').val();
        var action = "{{ route('video.search.sidebar') }}";
        var _token = "{{ csrf_token() }}";
        data = {keyword:keyword,action:action,_token:_token};
        obj.sidebarVideoSearch(data);
    });

/*comment store*/

    $(document).on('click','#commentStore',function() { 
        var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
        if(checkUserLogin == '') {
            route = "{{url('/login')}}";
            window.location.href = route;
        }
        var user_id = $(this).data('user_id');
        var video_id = $(this).data('video_id');
        var comment = $('.class_commentText').val();
        var action  =  "{{ route('comment') }}";
        var _token = "{{ csrf_token() }}";
        var data = {user_id:user_id,comment:comment,video_id:video_id,action:action,_token:_token};
        obj.commentSection(data);

    });

    /*reply comment store*/
     jQuery(document).ready(function() {
        jQuery(document).on('click','.replyComment',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
            if(checkUserLogin == '') {
                route = "{{url('/login')}}";
                window.location.href = route;
            }
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var comment =  $('.class-textComment').val();
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('replyCommentSection') }}';
            var data = {user_id:user_id,video_id:video_id,parent_id:parent_id,_token:_token,comment:comment,action:action};
            obj.replyCommentSection(data);
        });
    });

    /*get all comment*/
    function getAllComment() {
        var user_id = "{{ isset($getVideoInfo->user_id) ? $getVideoInfo->user_id:" " }}";
        var video_id = "{{ isset($getVideoInfo->id) ? $getVideoInfo->id:"" }}";
        
        if(user_id !='' && video_id !=''){
            var _token ="{{ csrf_token() }}";
            var action = '{{ route('getComment') }}';
            var data = {user_id:user_id,video_id:video_id,target:'#add-comment',_token:_token,action:action};
            $.ajax({
                url: action,
                type:"post",
                data: data,
                success:function(r){
                     if(r.status == true) {
                      $('#comment_section_addition').html('');
                      $('#comment_section_addition').html(r.html);
                      $('#comment_count_id').text('');                        
                      $('#comment_count_id').text('('+r.comment+')');                        
                    }
                }
            });
        }
    }
    $(document).ready(function(){
        getAllComment();
    });
    
/* reply section part */
    $(document).on('click','.reply-class', function( e ) {
            var user_id =  $(this).data('user_id');
            var video_id =  $(this).data('video_id');
            var parent_id =  $(this).data('parent_id');
            var image =  $(this).data('image');
           
            var name =  "{{ isset(Auth::user()->name) ? Auth::user()->name: '' }}";

            e.preventDefault();
            $('<div/>').addClass( 'new-text-div' )
            .html( $('<div id="data" class="comment-box  thumb-border"><div class="media-object stack-for-small reply-comment"><div class="media-object-section comment-img text-center"><div class="comment-box-img"><img src="'+image+'" alt="profile author img"></div><h6><a href="#">'+name+'</a></h6></div><div class="media-object-section comment-textarea"><textarea name="comment" class="class-textComment" placeholder="Add a comment here.."></textarea><div class="error comment"></div><input type="submit" class="replyComment" data-user_id="'+user_id+'" data-video_id=" '+video_id+' " data-parent_id="'+parent_id+'" name="comment" value="Reply"> <input type="submit" class="remove_this" value="cancel"> </div></div></div>').addClass( 'someclass' ) )
            .append( $('<button/>'))
            .insertBefore( this );
        });
        $(document).on('click', '.remove_this', function( e ) {
            e.preventDefault();
            $(this).closest( 'div.new-text-div' ).remove();
        });

    /*comment like and dislike section*/
    $(document).ready(function() {
        $(document).on('click','.comment_likes',function() {
            var checkUserLogin = "{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                //alert(checkUserLogin);
            if(checkUserLogin == '') {
                route = "{{route('login')}}";
                window.location.href = route;
            }else{
                var comment_id = $(this).data('comment_id');
                var user_id ="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}";
                var thumb = $(this).data('thumb');
                var url = "{{ route('comment.ajaxRequest') }}";
                var _token = "{{ csrf_token() }}";
                $.ajax({
                    type:'post',
                    url : url,
                    data: {comment_id:comment_id,thumb:thumb,user_id:user_id,_token:_token},
                    success:function(res){
                        if(res.status == true && thumb == 'likes') {
                            $('#id-likes'+res.comment_id).text(' '+ res.data[0].likes);
                            $('#setColorOfDislike'+res.comment_id).attr('style','');
                            $('#setColorOfLike'+res.comment_id).attr('style','background:#ec5840;');
                            $('#id-dislikes'+res.comment_id).text(' '+ res.data[0].dislikes);
                        }else if(res.status == true && thumb == 'dislikes') {
                            $('#id-likes'+res.comment_id).text(' '+ res.data[0].likes);
                            $('#id-dislikes'+res.comment_id).text(' '+ res.data[0].dislikes);
                            $('#setColorOfLike'+res.comment_id).attr('style','');
                            $('#setColorOfDislike'+res.comment_id).attr('style','background:#ec5840;');
                        }
                    }
                })
            }  
        }); 
    });

    /*change url of site*/
function changeurl(url) {
    var new_url=url;
    window.history.pushState("data","Title",new_url);
    document.title=url;
}
</script>


@endsection
</div>