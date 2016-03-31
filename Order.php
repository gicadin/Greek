<?php


class Order {

  private $db;

  public function __construct($action, $target = null) {
    
    $this->db = new Database();
    $this->controller($action, $target);

  }

  private function controller($action, $target = null){

    switch ($action){
      
      case 'checkout':
        $this->viewOrderMenu();
        $this->checkout();
        $this->viewItems();
      break;

      case 'viewCheckout':
        $this->addItemToCart($target);
        $this->viewCheckout();
      break;

      case 'view':
        $this->viewOrderMenu();
        $this->viewItems();

      break;

      case 'removeSessionItemFromCart':
        $this->removeItemFromCart($target);
      break;

      default:
        echo "Error - Class: Order  Function: controller";
    }
  }
  
  private function viewOrderMenu(){
    
    include "views/orderMenu.html";
  }
  
  private function viewItems(){
    
    $items = $this->db->viewItems();
    include "views/order.php";
  }

  private function viewCheckout(){

    include "views/checkout.html";
  }

  private function addItemToCart($target){

    if(isset($_SESSION['order'])){

      $count = count($target);

      for($i = 0; $i < $count; $i++){
        array_push($_SESSION['order'],array_values($target)[$i]);
      }
    } else {
      $_SESSION['order'] = $target;
    }
    
  }

  private function removeItemFromCart($target){

    foreach ($_SESSION['order'] as $key => $value ){
      if($value['shoppingID'] == $target){
        unset($_SESSION['order'][$key]);
      }
    }
  }

  private function checkout(){

    $this->db->addOrder($_SESSION['username'], $_SESSION['order']);
    unset($_SESSION['order']);
  }
}

?>

