<div class="modal fade" id="uploadModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Upload</h4>
			</div>
			<form action="/gourylls/found/addpicture" method="POST" role="form" enctype="multipart/form-data">
				<div class="modal-body">
					<div id="upload-photo-container" class="glyphicon glyphicon-plus">
						<input id="upload-file" name="picture" type="file" class="input-hidden-upload" accept="image/*" required="required" title="Please upload a photo">
					</div>
					<div id="upload-photo-preview-container">
						<img id="upload-photo-preview" src=""/>
					</div>
					<div id="upload-photo-text" class="form-group">
						<input id="upload-title" name="pic_title" type="text" class="form-control" placeholder="Title" autofocus required="required"><!--get username from database-->
                                                <!--上传图片表单需要放在这里
                                                <input type="file" name="picture" accept="image/*"/>
http://localhost/gourylls/test/addpicture.php 像这个页面                                                
                                                   -->
					</div>
					<textarea id="upload-description" name="pic_desc" class="form-control" rows="3" placeholder="description"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary btn-hue">Save</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
