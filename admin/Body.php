<?php

class Body {

  public function __construct(){

    $this->header();
    $this->menu();
    $this->content();
    $this->footer();
    
  }

  private function menu(){

    echo "<button type='button' id='admin_itemsButton'> Items Menu </button>";
    echo "<button type='button' id='admin_categoriesButton'> Categories Menu </button>";

    echo "<button type='button' id='admin_profileButton'> Hello " . ucfirst($_SESSION['username']). "</button>";
    echo "<button type='button' id='admin_logoutButton'> Logout </button>";

  }

  private function content(){

    echo "<div id='content'>";
    echo "</div>";

  }

  private function header(){
    require_once "views/header.php";
  }

  private function footer(){
    require_once "views/footer.php";
  }
}

?>