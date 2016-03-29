<?php

require_once 'Database.php';
require_once "Login.php";

$db = new Database();

if (isset($_POST['username']) && isset($_POST['password'])){

  $user = $db->getUser($_POST['username']);

  if ( password_verify($_POST['password'], $user["password"])){

    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['type'] = 'user';
    header("Location: index.php");
  }else {
    $user = new Login();
  }
}