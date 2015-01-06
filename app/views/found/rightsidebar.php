<!--login navigator on right side-->
<div class="navbar  pull-right navbar-login">
    <?php
    if (isset($_SESSION["account"])) {
        
        ?>
    <!--display when logined-->
        <a class="logined">
            <img src="/gourylls/public/user/userid/userid_icon.png" class="img-circle navbar-user-icon" title="Go to my page">
        </a>
        
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
