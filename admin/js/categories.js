
$(document).ready(function(){

  var contentId = $('#content');

  contentId.on("click", "#deleteCategoryButton", function(){
  
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

  contentId.on("click", "#addCategoryButton", function(){
  //$('#addCategoryButton').click(function() {
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

  contentId.on("click", "#addCategoryFormButton", function(e){
  // $('#addCategoryFormButton').click(function(e){

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

  contentId.on("click", "#editCategoryButton", function(){
  // $('#editCategoryButton').click(function(e) {

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

  contentId.on("click", "#editCategoryFormButton", function(e){
  //$('#editCategoryFormButton').click(function(e){

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

  contentId.on("click", "#viewItemsCategoryButton", function(){
  //$('#viewItemsCategoryButton').click(function(e){

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