<?php


class Order {

  private $db;

  public function __construct($action, $target = null) {
    
    $this->db = new Database();
    $this->controller($action, $target);

  }

  private function controller($action, $target = null){

    $this->viewOrderMenu();

    switch ($action){
      
      case 'checkout':
        $this->db->addOrder($_SESSION['username'], $_SESSION['order']);
      break;

      case 'viewCheckout':
        $_SESSION['order'] = $target;
        $this->viewCheckout();
      break;

      case 'view':
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

    include "views/checkout.html";
  }

}

?>

<script>

$(document).ready(function(){

  var order = {};
  var orderCounter = 1;

  $('.addOrderItemButton').click(function(){

    var sku = this.id.replace( /^\D+/g, '');
    var name = this.value;
    order[orderCounter] = sku;

    var checkoutListId = "checkoutListId" + orderCounter;

    $('#orderList').append("<tr>" +
      "<td>" + name + "<td>" +
      "<td><button class=removeOrderItemButton type=button id=" + checkoutListId + "> Remove </button> </td>" +
      "</tr>"
    );

    orderCounter++;

  });

  $('#orderList').on("click", ".removeOrderItemButton", function(){

    var id = "#" + this.id;
    var index = this.id.replace( /^\D+/g, '');

    delete order[index];

    $(id).parent().parent().remove();

  });

  $('#checkoutOrderButton').click(function(e){

    console.log(order);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Order",
        'action' : 'viewCheckout',
        'target' : order
      },
      success: function(response){
        console.log("checkout button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax add button error");
      }
    });

    e.preventDefault();
  });

  $('#checkoutConfirmButton').click(function(e){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Order",
        'action' : 'checkout'
      },
      success: function(response){
        console.log("checkout confirm button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax add button error");
      }
    });

    e.preventDefault();
  });


});


</script>
