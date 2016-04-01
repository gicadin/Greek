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

    include_once "views/header.html";
  }

  private function footer(){

    include_once "views/footer.html";
  }

}

?>





</script>

