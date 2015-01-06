<?php
session_start();
$t = isset($_SESSION['account']);

if(isset($_SESSION["account"]))
{
    echo $_SESSION["account"];
}

