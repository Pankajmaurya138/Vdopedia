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
  .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
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
                                <h4>Add new video Post</h4>
                            </div>
                            <div class="row">
                                <div class="large-12 columns">
                                    <form enctype="multipart/form-data" id="videoUploadForm">
                                        @csrf
                                        <div data-abide-error class="alert callout" style="display: none;">
                                            <p><i class="fa fa-exclamation-triangle"></i>
                                                There are some errors in your form.</p>
                                        </div>
                                       <div class="row">
                                            <div class="large-12 columns">
                                                <label>Title
                                                    <input type="text" name="title" placeholder="enter you video title..." required>
                                                    <div class="error title"></div>
                                               </label>
                                            </div>
                                            <div class="large-12 columns">
                                                <label>Description
                                                    <textarea name="description"></textarea>
                                                   <div class="error description"></div>
                                                </label>
                                            </div>
                                            <!--
-                                            <div class="large-12 columns">
-                                                <h6 class="borderBottom">Choose Video Method:</h6>
-                                                <p><strong>Note:</strong> Please choose one of the following ways to embed the video into your post, the video is determined in the order: Video Code > Video URL > Video File.</p>
-                                            </div>
-                                            <div class="large-12 columns">
-                                                <div class="radio">
-                                                   <input type="radio" value="check" name="videolink" id="videolink1" checked>
-                                                   <label class="customLabel" for="videolink1">Video Link From Youtube/Vimeo etc..</label>
-                                                   <input type="radio" value="check" name="videolink" id="videolink2">
-                                                   <label class="customLabel" for="videolink2">Custom Video Upload / Put custom Video URL </label>
                                                   <input type="radio" value="check" name="videolink" id="videolink3">
                                                   <label class="customLabel" for="videolink3">Embed/Object Code</label>
                                                </div>
                                            </div>
                                            -->
                                            <div class="large-12 columns">
                                                <div class="large-6 columns">
                                                    <div class="upload-video">
                                                        <label for="videoUpload" class="button">Upload Media File</label>
                                                        <input type="file" id="videoUpload" name="video_file" class="show-for-sr">                                              
                                                   </div>
                                                    <video id="id-video_file" width="320" height="200" controls>
                                                        <source id="video_file" src="" type="video/mp4">
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
                                                        <select name="meta_title[]" id="abc" class="form-control select2-search-choice select2" multiple="multiple"  placeholder="meta-title.." required>
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
                                                        <select name="tags[]" class="form-control select2" multiple="multiple" type="text" placeholder="enter video tags.." required>                                                        </select>
                                                    </label>
                                                   <div class="error tags"></div>
                                                   <p>IF you want to put your custom meta Keywords then put here otherwise your post Keywords will be the default meta Keywords</p>
                                                </div>
                                            </div>
                                        <div class="large-12 columns">
                                             <div id="status"></div>   
                                               <div id="wait" style="display:none;">
                                                <img src='{{ asset('images/5.gif') }}' width="64" height="64" /><br><br>File Uploading Please Wait..
                                            </div>
                                             
                                            
                                        </div>

                                                   
                                                         
                                        </div>
                                        <div class="large-12 columns">
                                            <button class="button expanded" onclick="uploadFile()"  type="button"  >publish now</button>
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
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript">
    	jQuery('.select2').select2({
    tags: true,
    data: [],
    tokenSeparators: [','], 
    placeholder: "Add your tags here",
    /* the next 2 lines make sure the user can click away after typing and not lose the new tag */
    selectOnClose: true, 
    closeOnSelect: false
});


 jQuery('.js-example-basic-multiple').select2({
 	maximumSelectionLength: 3
 });

    /*    
        function submitForm() {
            $("#wait").css("display", "block");
            $('.error').text("");
            var url = "{{route('videoUpload.store')}}";
            var formData = new FormData($('#videoUploadForm')[0]);
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
        */
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

function uploadFile() {
    $('.error').text("");
         var url = "{{route('videoUpload.store')}}";
            var formData = new FormData($('#videoUploadForm')[0]);
        console.log(formData);
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                         $('#status').html('<b> Uploading -> ' + (Math.round(percentComplete * 100)) + '%  please wait your file is still uploading..</b>');
                       if(percentComplete == 98){
                        $('#status').html('<b> Uploading -> ' + (Math.round(percentComplete * 100)) + '% </b>');

                       }
                    }
                }, false);
                return xhr;
            },
            success: function (res) { 
           
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
                    $('#status').html('<b> Uploading -> ' + 100 + '% </b>');
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
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
    

}

// (function() {
 
//     var bar = $('.bar');
//     var percent = $('.percent');
//     var status = $('#status');
 
//     // function uploadFile() {
//     $('.error').text("");
//          var url = "{{route('videoUpload.store')}}";
//             var formData = new FormData($('#videoUploadForm')[0]);
//         console.log(formData);
//         $.ajax({
//             url: url,
//             type: 'POST',
//             data: formData,
//             cache: false,
//             contentType: false,
//             processData: false,
       
//         beforeSend: function() {
//             status.empty();
//             var percentVal = '0%';
//             var posterValue = $('input[name=file]').fieldValue();
//             bar.width(percentVal)
//             percent.html(percentVal);
//         },
//         uploadProgress: function(event, position, total, percentComplete) {
//             var percentVal = percentComplete + '%';
//             bar.width(percentVal)
//             percent.html(percentVal);
//         },
//         success: function() {
//             var percentVal = 'Wait, Saving';
//             bar.width(percentVal)
//             percent.html(percentVal);
//         },
//         complete: function(xhr) {
//             status.html(xhr.responseText);
           
//         }
//     });
     
//     })();

    </script>



    @endsection