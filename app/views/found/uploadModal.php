<div class="modal fade" id="uploadModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Upload</h4>
			</div>
			<form onsubmit="#" action="" method="POST" role="form">
				<div class="modal-body">
					<div>
						<img id="upload-photo-preview" src=""/>
					</div>
					<div id="upload-photo-text" class="form-group">
						<input id="upload-title" type="text" class="form-control" placeholder="Title" autofocus required="required"><!--get username from database-->
					</div>
					<textarea id="upload-description" class="form-control" rows="3" placeholder="description"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-hue">Save</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
