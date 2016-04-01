<?php


class Items {

  private $db;

  public function __construct() {
    $this->db = new Database();

    // $this->viewItemsMenu();
    // $this->viewItems();
  }

  public function controller($action, $target = NULL){

    $this->viewItemsMenu();

    switch ($action){
      case 'add':
        $this->addItem();
        $this->viewItems();
      break;

      case 'addView':
        $this->viewAddItem();
      break;
      
      case 'edit':
        $this->editItem($target);
        $this->viewItems();
      break;

      case 'editView':
        $this->viewEditItem($target);
      break;
      
      case 'delete':
        $this->db->deleteItem($target);
        $this->viewItems();
      break;
      
      case 'view':
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
