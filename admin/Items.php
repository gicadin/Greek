<?php

require_once __DIR__ . '/../Libraries.php'; 
require_once "Database.php";

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

  public function viewItems(){
    
    $items = $this->db->viewItems();

    echo "<table>";

    // Table Column names
    $columnNames = $this->db->getColumnNames("items");
    $count = count($columnNames); 
    echo "<tr><th></th>";
    for ($i = 1; $i < $count; $i++){
      echo "<th>";
      echo $columnNames[$i]; 
      echo "</th>";

    }
    echo "</tr>";

    // Item information
    $count = count($items); 
    for ($i = 0; $i < $count; $i++){
      echo "<tr>";

      // Checkbox
      $tmpSku = $items[$i][1];
      echo "<td>";
      echo "<input class=checkbox type=checkbox value=$tmpSku>";
      echo "</td>";

      $count2 = count($items[$i]);
      for ($j = 0; $j < $count2; $j++){
        echo "<td>";
        echo $items[$i][$j]; 
        echo "</td>";
      }
      echo "</tr>";
    }
    echo "</table>";

  }

  public function viewItemsMenu(){

    echo "<button type='button' id='addItemButton'> Add </button>";
    echo "<button type='button' id='editItemButton'> Edit </button>";
    echo "<button type='button' id='deleteItemButton'> Delete </button>";

  }

  public function viewAddItem(){

    include "views/addItemForm.html";
  }

  public function viewEditItem($target){

    $item = $this->db->viewItem($target);
    include "views/editItemForm.html";
  }

  public function addItem(){

    $this->db->addItem($_POST);
  }

  public function editItem($target){
    $this->db->updateItem($target, $_POST);
  }

}

?>


<!-- JavaScript Functions Below -->

<script>

$(document).ready(function(){

  $('#deleteItemButton').click(function(){

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

  $('#addItemButton').click(function(){
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


  $('#editItemButton').click(function(){

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

  $('#addItemFormButton').click(function(e){

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

  $('#editItemFormButton').click(function(e){

    var sku = $("#current-sku").html();

    var data = $('#itemForm').serializeArray();
    data.push({'name' : "class", 'value' : 'Items' });
    data.push({'name' : "action", 'value' : 'edit'}); 
    data.push({'name' : "target", 'value' : sku})

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

});

</script>