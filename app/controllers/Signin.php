<?php

class SignIn extends Controller{

    private $account;
    private $name;
    private $password_1;
    private $password_2;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $conn;

    public function index() {
        $this->account = $_POST["account"];
        $this->name = $_POST["name"];
        $this->password_1 = $_POST["password_1"];
        $this->password_2 = $_POST["password_2"];
        $this->connect();
        $err = $this->detectError();
        if ($err == 0) {
            $stmt = [];
            if (!($stmt = $this->conn->prepare("INSERT INTO gourylls.user (name,account,password) VALUES (?,?,?)"))) {
                echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
            }
            if (!$stmt->bind_param("sss", $this->name, $this->account, $this->password_2)) {
                echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            if (!$stmt->execute()) {
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            }
            $_SESSION["account"] = $this->account;
            echo "0";
        } else {
            echo $err;
        }
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    public function detectError() {
        if ($this->account === '') {
            return 1;
        } else if ($this->name === '') {
            return 2;
        } else if ($this->password_1 === '') {
            return 3;
        } else if ($this->password_2 === '') {
            return 3;
        } else if ($this->password_1 != $this->password_2) {
            return 3;
        }
        $sql = "select * from gourylls.user where account='" . $this->account . "';";
        if ($result = $this->conn->query($sql)) {
            if ($result->num_rows != 0) {
                return 1;
            }
        }
        return 0;
    }

}
