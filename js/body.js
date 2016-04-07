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

    minimizeMainMenu();

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

  $('#homeButton').click(function(){

    maximizeMainMenu();

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Home",
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

  $('#menuButton').click(function(){

    minimizeMainMenu();

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Menu",
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

  function minimizeMainMenu(){

    $('#mainMenuLogo').animate({height: 'hide'}, 1500);
    $('#mainMenuTitle').animate({height: 'hide'}, 1500);
    // $('#mainMenuLogo').hide({'duration' : 5000, 'effect' : "drop" });
    // $('#mainMenuTitle').hide({'easing' : 'linear', 'duration' : 2000});

  }

  function maximizeMainMenu(){

    $('#mainMenuLogo').animate({height: 'show'}, 1500);
    $('#mainMenuTitle').animate({height: 'show'}, 1500);

    // $('#mainMenuLogo').show('slow');
    // $('#mainMenuTitle').show('slow');

  }

  $("#upcomingEventsButton").click(function() {
    $('html, body').animate({
      scrollTop: $("#contact").offset().top
    }, 2000);
    return false;
  });

});
