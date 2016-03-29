<?php

class Login {
  
  public function __construct(){
    
    $this->viewLoginForm();
  }

  private function viewLoginForm(){

    require_once "views/loginForm.html";
  }

}



