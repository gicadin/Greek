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

    ?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript Bootstrap-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="js/body.js"></script>

    <script src="js/order.js"></script>

    <?php

  }

}

?>

<script>




</script>

