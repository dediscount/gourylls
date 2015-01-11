
	<div id="user-container" class="col-sm-7 col-sm-offset-4">
		<!--The navigation bar on the top-->
		<div id="user-nav" class="navbar-top navbar-user " style="margin:0;">
			<ul class="nav navbar-nav navbar-top-ul navbar-found-ul">
				<li class="navbar-found-active">
					<a href="#">POST</a><!--reload-->
				</li>
				<!-- Add more lists when necessary
				<li>
					<a href="#">Link</a>
				</li>
				-->
				<!--upload photo-->
				<div id="upload-photo-button" class="glyphicon glyphicon-plus pull-right navbar-found-upload-icon navbar-found-upload" data-toggle="modal" href="#uploadModal">
					
				</div>
			</ul>
		</div>
		<div class="user-content-container">
			<!--user's information-->
			<div class="user-info">
					<div id="user-info-icon-container">
						<form action="/gourylls/user/changeicon" method="POST" role="form" enctype="multipart/form-data">
							<div id="user-info-icon" class="user-info-icon img-circle">
                                                            <img id="user-info-icon-img" class="img-circle" src="<?=$data['iconPath']?>"/>
								<div id="upload-icon-container" class="form-group">	
									<input id="upload-icon" class="form-control" name="file" type="file" accept="image/*" /><!--get username from database-->
                                                                        <?php
                                                                        /*
                                                                        in a file input tag, the attribute name="file" is required, $_FILE variable cannot read any data without name="file"
                                                                         */?>
								</div>
							</div>
							<div  class="form-footer" id="user-info-icon-footer">
								<button type="button"  onclick="showEditForm('close')" class="btn btn-gray">Close</button>
								<button type="submit" class="btn btn-primary btn-hue">&nbspSave&nbsp</button>
							</div>
						</form>
					</div>
				
				<!--display when not editting-->
				<div id="user-info-name">
					<h2>
                                        <?php                                        
                                        if($data['name']=='')
                                        {
                                            echo "Default User";
                                        }
                                        else
                                        {
                                            echo $data['name'];
                                        }
                                        ?>
                                        
                                        </h2>
				</div>

				<!--change username-->
				<div id="user-info-change-name">
					<form onsubmit="return changeName()" method="POST" role="form">
						<div class="form-group has-feedback">
                                                    <input type="text" id="user_userName"class="form-control"  pattern=".{1,20}" required="required" placeholder="<?=$data['name']?>" title="User name must be 1 to 20 characters"><!--get username from database-->
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						</div>
						<div class="form-footer">
							<button type="button"  onclick="showEditForm('close')" class="btn btn-gray">Close</button>
							<button type="submit" class="btn btn-primary btn-hue">Submit</button>
						</div>
					</form>
					<button type="submit" onclick="showEditForm('changePW')" class="btn btn-edit-profile">Set My Password <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
				<!--change password-->
				<div id="user-info-change-pw">
                                    <form onsubmit="return changePassword()"method="POST" role="form">
						<div class="form-group has-feedback">
							<input type="password" id="user_oldPassword" class="form-control" required pattern=".{6,20}" placeholder="Old Password" title="The length of password should 6 to 20">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" id="user_newPassword_1" class="form-control" required pattern=".{6,20}" placeholder="New Password" title="The length of password should 6 to 20">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						</div>
						<div class="form-group has-feedback">
							<input type="password" id="user_newPassword_2" class="form-control" required pattern=".{6,20}" placeholder="New Password again" title="The length of password should 6 to 20">
							<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						</div>
						<div class="form-footer">
							<button type="button" onclick="showEditForm('close')" class="btn btn-gray">Close</button>
							<button type="submit" class="btn btn-primary btn-hue">Submit</button>
						</div>
					</form>
					<button type="submit" onclick="showEditForm('changeName')" class="btn btn-edit-profile">Set My Name <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>

				<div id="user-info-edit-a"><!--display only when username matches-->
                                    <?php
                                    if($this->isLoggedIn())
                                    {
                                    ?>
					<a href="#" onclick="showEditForm('changeName')">edit my profile</a>
                                        <?php
                                    }
                                        ?>
				</div>

				<div class="user-info-stats">
					<ul class="user-info-stats-ul">
						<li>
							<i>0</i><!--get the number of likes here-->
							<span>likes |</span>
						</li>
						<li>
							<i>0</i><!--get the number of posts here-->
							<span>post</span>
						</li>
					</ul>
				</div>
			</div><!--/.user-info-->

			<?php //require_once('post.php') ?>
			<div id="photo_id" >
				<div id="photo-detail">
					<div>
						<div class="photo-detail-title">
							<h1>Title</h1>
						</div>
						<button type="button" data-toggle='modal' href='#delete-photo-dialog' class="btn btn-danger pull-right btn-delete">DELETE</button>
					</div>
					<div class="photo-detail-photo" style="background-image:url('/gourylls/public/user/userid/photos/korean.jpg')">	
					</div>
					<div class="photo-detail-footer">
						<span class="description">Description</span>
						<span class="pull-right">1 day ago</span>
					</div>
					<div>
						
						<ul class="like-list">
							<li><span class="glyphicon glyphicon-heart found-photo-footer-heart-full"></span></li>
							<li><a href="#">user1</a></li>
							<li><a href="#">user2</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="modal fade" id="delete-photo-dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="padding-bottom:0">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title alert">Warning</h3>
						</div>
						<div class="modal-body">
							<p>Do you want to delete this photo?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" onclick="deletePhoto()" class="btn btn-danger">DELETE</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
		</div><!--/.user-content-container-->
	</div><!--/.user-container-->
