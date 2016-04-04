
$(document).ready(function(){

  var contentId = $('#content');

  contentId.on("click", "#admin_deleteItemButton", function(){
  // $('#admin_deleteItemButton').click(function(){

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

  contentId.on("click", "#admin_addItemButton", function(){
  // $('#admin_addItemButton').click(function(){
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
  
  contentId.on("click", "#admin_editItemButton", function(){
  // $('#admin_editItemButton').click(function(){

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

  contentId.on("click", "#admin_addItemFormButton", function(e){
  // $('#admin_addItemFormButton').click(function(e){

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

  contentId.on("click", "#admin_editItemFormButton", function(e){
  // $('#admin_editItemFormButton').click(function(e){
    
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

  contentId.on("click", "#admin_backItemButton", function(){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Items",
        'action' : "view"
      },
      success: function(response){
        console.log("Back button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax back not good up");
      }
    });
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
