<?php

session_start();

ini_set("display_errors", "1");
error_reporting(E_ALL);

require_once 'Libraries.php';
require_once 'Database.php';

if (isset($_POST['class'])){
  controller($_POST['class']);
} else {
  require_once 'Body.php';
  $body = new Body();
}

function controller($class){

  switch ($class) {

    case "Order":
      require_once 'Order.php';

      if( isset($_POST['target'])){
        $order = new Order($_POST['action'], $_POST['target']);
      } else {
        $order = new Order($_POST['action']);
      }
    break;

    case "Login":
      require_once 'Login.php';
      $login = new Login();
    break;

    case "Logout":
      require_once 'Logout.php';
      $user = new Logout();

      header('Location: index.php');
    break;

    default:
      echo "Should not see this error - file: index.php   function: controller ( select class)";
  }

  echo "<br/><br/><br/><br/>";
  echo "<h1>Testing</h1>";
  echo "POST var: " . var_dump($_POST) . "<br/>";
  echo "SESSION var: " . var_dump($_SESSION) . "<br/>";
}
