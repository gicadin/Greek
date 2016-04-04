$(document).ready(function(){

  $('#mainMenu').on('click', 'li', function() {
    $('#navbar-collapse-mainMenu ul li.active').removeClass('active');
    $(this).addClass('active');
  });
  
  $('#admin_dashboardButton').click(function(){

    $.ajax({
      type: "POST",
      url : "index.php",
      data: {
        'class' : 'Dashboard'
      },
      success: function(response){
        console.log("home button");
        $("#content").html(response);
      },
      error: function() {
        alert("something not good up");
      }
    });

  });

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

  $("#admin_logoutButton").click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Logout">' +
      '</form>').submit();

  });

  $('body').on("click", "#admin_profileButton", function(){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Profile",
        'action' : "view"
      },
      success: function(response){
        console.log("Profile button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Categories button not good up");
      }
    });

  });
});
