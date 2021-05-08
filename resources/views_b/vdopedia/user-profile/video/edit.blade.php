@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> EditVideoUpload
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
@section('body-content')
    <section class="registration">
        <div class="row">
            <div class="large-12 columns profile-inner">
                <section class="submit-post">
                    <div class="row secBg">
                        <div class="large-12 columns">
                            <div class="heading">
                                <i class="fa fa-pencil-square-o"></i>
                                <h4>Edit Video Post</h4>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <form enctype="multipart/form-data" id="videoUploadForm">
                                        @csrf
                                        <input type="hidden" id="id-video_id" name="video_id" value="{{ $editVideoInfo->id }}">
                                        <div data-abide-error class="alert callout" style="display: none;">
                                            <p><i class="fa fa-exclamation-triangle"></i>
                                                There are some errors in your form.</p>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <label>Title
                                                    <input type="text" name="title" value="{{ $editVideoInfo->title }}" placeholder="enter you video title..." required>
                                                    <div class="error title"></div>
                                                </label>
                                            </div>
                                            <div class="large-12 columns">
                                                <label>Description
                                                    <textarea name="description">{{ $editVideoInfo->description }}</textarea>
                                                    <div class="error description"></div>
                                                </label>
                                            </div>
                                            <!--
                                            <div class="large-12 columns">
                                                <h6 class="borderBottom">Choose Video Method:</h6>
                                                <p><strong>Note:</strong> Please choose one of the following ways to embed the video into your post, the video is determined in the order: Video Code > Video URL > Video File.</p>
                                            </div>
                                            <div class="large-12 columns">
                                                <div class="radio">
                                                   <input type="radio" value="check" name="videolink" id="videolink1" checked>
                                                   <label class="customLabel" for="videolink1">Video Link From Youtube/Vimeo etc..</label>
                                                   <input type="radio" value="check" name="videolink" id="videolink2">
                                                   <label class="customLabel" for="videolink2">Custom Video Upload / Put custom Video URL </label>
                                                   <input type="radio" value="check" name="videolink" id="videolink3">
                                                   <label class="customLabel" for="videolink3">Embed/Object Code</label>
                                                </div>
                                            </div>
                                            -->
                                            <div class="large-12 columns">
                                                <div class="large-6 columns">
                                                    <div class="upload-video">
                                                        <label for="videoUpload" class="button">Upload Media File</label>
                                                        <input type="file" id="videoUpload" value="{{ $editVideoInfo->video_file }}" name="video_file" class="show-for-sr">                                              
                                                    </div>

                                                    <video id="id-video_file" width="320" height="200" controls>
                                                        <source id="video_file" src="{{ asset('storage') }}/{{ $editVideoInfo->video_file  }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                    </video>
                                                    <div class="error video_file"></div>
                                                </div>
                                                <div class="large-6 columns">
                                                    <div class="post-category">
                                                        <label>Choose Video Category:
                                                            <select name="category_id[]" class=" js-example-basic-multiple select_category" multiple="multiple">
                                                                <option value="">--select--</option>
                                                                @foreach($getCategory as $category)
                                                                @foreach($editVideoInfo->getCategoryName1 as $cat)

                                                                    <option value="{{ $category->id }}" @if($category->id == $cat->category_id) selected="selected"@endif>{{ $category->name }}</option>
                                                                @endforeach
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                         <div class="error category_id"></div>
                                                    </div>
                                                    <div class="upload-video fileUpload_hide">
                                                        <label for="lyricsUpload" class="button fileUploadLableCahnage">Upload file</label>
                                                        <input type="file" name="file" id="lyricsUpload" class="show-for-sr">

                                                    </div>
                                                    <div class="error file"></div>
                                                </div>
                                            </div>
                                            <div class="large-12 columns">
                                                <div class="post-meta">
                                                    <label>Meta Title:
                                                        <select name="meta_title[]" id="abc" class="form-control select2-search-choice select2" multiple="multiple"  placeholder="meta-title.." required>
                                                            @if(isset($editVideoInfo->getMetaTitle))
                                                                @foreach($editVideoInfo->getMetaTitle as $meta_title)
                                                                      <option value="{{$meta_title->title_name}}"selected="selected">{{$meta_title->title_name}}</option>
                                                                @endforeach
                                                            @endif
                                                            
                                                        </select>
                                                    </label>
                                                    <div class="error meta_title"></div>
                                                    <p>IF you want to put your custom meta Title then put here otherwise your post title will be the default meta Title</p>
                                                </div>
                                                <div class="post-meta">
                                                    <label>Meta Description:
                                                        <select name="meta_description[]" class="form-control select2" multiple="multiple" type="text" placeholder="enter video tags.." required>
                                                            @if(isset($editVideoInfo->meta_description))
                                                                @foreach(explode(',',$editVideoInfo->meta_description) as $meta)
                                                                      <option value="{{$meta}}"selected="selected">{{$meta}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </label>
                                                    <div class="error meta_description"></div>
                                                    <p>IF you want to put your custom meta description then put here otherwise your post description will be the default meta description</p>
                                                </div>
                                                <div class="post-meta">
                                                    <label>Tags:
                                                        <select name="tags[]" class="form-control select2" multiple="multiple" type="text" placeholder="enter video tags.." required>
                                                             @if(isset($editVideoInfo->getTags))
                                                                @foreach($editVideoInfo->getTags as $tag)
                                                                      <option value="{{$tag->name}}"selected="selected">{{$tag->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </label>
                                                    <div class="error tags"></div>
                                                    <p>IF you want to put your custom meta Keywords then put here otherwise your post Keywords will be the default meta Keywords</p>
                                                </div>
                                                
                                            </div>
                                            <div class="large-6 columns">
                                                
                                                {{-- <embed  id="lyrics_file" src="{{ asset('images\logo.jpg') }}" width="320px" height="300"> --}}
                                                   {{--  <img id="lyrics_file" src="{{ asset('images\logo.jpg') }}" style="width: 320px; height: 200px; margin-bottom: 10px;"> --}}
                                                   <div id="wait" style="display:none;">
                                                    <img src='{{ asset('images/5.gif') }}' width="64" height="64" /><br><br>File Uploading Please Wait..
                                                </div>
                                                
                                            </div>
                                            <div class="large-12 columns">
                                                <button class="button expanded" type="button" onclick="submitForm()" >publish now</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section><!-- End profile settings -->
            </div><!-- end left side content area -->
        </div>
    </section>

    @endsection

    @section('script')
    <script type="text/javascript">
        
        function submitForm() {
            $("#wait").css("display", "block");
            var url = "{{route('videoUpload.update')}}";
            var formData = new FormData($('#videoUploadForm')[0]);
            console.log(formData);
            $.ajax({
                type: 'post',
                url: url,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function (res) { 
                    $("#wait").css("display", "none");
                    if(res.status==false) {
                        $('.error').text("");
                        jQuery.each(res.error, function(index, val) {
                            if ($('div').find('.'+index )) {
                                $('.'+index).text(val[0]);
                            }
                        });
                    }else if (res.status==true) {
                        $('.error').text("");
                        swal({
                            title: "Done",
                            text: res.msg,
                            icon: "success",
                            button: "close",
                            timer: 10000,
                        });
                        window.location.href=window.location.href;
                    } 
                }
            });
         }

         /*image script url reader*/
        function readURL(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_file').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgUpload").change(function () { 
        readURL(this);
    });
     /*image script url reader*/
        function readBackgroundURL(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#id-video_file').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#videoUpload").change(function () {
        readBackgroundURL(this);
    });
        

/* category filter option */

    $(document).on('change','.select_category',function(){
        var category_id = $('.select_category').val();
        
        if(category_id == 1) {
            $('.fileUpload_hide').show();
            $('.fileUploadLableCahnage').text('');
            $('.fileUploadLableCahnage').text('Upload Pdf file');
        }else if(category_id == 2) {
            $('.fileUpload_hide').show();
            $('.fileUploadLableCahnage').text('');
            $('.fileUploadLableCahnage').text('Lyrics File');
        }else if(category_id == 4){
            $('.fileUpload_hide').show();
            $('.fileUploadLableCahnage').text('');
            $('.fileUploadLableCahnage').text('Lyrics File');
        }else{
            $('.fileUpload_hide').hide();
        }
    });
    </script>

    @endsection