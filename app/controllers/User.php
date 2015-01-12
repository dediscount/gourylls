<?php

class User extends Controller {
    public $user;
    public function __construct() {
        $this->user=  $this->model("User");
    }
    public function index() {//index function !!!!!!
        $user = $this->user;
        $this->view('user/index', ['name' => $user->name,'iconPath'=>$user->iconPath]);
    }

    public function changeName() {
        if ($this->isLoggedIn()) {
            $user = $this->user;
            if ($user->changeName($_SESSION['account'], $_POST['name'])) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }

    public function changePassword() {
        if ($this->isLoggedIn()) {
            $user = $this->user;
            if (strlen($_POST['oldPassword']) < 6) {
                echo "1";
            } else if ($_POST['password_1'] != $_POST['password_2']) {
                echo "2";
            } elseif (strlen($_POST['password_1']) < 6) {
                echo "2";
            } else {
                echo($user->changePassword($_SESSION['account'], $_POST['oldPassword'], $_POST['password_1']));
            }
        }
    }
    
    public function addPicture() {
        if ($_FILES["picture"]["error"] > 0) {
            echo "Error: " . $_FILES["picture"]["error"] . "<br />";
        } else if (isset($_FILES["picture"]["name"])) {            
            if ($this->isLoggedIn()) {
                $user = $this->model('User');
                $pic=  $this->model('Picture');
                
                $date=date_create();
                $name = date_timestamp_get($date).$_FILES["picture"]["name"];
                $type = substr($_FILES["picture"]["name"], strrpos($_FILES["picture"]["name"], '.') + 1);
                $size = $_FILES["picture"]["size"]/1024;
                $tempName = $_FILES['picture']['tmp_name'];
                $title=$_POST['pic_title'];
                $description=$_POST['pic_desc'];
                $picPath=$user->getPicturePath().$name;
                $userID = $user->ID;
                
                $user->movePicture($tempName,$name);
                $pic->addPicture($userID,$picPath,$title,$type,$size,$description);
                echo "<script>window.location =\"/gourylls/user\";</script>";
            }
        }
    }

    public function changeIcon() {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else if (isset($_FILES["file"]["name"])) {
            if($this->isLoggedIn())
            {
                $user = $this->user;
                $type = substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],'.')+1);
                $user->moveIcon($_FILES["file"]["tmp_name"],$type);
                echo "<script>window.location =\"/gourylls/user\";</script>";
            }

        }
    }
}
