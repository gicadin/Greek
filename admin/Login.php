<?php

require_once "Database.php";

 $login = new Login();


echo var_dump(session_status() == PHP_SESSION_ACTIVE);

if ( session_status() == PHP_SESSION_ACTIVE)
  $login->redirect();
if ( session_status() == PHP_SESSION_NONE )
 $login->viewLoginForm();

if (isset($_POST["username"]) && isset($_POST["password"])){
  $login->authenticate();
} 

class Login {

  public function __construct(){

  }

  public function redirect(){
    header("Location: index.php"); 
  }

  public function viewLoginForm(){

    require_once "views/loginForm.html";

  }

  public function authenticate(){

    $db = new Database();
    $admin = $db->getAdmin($_POST['username']);

    if ( password_verify($_POST['password'], $admin["password"])){
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $this->redirect();
      }      
    }

  }

}