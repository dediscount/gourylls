<!--login navigator on right side-->
<div class="navbar  pull-right navbar-login">
    <?php
    if (isset($_SESSION["account"])) {
        ?>
    <!--display when logined-->
	    <div class="dropdown">
	        <a id="dropdownMenu1" class="logined dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=$data['iconPath']?>" class="img-circle navbar-user-icon" title="Go to my page">
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
				<li role="presentation">
					<a href="/gourylls/user" role="menuitem" tabindex="-1">My Page</a>
				</li>
				<li>
					<a href="/gourylls/logout" role="menuitem" tabindex="-1">Log out</a>
				</li>
			</ul>
	    </div>
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
