<?php


class Items {

  private $db;

  public function __construct() {
    $this->db = new Database();

    // $this->viewItemsMenu();
    // $this->viewItems();
  }

  public function controller($action, $target = NULL){



    switch ($action){
      case 'add':
        $this->viewItemsMenu();
        $this->addItem();
        $this->viewItems();
      break;

      case 'addView':
        $this->viewItemsFormMenu();
        $this->viewAddItem();
      break;
      
      case 'edit':
        $this->viewItemsMenu();
        $this->editItem($target);
        $this->viewItems();
      break;

      case 'editView':
        $this->viewItemsFormMenu();
        $this->viewEditItem($target);
      break;
      
      case 'delete':
        $this->viewItemsMenu();
        $this->db->deleteItem($target);
        $this->viewItems();
      break;
      
      case 'view':
        $this->viewItemsMenu();
        $this->viewItems();
      break;

      default:
        echo "Error - Class: Items  Function: controller";
    }

  }

  private function viewItems(){
    
    $items = $this->db->viewItems();
    include "views/items.php";
    
  }

  private function viewItemsMenu(){

    include "views/itemsMenu.html";
  }
  
  private function viewItemsFormMenu(){

    include "views/itemsFormMenu.html";
    
  }

  private function viewAddItem(){

    $categories = $this->db->viewCategories();
    include "views/itemAddForm.html";
  }

  private function viewEditItem($target){

    $item = $this->db->viewItem($target);
    $categories = $this->db->viewCategories();
    include "views/itemEditForm.html";
  }

  private function addItem(){

    $this->db->addItem($_POST);
  }

  private function editItem($target){
    $this->db->updateItem($target, $_POST);
  }

}

?>
