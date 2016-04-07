<?php

class Menu {

  private $db;

  public function __construct($action, $target = null) {

    $this->db = new Database();
    $this->view();


  }

  private function controller($action, $target = null) {

    switch ($action) {

      case 'view':
        $this->view();
        break;

      default:
        echo "Error - Class: Order  Function: controller";
    }
  }

  private function view(){

    $items = $this->db->viewItems();
    include "views/menu.php";
  }

}