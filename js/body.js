/**
 * Created by Andrei on 2016-03-31.
 */

$(document).ready(function(){

  $('#loginButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Login" />' +
      '</form>').append().submit();
  });

  $('#logoutButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Logout" />' +
      '</form>').submit();

  });

  $('#orderButton').click(function(){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Order",
        'action' : "view"
      },
      success: function(response){
        console.log("Order button pressed - Shopping Cart started");
        $("#content").html(response);
      },
      error: function() {
        alert("Categories button not good up");
      }
    });
  });
  
});
