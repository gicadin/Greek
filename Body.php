<?php

class Body {

  public function __construct(){

    $this->header();
    $this->menu();
    $this->content();
    $this->footer();

  }

  private function menu(){
    
    require_once "views/mainMenu.html";

//    echo "<button type='button' id='itemsButton'> Home </button>";
//    echo "<button type='button' id='menuButton'> Menu </button>";
//
//    if ( isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'user'){
//      echo "<button type='button' id='orderButton'> Order </button>";
//      echo "<button type='button' id='logoutButton'> Logout </button>";
//    } else {
//      echo "<button type='button' id='loginButton'> Login </button>";
//    }

  }

  private function content(){

    echo "<div class='container-fluid'>";
    echo "<div id='content'>";
      include "views/home.html";
    echo "</div>";
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

