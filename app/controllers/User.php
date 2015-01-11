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
        echo 'hehe';
        if ($_FILES["picture"]["error"] > 0) {
            echo '2';
            echo "Error: " . $_FILES["picture"]["error"] . "<br />";
        } else if (isset($_FILES["picture"]["name"])) {
            
            if ($this->isLoggedIn()) {
                
                $user = $this->model('User');
                $date=date_create();
                $name = date_timestamp_get($date).$_FILES["picture"]["name"];
                $type = substr($_FILES["picture"]["name"], strrpos($_FILES["picture"]["name"], '.') + 1);
                $size = $_FILES["picture"]["size"]/1024;
                $tempName = $_FILES['picture']['tmp_name'];
                $title=$_POST['pic_title'];
                $description=$_POST['pic_desc'];
                $picPath=$user->getRootDir().'/pictures/'.$name;
                $userID = $user->ID;
                $pic=  $this->model('Picture');
                $pic->addPicture($userID,$picPath,$title,$type,$size,$description);
                $this->movePicture($tempName,$name);
                
                
                
                //echo $type;
                //$this->moveFile($_FILES["file"]["tmp_name"], 'icon.' . $type, UPLOAD_PATH . $user->account);
                //$user->changeIconPath(ICON_PATH . $user->account . '/icon.' . $type);
                //echo "<script>window.location =\"/gourylls/user\";</script>";
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
                //echo $type;
                $this->moveFile($_FILES["file"]["tmp_name"],'icon.'.$type,UPLOAD_PATH.$user->account);
                $user->changeIconPath(ICON_PATH.$user->account.'/icon.'.$type);
                echo "<script>window.location =\"/gourylls/user\";</script>";
            }

        }
    }
    
    public function movePicture($tempName,$fileName)
    {
        $location=$this->newPictureDirectory();
        $date=date_create();
        $this->moveFile($tempName,date_timestamp_get($date).$fileName, $location);
    }
    public function getPictureDirectory()
    {
        $this->getRootDirectory().'/pictures';
    }
    
    private function newPictureDirectory()
    {
        $root=$this->getRootDirectory();
        if(!file_exists($root))
        {
            $this->newDirectory($root);
            $this->newDirectory($root.'/pictures');
        }
        else if(!file_exists ($root.'/pictures'))
        {
            $this->newDirectory($root.'/pictures');
        }
        return $root.'/pictures';
    }
    private function getRootDirectory()
    {
        return UPLOAD_PATH.$this->user->account;
    }
    
    private function moveFile($tempName, $fileName, $location)
    {
        //echo $location;
        $this->newDirectory($location);
        move_uploaded_file($tempName, $location.'/'.$fileName);
    }
    private function newDirectory($location)
    {
//        if(mkdir($location))
//        {
//            return;
//        }else
//        {
//            $location=strrpos($location,'/');
//        }
//        
        
        if(!file_exists($location))
        {
            mkdir($location);
        }
    }
}
