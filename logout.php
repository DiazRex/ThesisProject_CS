<?php
require 'conn.php';

session_start();
if(isset($_SESSION)){
    session_unset();
session_destroy();
header("Location: Login.php");
exit;
}