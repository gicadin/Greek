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

<!-- JavaScript Functions Below -->

<script>

$(document).ready(function(){

  $('#admin_deleteItemButton').click(function(){

    var checkedValue = $('.checkbox:checked').val();
    console.log(checkedValue);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Items",
        'action' : "delete",
        'target' : checkedValue
      },
      success: function(response){
        console.log("Delete button pressed for sku#: " + checkedValue);
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax delete not good up");
      }
    });
  });

  $('#admin_addItemButton').click(function(){
    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Items",
        'action' : 'addView'
      },
      success: function(response){
        console.log("Add Item button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax add button error");
      }
    });
  });
  
  $('#admin_editItemButton').click(function(){

    var checkedValue = $('.checkbox:checked').val();
    console.log(checkedValue);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Items",
        'action' : 'editView',
        'target' : checkedValue
      },
      success: function(response){
        console.log("Edit button pressed for sku#: " + checkedValue);
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax add button error");  
      }
    });
  });

  $('#admin_addItemFormButton').click(function(e){

    var data = $('#itemForm').serializeArray();
    data.push({'name' : "class", 'value' : 'Items' });
    data.push({'name' : "action", 'value' : 'add'});

    console.log(data);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: data,
      success: function(response){
        console.log("Add Item button pressed");
        $("#content").html(response);
      },
      error: function(xhr, status, error) {
        alert("Add Item button error " );
      }
    });

    e.preventDefault();

  });

  $('#admin_editItemFormButton').click(function(e){

    var sku = $("#current-sku").html();

    var data = $('#itemForm').serializeArray();
    data.push({'name' : "class", 'value' : 'Items' });
    data.push({'name' : "action", 'value' : 'edit'}); 
    data.push({'name' : "target", 'value' : sku});

    console.log(data);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: data,
      success: function(response){
        console.log("Edit Item button pressed");
        $("#content").html(response);
      },
      error: function(xhr, status, error) {        
        alert("Edit Item button error " );
      }
    });

    e.preventDefault(); 

  });

//  $("#itemForm").submit(function(){
//
//    var formData = new FormData($(this)[0]);
//
//    $.ajax({
//      url: "index.php",
//      type: "POST",
//      data: formData,
//      async: false,
//      success: function(data){
//        alert(data);
//      },
//      cache: false,
//      contentType: false,
//      processData: false
//    });
//
//    return false;
//  });

});

</script>