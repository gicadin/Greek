<?php

session_start();

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once '../config.php';

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

  echo "<br/><br/><br/><br/>";
  echo "<h1>Testing</h1>";
  echo "POST var: " . var_dump($_POST) . "<br/>";
  echo "SESSION var: " . var_dump($_SESSION) . "<br/>";

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

    case "Profile":
      require_once "Profile.php";
      $profile = new Profile();
      $profile->controller($_POST['action']);

    break;

    case "Logout":
      require_once "Login.php";
      require_once "Logout.php";
      $user = new Logout();
      $login = new Login();
    break;

    default:
      echo "Should not see this error - file: admin/index.php   function: selectClass";
  }
}



?>


