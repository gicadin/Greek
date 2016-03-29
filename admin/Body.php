<?php

class Body {

  public function __construct(){

    $this->header();
    $this->menu();
    $this->content();
    $this->footer();

    
  }

  private function menu(){

    echo "<button type='button' id='itemsButton'> Items </button>";
    echo "<button type='button' id='categoriesButton'> Categories </button>";
    echo "<button type='button' id='usersButton'> Users </button>";

    echo "<button type='button' id='logoutButton'> Logout </button>";

  }

  private function content(){

    echo "<div id='content'>";
    echo "</div>";

  }

  private function header(){
    require_once "header.php";
  }

  private function footer(){
    require_once "footer.php";
  }
}

?>

<script>

$(document).ready(function(){
  $('#itemsButton').click(function(){

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

  $('#categoriesButton').click(function(){

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

  $('#logoutButton').click(function(){

    $('<form action="index.php" method="POST"> ' +
      '<input type="hidden" name="class" value="Logout">' +
      '</form>').submit();

  });
});

</script>

