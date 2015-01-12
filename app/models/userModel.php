<?php

class UserModel extends Model {

    public $account;
    public $ID;
    public $name;
    public $iconPath = ICON_PNG;

    public function __construct($data = []) {
        $conn = $this->getConnection();
        //var_dump($this->conn);
        if (isset($_SESSION["account"])) {
            $this->account = $_SESSION["account"];
            $sql = "select name,id,icon_path from gourylls.user where account='" . $this->account . "';";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows === 0) {
                    die("Database error.");
                } else {
                    while ($row = $result->fetch_assoc()) {
                        //echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
                        $this->ID = $row['id'];
                        $this->name = $row['name'];
                        if ($row['icon_path'] != '') {
                            $this->iconPath = $row['icon_path'];
                        }
                    }
                }
            } else {
                $this->account = NULL;
            }
        }
    }
    
    public function getPicturePath()
    {
        return $this->getUserPath().'pictures/';
    }

    public function changeName($account, $name) {
        if ($this->name === $name || $this->account != $account || strlen($name) < 1) {
            return false;
        } else {
            $sql = "update gourylls.user set name='" . $name . "' where account='" . $this->account . "';";
            if ($this->conn->query($sql)) {
                $this->name = $name;
                return true;
            } else {
                return false;
            }
        }
    }

    public function changePassword($account, $oldPassword, $newPassword) {
        if ($this->account != $account) {
            return '3';
        } else {
            $sql = "select * from gourylls.user where account='" . $account . "' and password='" . $oldPassword . "';";

            if ($result = $this->conn->query($sql)) {
                if ($result->num_rows <= 0) {
                    return "1";
                } else if (($result->num_rows > 1)) {
                    return "3";
                } else {
                    $sql = "update gourylls.user set password='" . $newPassword . "' where account='" . $this->account . "';";
                    if ($this->conn->query($sql)) {
                        return "0";
                    } else {
                        return "3";
                    }
                }
            }
        }
    }
    
    public function movePicture($tempName, $pictureName) {
        $this->moveFile($tempName, $pictureName, $this->getPictureMapping());
    }

    public function moveIcon($tempName, $type) {
        $iconName = 'icon.' . $type;
        $this->moveFile($tempName, $iconName, $this->getUserMapping());
        $this->changeIconPath($iconName);
        /* if ($_FILES["file"]["error"] > 0) {
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

          } */
    }

    private function getUserMapping() {
        return UPLOAD_MAPPING . $this->ID . '/';
    }

    public function getUserPath() {
        return UPLOAD_PATH . $this->ID . '/';
    }

    private function moveFile($tempName, $fileName, $location) {
        $this->mkUserMapping();
        move_uploaded_file($tempName, $location . '/' . $fileName);
    }
    
    private function mkUserMapping()
    {
        $this->newDirectory($this->getUserMapping());
        $this->newDirectory($this->getUserMapping().'/pictures');
    }
    
    private function getPictureMapping()
    {
        return $this->getUserMapping().'/pictures';
    }

    private function newDirectory($location) {
//        if(mkdir($location))
//        {
//            return;
//        }else
//        {
//            $location=strrpos($location,'/');
//        }        
        if (!file_exists($location)) {
            mkdir($location);
        }
    }

    private function changeIconPath($iconName) {
        $conn = $this->getConnection();
        $sql = "update gourylls.user set icon_path='" . $this->getUserPath() . $iconName . "' where id='" . $this->ID . "';";
        $conn->query($sql);
    }

}
