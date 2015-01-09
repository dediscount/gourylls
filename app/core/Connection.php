<?php

$servername = "localhost";
$username = "root";
$password = "";

$this->conn = new mysqli($servername, $username, $password);

if ($this->conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}