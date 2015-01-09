<?php


class Model {
    protected $conn;
    public function __construct($data=[]) {}
    protected function initConnection() {
        include 'Connection.php';
    }
    
}
