<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

//echo "POST var: " . var_dump($_POST) . "<br/>";
//echo "SESSION var: " . var_dump($_SESSION) . "<br/>";

require_once 'Libraries.php';
require_once 'Database.php';
require_once 'Body.php';
require_once 'Login.php';
require_once 'Logout.php';
require_once 'Order.php';

if (isset($_POST['class'])){
  controller($_POST['class']);
} else {
  $body = new Body();
}

function controller($class){

  switch ($class) {

    case "Order":
      if( isset($_POST['target'])){
        echo var_dump($_POST['target']) . "its set";
        $order = new Order($_POST['action'], $_POST['target']);
      } else {
        $order = new Order($_POST['action']);
      }

    break;

    case "Login":
      $login = new Login();
    break;

    case "Logout":
      $user = new Logout();
      header('Location: index.php');
    break;

    default:
      echo "Should not see this error - file: index.php   function: controller ( select class)";
  }
}