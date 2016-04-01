<?php

session_start();

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once '../config.php';
echo IMAGE_PATH; 

//if ( isset($_SESSION['username']))
//  echo "Hello " . $_SESSION['username'] . "<br/>";

//require_once __DIR__ . '/../Libraries.php';
require_once __DIR__ . '/../Database.php';

if (isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] == 'admin'){
  if (isset($_POST['class'])){
    //echo var_dump($_POST);
    controller($_POST['class']);
  }
  else {
    require_once "Body.php";
    $body = new Body();
  }
} else {
    require_once "Login.php";
    $login = new Login();
}

function controller($class){

  switch ($class) {
    case "Items":   
      require_once "Items.php";
      $items = new Items();      
      if ( isset($_POST['target'])){     
        $items->controller($_POST['action'], $_POST['target']); 
      } else
        $items->controller($_POST['action']);

    break;

    case "Categories":
      require_once "Categories.php";
      $categories = new Categories();
      if ( isset($_POST['target'])){
        $categories->controller($_POST['action'], $_POST['target']);
      } else
        $categories->controller($_POST['action']);

    break;

    case "Logout":
      require_once "Logout.php";
      $user = new Logout();
      $login = new Login();
    break;

    default:
      echo "Should not see this error - file: admin/index.php   function: selectClass";
  }
}

?>