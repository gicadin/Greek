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
        if ( $this->checkSchedule() ){
          $this->addItemToCart($target);
          $this->viewCheckout();
        } else {
          $this->viewCheckoutFull();
        }

      break;

      case 'view':
        $this->viewOrderMenu();
        $this->viewItems();

      break;

      case 'removeSessionItemFromCart':
        $this->removeItemFromCart($target);
      break;

      case 'resetCart':
        $this->resetCart();
        $this->viewOrderMenu();
        $this->viewItems();
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

    include "views/orderCheckoutMenu.html";
    include "views/orderCheckout.php";
  }
  
  private function viewCheckoutFull(){
    
    include "views/orderCheckoutFull.html";
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

    $this->db->addOrder($_SESSION['username'], $_SESSION['order'], $_SESSION['totalPrice'], $_SESSION['date']);
    unset($_SESSION['order']);
  }

  private function resetCart(){
    unset($_SESSION['order']);
  }
  
  private function checkSchedule(){
    $orders = $this->db->countOrders();
    $maxOrders = 7;
    if ( $orders < $maxOrders )
      return true;
    else 
      return false;
  }
  
}

?>

