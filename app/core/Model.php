<?php


class Model {
    protected $conn;
    public function __construct($data=[]) {}
    protected function getConnection() {
        if($this->conn==null)
        {
            include 'Connection.php';
        }
        return $this->conn;        
    }    
}
