<?php

class UserModel extends Model {

    public $account;
    public $ID;
    public $name;
    public $iconPath = "default";

    public function __construct($data = []) {
        $this->initConnection();
        //var_dump($this->conn);
        if (isset($_SESSION["account"])) {
            $this->account = $_SESSION["account"];
            $sql = "select name,id,icon_path from gourylls.user where account='" . $this->account . "';";
            if ($result = $this->conn->query($sql)) {
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

    public function changeName($account, $name) {
        if ($this->name === $name || $this->account != $account || strlen($name) < 6) {
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

}
