<div id="<?= $data['pic']['ID'] ?>" class="found-photo-container"><!--iterate this container to display more photos-->
    <div class="found-photo-head">
        <h1 class="found-photo-title"><?= $data['pic']['title'] ?></h1>
        <a class="found-photo-user" href="/gourylls/user/id/<?= $data['pic']['userID'] ?>"><img src="<?php
            $iconPath = ICON_PNG;
            if ($data['pic']['icon_path'] != '') {
                $iconPath = $data['pic']['icon_path'];
            }
            echo $iconPath;
            ?>" class="img-circle found-photo-user-icon" title="<?= $data['pic']['name'] ?>"></a>
    </div>
    <div class="found-photo-content" style="background-image:url('<?= $data['pic']['pic_path'] ?>')">
    </div>
    <div class="found-photo-description">
        <p><?= $data['pic']['description'] ?></p>
    </div>
    <div class="found-photo-footer">
        <span class="found-photo-footer-heart" onclick="clickheart(this)">
            <span>Like</span> <!-- Default: like; change innerHTML into dislike when clicked-->
            <?php
            if ($data['liked']) {
                ?>
                <span name="like-empty" class="glyphicon glyphicon-heart found-photo-footer-heart-empty" style="display:none"></span>
                <span name="like-full" class="glyphicon glyphicon-heart found-photo-footer-heart-full" style="display:inline-block"></span><!--display when like-->

                <?php
            } else {
                ?>
                <span name="like-empty" class="glyphicon glyphicon-heart found-photo-footer-heart-empty" style="display: inline-block"></span><!--default; display when dislike-->
                <span name="like-full" class="glyphicon glyphicon-heart found-photo-footer-heart-full" style="display: none"></span><!--display when like-->                
                <?php
            }
            ?>
        </span>
        <span class="pull-right">
            <?= $data['pic']['uploadingDate'] ?>
        </span>
    </div>
</div><!-- /.found-photo-container-->