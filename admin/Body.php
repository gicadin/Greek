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
    
  }

  private function content(){

    require_once "Dashboard.php";

    echo "<div class='container-fluid'>";
    echo "<div id='content' class='row-fluid'> ";

      $dash = new Dashboard();

    echo "</div>";
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