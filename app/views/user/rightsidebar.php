<!--login navigator on right side-->
<div class="navbar  pull-right navbar-user">
	<!--display when not logined-->
	<a class="login">
		<i class="glyphicon glyphicon-user" data-toggle="modal" href="#loginModal"><span> Log in</span></i>
	</a>
	<!--display when logined-->
	<a class="logined">
		<img src="../user/userid/userid_icon.png" class="img-circle navbar-user-icon" title="Go to my page">
	</a>
</div>
<?php require_once('login.php'); ?>