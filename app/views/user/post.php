
    <!--user's post photos-->
    <div id="user-post" class="user-post">
        <ul id="user-post-ul" class="user-post-ul">
<?php
$result = $data['pictures'];
while ($row = $result->fetch_assoc()) {
    ?>
            
            <li>
                <div id="<?=$row['id']?>" style="background-image:url('<?=$row['pic_path']?>')"></div><!--set the background-url dynamically-->
            </li>
    <?php
}
?>
        </ul>
    </div><!--/.user-post-->

