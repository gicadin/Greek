$(document).ready(function(){
  $('#admin_itemsButton').click(function(){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Items",
        'action' : "view"
      },
      success: function(response){
        console.log("o mers puie");
        $("#content").html(response);
      },
      error: function() {
        alert("something not good up"); 
      }
    });

  });

  $('#admin_categoriesButton').click(function(){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Categories",
        'action' : "view"
      },
      success: function(response){
        console.log("Categories button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Categories button not good up");
      }
    });

  });

  $('#admin_logoutButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Logout">' +
      '</form>').submit();

  });
});
