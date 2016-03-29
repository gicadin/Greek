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

    //$this->db->deleteCategory($target);
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

<!-- JavaScript Functions Below -->

<script>

$(document).ready(function(){

  $('#deleteCategoryButton').click(function(){

    var checkedValue = $('.checkbox:checked').val().replace( /^\D+/g, '');
    console.log(checkedValue);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Categories",
        'action' : "delete",
        'target' : checkedValue
      },
      success: function(response){
        console.log("Delete button pressed for id: " + checkedValue);
        $("#content").html(response);
      },
      error: function(){
        alert("Ajax delete not good categories");
      }
    });
  });

  $('#addCategoryButton').click(function() {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: {
        'class': "Categories",
        'action': 'addView'
      },
      success: function (response) {
        console.log("Add Category button pressed");
        $("#content").html(response);
      },
      error: function () {
        alert("Ajax add category error");
      }
    });
  });

  $('#addCategoryFormButton').click(function(e){

    var data = $('#categoryForm').serializeArray();
    data.push({'name' : 'class', 'value' : 'Categories'});
    data.push({'name' : 'action', 'value' : 'add'});

    $.ajax({
      type:"POST",
      url:"index.php",
      data:data,
      success: function(response){
        $("#content").html(response);
      },
      error: function(xhr, status, error){
        alert("Add category button error");
      }
    });

    e.preventDefault();

  });

  $('#editCategoryButton').click(function(e) {

    var checkedValue = $('.checkbox:checked').val().replace( /^\D+/g, '');
    console.log(checkedValue);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Categories",
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

  $('#editCategoryFormButton').click(function(e){

    var id = $("#current-category-id").html();

    var data = $('#categoryForm').serializeArray();
    data.push({'name' : "class", 'value' : 'Categories' });
    data.push({'name' : "action", 'value' : 'edit'});
    data.push({'name' : "target", 'value' : id});

    console.log(data);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: data,
      success: function(response){
        console.log("Edit Category button pressed");
        $("#content").html(response);
      },
      error: function(xhr, status, error) {
        alert("Edit Category button error " );
      }
    });

    e.preventDefault();

  });

  $('#viewItemsCategoryButton').click(function(e){


    var checkedValue = $('.checkbox:checked').val().replace( /^\D+/g, '');
    console.log(checkedValue);

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Categories",
        'action' : "itemsView",
        'target' : checkedValue
      },
      success: function(response){
        console.log("Category Items View button pressed for id: " + checkedValue);
        $("#content").html(response);
      },
      error: function(){
        alert("Ajax delete not good categories");
      }
    });
  });

});

</script>