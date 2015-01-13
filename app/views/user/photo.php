			<div id="photo-detail-block" >
				<div id="photo-detail">
					<div>
						<div class="photo-detail-title">
							<h1><?=$data['title']?></h1>
						</div>
						<button type="button" data-toggle='modal' href='#delete-photo-dialog' class="btn btn-danger pull-right btn-delete">DELETE</button>
					</div>
					<div id="<?=$data['id']?>" class="photo-detail-photo" style="background-image:url('<?=$data['pic_path']?>')">	
					</div>
					<div class="photo-detail-footer">
						<span class="description"><?=$data['description']?></span>
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

			