@extends('layout.app_new')
@section('breadcrumb')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ route('home') }}">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> VideoUpload
                        </li>
                    </ul>
               </nav>
            </div>
        </div>
    </section>
    <style type="text/css">
        .dz-clickable{
            height:86px;
        }
   .progress_bar {
    margin: 10px 0;
    padding: 3px;
    border: 1px solid #000;
    font-size: 14px;
    clear: both;
    opacity: 0;
    -moz-transition: opacity 1s linear;
    -o-transition: opacity 1s linear;
    -webkit-transition: opacity 1s linear;
  }
  .progress_bar.loading {
    opacity: 1.0;
  }
  .progress_bar .percent {
    background-color: #99ccff;
    height: auto;
    width: 0;
  }
    </style>
@endsection
@section('body-content')
    <section class="registration">
        <div class="row">
            <div class="large-12  columns profile-inner">
                <section class="submit-post">
                    <div class="row secBg">
                       <div class="large-12 columns">
                            <div class="heading">
                                <i class="fa fa-pencil-square-o"></i>
                                <h1>Add new video Post</h1>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <form id="videoUploadForm"  enctype="multipart/form-data" >
                                        @csrf
                                        <div data-abide-error class="alert callout" style="display: none;">
                                            <p><i class="fa fa-exclamation-triangle"></i>
                                                There are some errors in your form.</p>
                                        </div>
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <label>Title
                                                    <input type="text" id="title" name="title" placeholder="enter you video title..." required>
                                                    <div class="error title title_error"></div>
                                               </label>
                                            </div>
                                            <div class="large-12 columns">
                                                <label>Description
                                                    <textarea id="description" name="description"></textarea>
                                                   <div class="error description"></div>
                                                </label>
                                            </div>
                                            <div class="large-12  columns">
                                                <div class="large-6 columns">
                                                     <label>Choose Video File:</label>
                                                    <div id="imageUpload" class="dropzone"></div>
                                                    <br><br><br>
                                                    <video id="id-video_file" width="320" height="200" controls>
                                                        <source id="video_file" src="" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <div class="error video_file"></div>
                                                </div>
                                                <div class="large-6 columns"> 
                                                    <div class="post-category">
                                                        <label>Choose Video Category:
                                                            <select id="category_id" name="category_id[]" class=" js-example-basic-multiple select_category" multiple="multiple">
                                                                <option value="">--select--</option>
                                                                @foreach($getCategory as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </label>
                                                        <div class="error category_id"></div>
                                                    </div>
                                                    <br>
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
                                                        <select name="meta_title[]" id="meta_title" class="form-control select2-search-choice select2" multiple="multiple"  placeholder="meta-title.." required>
                                                        </select>
                                                    </label>
                                                    <div class="error meta_title"></div>
                                                    <p>IF you want to put your custom meta Title then put here otherwise your post title will be the default meta Title</p>
                                                </div>
                                                <div class="post-meta">
                                                    <label>Meta Description:
                                                        <select name="meta_description[]" class="form-control select2" multiple="multiple" type="text" placeholder="enter video tags.." required>
                                                        </select>
                                                    </label>
                                                    <div class="error meta_description"></div>
                                                    <p>IF you want to put your custom meta description then put here otherwise your post description will be the default meta description</p>
                                                </div>
                                               <div class="post-meta">
                                                    <label>Tags:
                                                        <select name="tags[]" id="tags"class="form-control select2" multiple="multiple" type="text" placeholder="enter video tags.." required>                                                        </select>
                                                    </label>
                                                   <div class="error tags"></div>
                                                   <p>IF you want to put your custom meta Keywords then put here otherwise your post Keywords will be the default meta Keywords</p>
                                                </div>
                                            </div>
                                            <div class="large-12 columns">
                                                <div id="status"></div>   
                                                <div id="wait" style="display:none;">
                                                    <img src="{{ asset('images/5.gif') }}" width="64" height="64" /><br><br>File Uploading Please Wait..
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progressbar">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" data-dz-uploadprogress>
                                                <span class="progress-text"></span>
                                            </div>
                                        </div>
                                        <div class="large-12 columns">
                                            <button class="button expanded" id="submitform" type="button">publish now</button>
                                        </div>
                                </form>
                                    </div>
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
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/additional-methods.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/dropzone.css')}}">
<script src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript">
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

/*lyrics file script url reader*/
    function readLyricsURL(input) { 
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#lyrics_file').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#lyricsUpload").change(function () { 
        readLyricsURL(this);
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

    $(document).on('change','.select_category',function() {
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

// function uploadFile() {
//         $('.error').text("");
//         var url = "{{route('videoUpload.store')}}";
//         var formData = new FormData($('#videoUploadForm')[0]);
//         console.log(formData);
//         $.ajax({
//             url: url,
//             type: 'POST',
//             data: formData,
//             xhr: function() {
//                 var xhr = new window.XMLHttpRequest();
//                 xhr.upload.addEventListener("progress", function(evt) {
//                     if (evt.lengthComputable) {
//                         var percentComplete = evt.loaded / evt.total;
//                          $('#status').html('<b> Processing your file -> ' + (Math.round(percentComplete * 100)) + '%  please wait your file is still uploading..</b>');
//                        if((Math.round(percentComplete * 100)) == 100){
//                         $('#status').html('<b> Processing your file ..... ');

//                        }
//                     }
//                 }, false);
//                 return xhr;
//             },
//             success: function (res) { 
//                 if(res.status==false) {
//                     $('.error').text("");
//                     $('#status').html('<b> please fill above field.</b>');
//                     jQuery.each(res.error, function(index, val) {
//                         if ($('div').find('.'+index )) {
//                             $('.'+index).text(val[0]);
//                         }
//                     });
//                 }else if (res.status==true) {
//                     $('.error').text("");
//                     swal({
//                         title: "Done",
//                         text: res.msg,
//                         icon: "success",
//                         button: "close",
//                         timer: 10000,
//                     });
//                     window.location.href=window.location.href;
//                 } 
//             },
//             cache: false,
//             contentType: false,
//             processData: false
//         });
//         return false;
//    }

$(function() {

$("#videoUploadForm").validate({
                rules: {
                    title: { required: true},
                    description: { required: true},
                    "tags[]": { required: true},
                    "meta_title[]": { required: true},
                    "category_id[]": { required: true},
                    // video_file: {required: true, accept: "mp4|avi|m4v|mpg", }
                },
                messages: {
                    title: { required: "Title field required." },
                    description: { required: "Description field required." },
                    tags: { required: "Tags field required." },
                    meta_title: { required: "Meta title field required." },
                    category_id: { required: "category field required." },
                    video_file: { required: "video file field required.",
                                 accept:"video file must valid format mp4,avi,mpg.", },

                },
                ignore: "",
                errorClass:  'error',
                onkeyup:     false,
                onblur:      false,
                errorElement:'label',
                // submitHandler: function() {                        
                //    $('.error').text("");
                //     var url = "{{route('videoUpload.store')}}";
                //     var formData = new FormData($('#videoUploadForm')[0]);
                //     console.log(formData);
                //     $.ajax({
                //         url: url,
                //         type: 'POST',
                //         data: formData,
                //         xhr: function() {
                //             var xhr = new window.XMLHttpRequest();
                //             xhr.upload.addEventListener("progress", function(evt) {
                //                 if (evt.lengthComputable) {
                //                     var percentComplete = evt.loaded / evt.total;
                //                      $('#status').html('<b> Processing your file -> ' + (Math.round(percentComplete * 100)) + '%  please wait your file is still uploading..</b>');
                //                    if((Math.round(percentComplete * 100)) == 100){
                //                     $('#status').html('<b> Processing your file ..... ');

                //                    }
                //                 }
                //             }, false);
                //             return xhr;
                //         },
                //         success: function (res) { 
                //             if(res.status==false) {
                //                 $('.error').text("");
                //                 $('#status').html('<b> please fill above field.</b>');
                //                 jQuery.each(res.error, function(index, val) {
                //                     if ($('div').find('.'+index )) {
                //                         $('.'+index).text(val[0]);
                //                     }
                //                 });
                //             }else if (res.status==true) {
                //                 $('.error').text("");
                //                 swal({
                //                     title: "Done",
                //                     text: res.msg,
                //                     icon: "success",
                //                     button: "close",
                //                     timer: 10000,
                //                 });
                //                 window.location.href=window.location.href;
                //             } 
                //         },
                //         cache: false,
                //         contentType: false,
                //         processData: false
                //     });
                //     return false;
                // }
            });

        //     $("#submitform").click(function(){
        //     $("#videoUploadForm").submit();
        //     return false;
        // });
});
    

</script>
<script>
Dropzone.autoDiscover = false;
myDropzone = new Dropzone('div#imageUpload', {
    addRemoveLinks: true,
    acceptedFiles: ".mp4,.mpg,.avi,",
    autoProcessQueue: false,
    // uploadMultiple: true,
    parallelUploads: 100,
    maxFilesize: 2048,
    maxFiles: 1,
    paramName: 'video_file',
    clickable: true,
    url: '{{route('videoUpload.store')}}',
    init: function () {

        var myDropzone = this;
        // Update selector to match your button
        $('#submitform').click(function (e) {
            e.preventDefault();
            if ( $('#videoUploadForm').valid() ) {
                myDropzone.processQueue();
            }
            return false;
        });

        this.on('sending', function (file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $('#videoUploadForm').serializeArray();
            $.each(data, function (key, el) {
                formData.append(el.name, el.value);
            });
          

        });
        this.on("addedfile", function(file, done) {
           var $previewEl = $("#id-video_file");

           if ($previewEl[0].canPlayType(file.type) !== "no"){
              var fileURL = URL.createObjectURL(file);

              $($previewEl).one('loadeddata', function(){
                  URL.revokeObjectURL(fileURL);
              });
              $previewEl[0].src = fileURL;
           }
        });
    },
    uploadprogress: function(file, progress, bytesSent) {
        if (file.previewElement) {
            var progressElement = file.previewElement.querySelector("[data-dz-uploadprogress]");
            progressElement.style.width = progress + "%";
            $(".progress-text").html('<b> Processing your file -> ' + (Math.round(progress)) + '%  please wait your file is still uploading..</b>');
            if((Math.round(progress)) == 100){
                $('.progress-text').html('<b> Processing your file ..... ');

               }
        }
    },
    
    success: function (file,res) { 
        console.log(file);
        console.log(res);
        
                if(res.status==false) {
                    $('.error').text("");
                    $('#status').html('<b> please fill above field.</b>');
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
            },
    completemultiple: function (file, response) {
       
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});
$('.dz-remove').hide();
</script>


@endsection