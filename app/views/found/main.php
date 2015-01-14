<div id="found-content" class="col-sm-7 col-sm-offset-4 found-expanded">
    <!--The navigation bar on the top-->
    <div id="found-content-nav" class="navbar-top navbar-found " style="margin:0;">
        <ul class="nav navbar-nav navbar-top-ul navbar-found-ul">
            <li class="navbar-found-active">
                <a href="/gourylls/found">New</a><!--reload-->
            </li>
            <!-- Add more lists when necessary
            <li>
                    <a href="#">Link</a>
            </li>
            -->
            <!--upload photo-->
            <div id="upload-photo-button" class="glyphicon glyphicon-plus pull-right navbar-found-upload-icon navbar-found-upload" data-toggle="modal" href="#<?php
            if ($this->isLoggedIn()) {
                echo 'uploadModal';
            } else {
                echo 'loginModal';
            }
            ?>">

            </div>
        </ul>
    </div>
    <!--
    The main part to display photos
    -->
    <div class="found-photo"><!--found-photo module, display photos here-->
        <script type="text/javascript">$(document).scroll(checkload);</script>
        <div id="loadmore" class="found-photo-load">
            <span class="loadmore">End</span>
        </div>
    </div><!-- /.found-photo -->
</div>

