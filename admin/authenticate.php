<?php

require_once __DIR__ . '/../Database.php';
require_once "Login.php";

$db = new Database();

if (isset($_POST['username']) && isset($_POST['password'])){

  $admin = $db->getAdmin($_POST['username']);

  if ( password_verify($_POST['password'], $admin["password"])){
    
    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['type'] = 'admin';
    header("Location: index.php");
  }else {
    $user = new Login();
  }
}


