<!--login navigator on right side-->
<div class="navbar  pull-right navbar-login">
    <?php
    if (isset($_SESSION["account"])) {
        
        ?>
    <!--display when logined-->
        <a class="logined dropdown-toggle" data-toggle="dropdown">
			<img src="../user/userid/userid_icon.png" class="img-circle navbar-user-icon" title="Go to my page">
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu" role="menu">
			<li>
				<a href="#">My Page</a>
			</li>
			<li>
				<a href="#">Log out</a>
			</li>
		</ul>
        
        <?php
    } else {
        ?>
        <!--display when not logined-->
        <a class="login">
            <i class="glyphicon glyphicon-user" data-toggle="modal" href="#loginModal"><span> Log in</span></i>
        </a>
    <?php
}
?>

</div>
