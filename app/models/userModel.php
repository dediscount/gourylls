<?php
class UserModel extends Model
{
    
    public $account;
    public function __construct() {
        parent::__construct();
        if(isset($_SESSION["account"]))
        {
            $this->account=$_SESSION["account"];
        }
        else {
            $this->account=NULL;
        }
    }
}

