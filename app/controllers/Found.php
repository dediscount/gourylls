<?php

class Found extends Controller {

    public function index() {//index function !!!!!!
        $user = $this->model('User');
        $this->view('found/index', ['account' => $user->account, 'iconPath' => $user->iconPath]);
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
                $user->movePicture($tempName,$name);
                
                
                //echo $type;
                //$this->moveFile($_FILES["file"]["tmp_name"], 'icon.' . $type, UPLOAD_PATH . $user->account);
                //$user->changeIconPath(ICON_PATH . $user->account . '/icon.' . $type);
                //echo "<script>window.location =\"/gourylls/user\";</script>";
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
