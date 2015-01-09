<?php

class Login extends Controller {

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public function index() {//index function !!!!!!
        
        $conn = new mysqli($this->servername, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo $_POST["account"] . "<br/>";
        //echo $_POST["password"];
        $account = $_POST["account"];
        $password = $_POST["password"];

        $sql = "select * from gourylls.user where account='" . $account . "' and password='" . $password . "';";

        if ($result = $conn->query($sql)) {
            if ($result->num_rows === 0) {
                echo "1";
            } else {
                $_SESSION["account"] = $account;
                echo "0";
            }
        }

//                echo "You are logged in.";                
//                //setcookie(session_name(), $account, time() + 24 * 3600, "/");
//                $_SESSION["account"] = $account;
//                for ($i = 0; $i < ($result->num_rows); $i++) {
//                    $result->data_seek($i);
//                    $row = $result->fetch_assoc();
//                    foreach ($row as $x => $x_value) {
//                        echo "Key=" . $x . ", Value=" . $x_value;
//                        echo "<br>";
//                    }
//                    echo "<br>";
//                }
//            }
//        }
//        if (isset($_SESSION["account"])) {
//            echo "hehe";
//        }
        //echo "<script>window.location =\"/gourylls/found\";</script>";
//        for ($i = 0; $i < ($result->num_rows); $i++) {
//            $result->data_seek($i);
//            $row = $result->fetch_assoc();
//            foreach ($row as $x => $x_value) {
//                echo "Key=" . $x . ", Value=" . $x_value;
//                echo "<br>";
//            }
//            echo "<br>";
//        }

        /* $user=$this->model('User');
          $this->view('home/index'); */


        //$user->name=$firstName.' '.$lastName;
        //echo $user->name;
        //$this->view('home/index',['name'=>$user->name]);
    }

}
