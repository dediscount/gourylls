<?php

class User extends Controller {

    public function index() {//index function !!!!!!
        $user = $this->model('User');
        $this->view('user/index', ['name' => $user->name]);
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
            }elseif (strlen ($_POST['password_1'])<6) {
                echo "2";
            } else{
                echo($user->changePassword($_SESSION['account'], $_POST['oldPassword'],$_POST['password_1']));
            }
        }
    }
}
