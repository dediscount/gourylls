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
							<div class="form-group has-feedback">
							<input type="text" name="input-account" id="inputInput-Account" class="form-control" placeholder="Enter your email..." required="required"   title="Enter your account"><!--pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+"-->
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
							<br/>
							<div class="form-group has-feedback">
								<input type="password" name="input-password" id="inputInput-Password" class="form-control" placeholder="Enter your password..." required="required" title="Enter your password...">
								<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-toggle='modal' href='#signinModal'>Sign in <span class="glyphicon glyphicon-chevron-right"></span></button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-hue">Log in</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="signinModal">
	<div class="modal-dialog">
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
					<h4 class="modal-title">Sign in</h4>
				</div>
				<form class="" onsubmit="#" action="" method="POST" role="form">
					<div class="modal-body">
						<div class="input-group-signin">
							<div class="form-group has-feedback">
								<input type="text" name="input-account" id="signin-Account" class="form-control" placeholder="Email..." required="required" pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$" title="Invalid email address">
								<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
							<br/>
							<div class="form-group has-feedback">
								<input type="text" name="input-account" id="signin-Username" class="form-control" placeholder="Name..." required="required" pattern="[0-9a-zA-Z_]+" title="Only 0-9, a-z, A-Z and _ are valid">
								<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
							<br/>
							<div class="form-group has-feedback">
								<input type="password" name="input-password" id="signin-Password" class="form-control" placeholder="Password..." required="required" pattern=".{6-20}" title="6 to 20 characters are allowed">
								<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
							<br/>
							<div class="form-group has-feedback">
								<input type="password" name="input-password" id="signin-Password-confirm" class="form-control" placeholder="Password again..." required="required" pattern=".{6-20}" title="6 to 20 characters are allowed">
								<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-toggle='modal' href='#loginModal'>Log in <span class="glyphicon glyphicon-chevron-right"></span></button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-hue">Sign in</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->