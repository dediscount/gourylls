<div class="modal fade" id="loginModal">
	<div class="modal-dialog">
		<!--validate and submit-->
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
					<h4 class="modal-title">Log in</h4>
				</div>
				<form class="" onsubmit="" action="/gourylls/login" method="POST" role="form">
					<div class="modal-body">
						<div class="input-group-login">
							<input type="text" name="input-account" id="inputInput-Account" class="form-control" placeholder="Enter your account..." required="required"  title="Enter your account">
							<br/>
							<input type="password" name="input-password" id="inputInput-Password" class="form-control" placeholder="Enter your password..." required="required" title="Enter your password...">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-hue">Log in</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->