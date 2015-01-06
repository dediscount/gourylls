
	<div id="found-content" class="col-sm-7 col-sm-offset-4 found-expanded">
		<!--The navigation bar on the top-->
		<div id="found-content-nav" class="navbar-top navbar-found " style="margin:0;">
			<ul class="nav navbar-nav navbar-top-ul navbar-found-ul">
				<li class="navbar-found-active">
					<a href="#">New</a><!--reload-->
				</li>
				<!-- Add more lists when necessary
				<li>
					<a href="#">Link</a>
				</li>
				-->
				<!--upload photo-->
				<div class="glyphicon glyphicon-plus pull-right navbar-found-upload-icon navbar-found-upload">
					<input id="upload-file" type="file" class="input-hidden-upload" accept="image/*">
				</div>
			</ul>
		</div>
		<!--
		The main part to display photos
		-->
		<div class="found-photo"><!--found-photo module, display photos here-->
		<script type="text/javascript">$(document).scroll(checkload);</script>
			<div id="photoid" class="found-photo-container"><!--iterate this container to display more photos-->
				<div class="found-photo-head">
					<h1 class="found-photo-title">Title</h1>
					<a class="found-photo-user" href="#"><img src="/gourylls/public/user/userid/userid_icon.png" class="img-circle found-photo-user-icon" title="username"></a>
				</div>
				<div class="found-photo-content" style="background-image:url('/gourylls/public/user/userid/photos/korean.jpg')">
				</div>
				<div class="found-photo-description">
					<p>description here!</p>
				</div>
				<div class="found-photo-footer">
					<span class="found-photo-footer-heart" onclick="clickheart(this)">
						<span>Like</span> <!-- Default: like; change innerHTML into dislike when clicked-->
						<span name="like-empty" class="glyphicon glyphicon-heart found-photo-footer-heart-empty" style="display: inline-block"></span><!--default; display when dislike-->
						<span name="like-full" class="glyphicon glyphicon-heart found-photo-footer-heart-full" style="display: none"></span><!--display when like-->
					</span>
					<span class="pull-right">
						1 day ago
					</span>
				</div>
			</div><!-- /.found-photo-container-->
			
			<div id="photoid" class="found-photo-container"><!--iterate this container to display more photos-->
				<div class="found-photo-head">
					<h1 class="found-photo-title">Title</h1>
					<a class="found-photo-user" href="#"><img src="/gourylls/public/user/userid/userid_icon.png" class="img-circle found-photo-user-icon" title="username"></a>
				</div>
				<div class="found-photo-content" style="background-image:url('/gourylls/public/user/userid/photos/korean.jpg')">
				</div>
				<div class="found-photo-description">
					<p>description here!</p>
				</div>
				<div class="found-photo-footer">
					<span class="found-photo-footer-heart" onclick="clickheart(this)">
						<span>Like</span> <!-- Default: like; change innerHTML into dislike when clicked-->
						<span name="like-empty" class="glyphicon glyphicon-heart found-photo-footer-heart-empty" style="display: inline-block"></span><!--default; display when dislike-->
						<span name="like-full" class="glyphicon glyphicon-heart found-photo-footer-heart-full" style="display: none"></span><!--display when like-->
					</span>
					<span class="pull-right">
						1 day ago
					</span>
				</div>
			</div><!-- /.found-photo-container-->
			

			<div id="loadmore" class="found-photo-load">
				<span class="loadmore">Loading more...</span>
			</div>
		</div><!-- /.found-photo -->
	</div>

