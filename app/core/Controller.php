<?php
class Controller {
    
    public function index(){}
    public function model($model,$data=[]) {
        
        $model = $model . "Model";
        require_once '/../models/' . $model . '.php';
        return new $model($data);
    }
    
    public function view($view, $data = []) {
        include '/../views/' . $view . '.php';
    }
    protected function isLoggedIn()
    {
        if(isset($_SESSION["account"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}