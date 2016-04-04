<?php

class Login {
  
  public function __construct(){

    $this->includeBootstrapCSS();
    $this->viewLoginForm();
  }

  private function viewLoginForm(){

    require_once "views/loginForm.html";
  }

  private function includeBootstrapCSS(){

    include_once __DIR__ . "/../Libraries.php";
  }


}



