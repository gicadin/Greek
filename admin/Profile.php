<?php

class Profile {

  private $db;

  public function __construct() {

    $this->db = new Database();

  }
  
  public function controller($action, $target = NULL){

    switch ($action){

      case 'edit':
        $this->edit();
      break;

      case 'view':
        $this->viewProfile();
      break;

      default:
        echo "Error - Class: Profile  Function: controller";
    }

  }
  
  private function viewProfile(){

    $profile = $this->db->getAdmin($_SESSION['username']);
    include "views/profile.php";
  }

  private function edit(){

      $this->db->editAdmin($_SESSION['username'], $_POST);
  }

}