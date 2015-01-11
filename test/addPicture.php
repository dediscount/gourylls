<form action="/gourylls/user/addpicture" method="POST" role="form" enctype="multipart/form-data">
    <div class="modal-body">
        <div>
            <img id="upload-photo-preview" src=""/>
        </div>
        <div id="upload-photo-text" class="form-group">
            <input id="upload-title" name="pic_title" type="text" class="form-control" placeholder="Title" autofocus required="required"><!--get username from database-->
        </div>
        <input type="file" name="picture" accept="image/*"/>
        <textarea id="upload-description" class="form-control" rows="3" name="pic_desc" placeholder="description"></textarea>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-hue">Save</button>
    </div>
</form>


