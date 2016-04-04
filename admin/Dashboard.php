<?php


class Dashboard {

  public function __construct() {
    $this->view();
    
  }

  private function view(){
    include "views/dashboard.html";
  }

}