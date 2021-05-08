<div id="data" class="comment-box class-comment  thumb-border">
    <div class="media-object stack-for-small">
        <div class="media-object-section comment-img text-center">
            <div class="comment-box-img">
                 <img src="http://localhost/vdopedia_project/public/storage/profile_image/1561116448photo-1525249181835-95a4c9168268.jpg" alt="profile author img">
            </div>
            <h6><a href="#">Pankaj maurya</a></h6>
        </div>
        <div class="media-object-section comment-textarea">
            
                <textarea name="comment" class="class-textComment" placeholder="Add a comment here.."></textarea>
                <div class="error comment"></div>
                <input type="submit" class="class-comment" data-user_id="{{ $replyView->user_id }}" data-video_id=" {{ $replyView->video_id }} " data-parent_id="{{ $replyView->parent_id  }}" name="comment" value="send">
            
        </div>
    </div>
</div>