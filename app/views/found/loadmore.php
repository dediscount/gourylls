<div id="photoid" class="found-photo-container"><!--iterate this container to display more photos-->
				<div class="found-photo-head">
					<h1 class="found-photo-title"><?=$data['title']?></h1>
					<a class="found-photo-user" href="#"><img src="<?=$data['p_iconPath']?>" class="img-circle found-photo-user-icon" title="username"></a>
				</div>
				<div class="found-photo-content" style="background-image:url('<?=$data['picPath']?>')">
				</div>
				<div class="found-photo-description">
					<p><?=$data['description']?></p>
				</div>
				<div class="found-photo-footer">
					<span class="found-photo-footer-heart" onclick="clickheart(this)">
						<span>Like</span> <!-- Default: like; change innerHTML into dislike when clicked-->
						<span name="like-empty" class="glyphicon glyphicon-heart found-photo-footer-heart-empty" style="display: inline-block"><!--1--></span><!--default; display when dislike-->
						<span name="like-full" class="glyphicon glyphicon-heart found-photo-footer-heart-full" style="display: none"></span><!--display when like-->
					</span>
					<span class="pull-right">
						<?=$data['date']?>
					</span>
				</div>
			</div><!-- /.found-photo-container-->