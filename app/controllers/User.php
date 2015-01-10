<?php

class User extends Controller {
    public function index() {//index function !!!!!!
        $user = $this->model('User');
        $this->view('user/index', ['name' => $user->name,'iconPath'=>$user->iconPath]);

    }

    public function changeName() {
        if ($this->isLoggedIn()) {
            $user = $this->model('User');
            if ($user->changeName($_SESSION['account'], $_POST['name'])) {
                echo "0";
            } else {
                echo "1";
            }
        }
    }

    public function changePassword() {
        if ($this->isLoggedIn()) {
            $user = $this->model('User');
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

    public function changeIcon() {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
        } else if (isset($_FILES["file"]["name"])) {
            if($this->isLoggedIn())
            {
                $user = $this->model('User');
                $type = substr($_FILES["file"]["name"],strrpos($_FILES["file"]["name"],'.')+1);
                //echo $type;
                $this->moveFile($_FILES["file"]["tmp_name"],'icon.'.$type,UPLOAD_PATH.$user->account);
                $user->changeIconPath(ICON_PATH.$user->account.'/icon.'.$type);
                echo "<script>window.location =\"/gourylls/user\";</script>";
            }

        }
    }
    
    private function moveFile($tempName, $fileName, $location)
    {
        //echo $location;
        $this->newDirectory($location);
        move_uploaded_file($tempName, $location.'/'.$fileName);
    }
    private function newDirectory($location)
    {
        if(!file_exists($location))
        {
            mkdir($location);
        }
    }
}
