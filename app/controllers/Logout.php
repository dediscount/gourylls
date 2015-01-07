<?php

class Logout extends Controller {

    public function index() {
        unset($_SESSION["account"]);
        echo "<script>window.location =\"/gourylls/found\";</script>";
    }

}
