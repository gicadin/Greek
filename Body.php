<?php

class Body {

  public function __construct(){

    $this->header();
    $this->menu();
    $this->content();
    $this->footer();

  }

  private function menu(){

    echo "<button type='button' id='itemsButton'> Home </button>";
    echo "<button type='button' id='categoriesButton'> Menu </button>";

    if ( isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'user'){
      echo "<button type='button' id='orderButton'> Order </button>";
      echo "<button type='button' id='logoutButton'> Logout </button>";
    } else {
      echo "<button type='button' id='loginButton'> Login </button>";
    }

  }

  private function content(){

    echo "<div id='content'>";
    echo "</div>";

  }

  private function header(){

  }

  private function footer(){

  }

}

?>

<script>
$(document).ready(function(){

  $('#loginButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Login">' +
      '</form>').submit();
  });

  $('#logoutButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Logout">' +
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
  })


});


</script>

