<div id="photo-detail-block" >
    <div id="photo-detail">
        <div>
            <div class="photo-detail-title">
                <h1><?= $data['pic']['title'] ?></h1>
            </div>
            <?php
            if ($this->isCurrentUser($data['ID'])) {
                ?>
                <button type="button" data-toggle='modal' href='#delete-photo-dialog' class="btn btn-danger pull-right btn-delete">DELETE</button><?php
        }
            ?>
        </div>
        <div id="<?= $data['pic']['id'] ?>" class="photo-detail-photo" style="background-image:url('<?= $data['pic']['pic_path'] ?>')">	
        </div>
        <div class="photo-detail-footer">
            <span class="description"><?= $data['pic']['description'] ?></span>
            <span class="pull-right">1 day ago</span>
        </div>
        <div>

            <ul class="like-list">
                <li><span class="glyphicon glyphicon-heart found-photo-footer-heart-full"></span></li>

                <?php
                while ($result = $data['users']->fetch_assoc()) {
                    //echo $result['name'].$result['userID'];
                    ?>
                    <li><a href="<?php
                echo PATH . 'user/id/' . $result['userID'];
                    ?>"><?php
                           echo $result['name'];
                           ?></a></li>
                            <?php
                }
                ?>

            </ul>
        </div>
    </div>
</div>

