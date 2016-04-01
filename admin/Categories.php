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
        $this->addCategory();
        $this->viewCategories();
      break;

      case 'addView':
        $this->viewAddCategory();
      break;

      case 'edit':
        $this->editCategory($target);
        $this->viewCategories();
      break;

      case 'editView':
        $this->viewEditCategory($target);
      break;

      case 'delete':
        $this->deleteCategory($target);
        $this->viewCategories();
      break;
      
      case 'itemsView':
        $this->viewItems($target);
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
    include "views/categories.php";

  }
  
  private function deleteCategory($target) {

    $items = $this->db->viewItems($target);
    $count = count($items);
    
    for ($i = 0; $i < $count; $i++){
      $this->db->uncategorizeItem($items[$i][1]);
    }

    $this->db->deleteCategory($target);
  }

  private function addCategory(){

    $this->db->addCategory($_POST);
  }

  private function viewAddCategory(){

    include "views/categoryAddForm.html";
  }
  
  private function editCategory($target){

    $this->db->updateCategory($target, $_POST);
  }
  
  private function viewEditCategory($target){

    $category = $this->db->viewCategory($target);
    include "views/categoryEditForm.html";
  }
  
  private function viewItems($target){
    
    $items = $this->db->viewItems($target);
    include "views/categoryItems.php";
    
  }

}

?>
