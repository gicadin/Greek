<?php

require_once "Body.php";
require_once __DIR__ . '/../Libraries.php'; 
require_once "Database.php"; 
require_once "Items.php";
require_once "Categories.php";

if (isset($_POST['class'])){
  //echo var_dump($_POST);
  controller($_POST['class']);
}
else {
  
  $body = new Body();
}


function controller($class){

  switch ($class) {
    case "Items":   
      $items = new Items();      
      if ( isset($_POST['target'])){     
        $items->controller($_POST['action'], $_POST['target']); 
      } else
        $items->controller($_POST['action']);

    break;

    case "Categories":
      $categories = new Categories();
      if ( isset($_POST['target'])){
        $categories->controller($_POST['action'], $_POST['target']);
      } else
        $categories->controller($_POST['action']);

    break;

    default:
      echo "Should not see this error - file: admin/index.php   function: selectClass";
  }
}

?>