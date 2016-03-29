<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);

if (isset($_POST['class'])){
  //echo var_dump($_POST);
  controller($_POST['class']);
}
else {
  //$body = new Body();
}


function controller($class){

  switch ($class) {

    case "Logout":
      $user = new Logout();
      $login = new Login();
      break;

    default:
      echo "Should not see this error - file: index.php   function: controller ( select class)";
  }
}