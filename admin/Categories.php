<?php

class Categories {

  private $db;

  public function __construct(){

    $this->db = new Database();
  }
  
  public function controller($action, $target = null) {
    
    // Display Category Menu
    $this->viewCategoriesMenu();

    switch ($action) {
      case 'add':

      break;

      case 'addView':

      break;

      case 'edit':
      break;

      case 'editView':
      break;

      case 'delete':
      break;

      case 'view':
        $this->viewCategories();
      break;

      default:
        echo "Error - Class: Categories  Function: controller";

    }
    
  }

  private function viewCategoriesMenu(){

    include "views/categoriesMenu.html";
  }

  private function viewCategories(){

    $categories = $this->db->viewCategories();
    include "views/categories.html";

  }

}