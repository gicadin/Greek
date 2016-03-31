/**
 * Created by Andrei on 2016-03-30.
 */

$(document).ready(function(){

  var contentId = $('#content');

  var order = {};
  var orderCounter = 1;

  contentId.on("click", ".addOrderItemButton", function(){

    var sku = this.id.replace( /^\D+/g, '');
    var name = this.value;
    var shoppingID = Math.floor(Math.random() * (55000 - 1000) + 1000);
    console.log(shoppingID);
    order[orderCounter] = {sku, name, shoppingID};

    var checkoutListId = "checkoutListId" + orderCounter;

    $('#orderAddedItemList').append("<tr>" +
      "<td>" + name + "<td>" +
      "<td><button class=removeOrderItemButton type=button id=" + checkoutListId + "> Remove </button> </td>" +
      "</tr>"
    );

    orderCounter++;

    console.log(order);

  });

  contentId.on("click", ".removeOrderItemButton", function(){

    var id = "#" + this.id;
    var index = this.id.replace( /^\D+/g, '');

    console.log(index);

    if ( index > 1000){
      $.ajax({
        type: "POST",
        url: "index.php",
        data: {
          'class' : "Order",
          'action' : 'removeSessionItemFromCart',
          'target' : index
        },
        success: function(response) {
          console.log("item was removed from session");
        }
      });
    }
    else {
      console.log("not session");
    }
    
    delete order[index];

    $(id).parent().parent().remove();

    console.log(order);

  });


  contentId.on('click', '#checkoutOrderButton', function(e){

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

    order = {};

    e.preventDefault();
  });


  contentId.on('click', '#checkoutConfirmButton', function(e){

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

  $('#checkoutBackButton').click(function(e){

    $.ajax({
      type:"POST",
      url:"index.php",
      data: {
        'class' : "Order",
        'action' : 'view'
      },
      success: function(response){
        console.log("checkout back button pressed");
        $("#content").html(response);
      },
      error: function() {
        alert("Ajax add button error");
      }
    });

  });


});
