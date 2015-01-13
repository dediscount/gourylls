<?php

class Found extends Controller {

    public function index() {//index function !!!!!!
        $user = $this->model('User');
        $pics = $this->model("Picture");
        $pic = $pics->getPictureByRow(0);
        $this->view('found/index', ['account' => $user->account, 'iconPath' => $user->iconPath, 'title' => $pic['title'],'picID'=>$pic['ID'] ,'picPath' => $pic['pic_path'], 'description' => $pic['description'], 'p_iconPath' => $pic['icon_path'], 'date' => $pic['uploadingDate']]);
    }

    public function loadMore() {
        if (isset($_POST['num'])) {
            $pics = $this->model("Picture");
            $pic = $pics->getPictureByRow($_POST['num']);
            $this->view('found/loadmore', ['title' => $pic['title'], 'picPath' => $pic['pic_path'], 'description' => $pic['description'], 'p_iconPath' => $pic['icon_path'], 'date' => $pic['uploadingDate']]);
        }
    }

    public function addPicture() {
        if ($_FILES["picture"]["error"] > 0) {
            echo "Error: " . $_FILES["picture"]["error"] . "<br />";
        } else if (isset($_FILES["picture"]["name"])) {
            if ($this->isLoggedIn()) {
                $user = $this->model('User');
                $pic = $this->model('Picture');

                $date = date_create();
                $name = date_timestamp_get($date) . $_FILES["picture"]["name"];
                $type = substr($_FILES["picture"]["name"], strrpos($_FILES["picture"]["name"], '.') + 1);
                $size = $_FILES["picture"]["size"] / 1024;
                $tempName = $_FILES['picture']['tmp_name'];
                $title = $_POST['pic_title'];
                $description = $_POST['pic_desc'];
                $picPath = $user->getPicturePath() . $name;
                $userID = $user->ID;

                $user->movePicture($tempName, $name);
                $pic->addPicture($userID, $picPath, $title, $type, $size, $description);
                echo "<script>window.location =\"/gourylls/found\";</script>";
            }
        }
    }

}
