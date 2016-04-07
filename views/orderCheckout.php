<?php

echo "<div class='col-md-4'>";

echo "<div class=''><h3> Order List </h3></div>";

echo "<table id='checkoutItemList' class='table'>";

echo "<tr>";
echo "<th class='noBorderTopClass'> Item </th>";
echo "<th class='noBorderTopClass'> Price </th>";
echo "</tr>";

if (isset($_SESSION['order']) && count($_SESSION['order']) > 0){
  
  $totalPrice = 0;
  
  $length = count($_SESSION['order']);
  $counter = 1;
  for ($i = 0; $counter <= $length; $i++){

    if ( isset($_SESSION['order'][$i])){

      $price = $this->db->getItemPrice($_SESSION['order'][$i]['sku']);

      echo "<tr>";
      $checkoutListId = $_SESSION['order'][$i]['shoppingID'];
      echo "<td>" . $_SESSION['order'][$i]['name'] . "</td>";
      echo "<td>" . $price[0] . "</td>";
      echo "</tr>";

      $totalPrice += $price[0];
      $counter++;
    }
  }

  echo "<tr>";
  echo "<th> Total </th>";
  echo "<th>" . $totalPrice ."</th>";
  echo "</tr>";

  echo "<tr>";
  echo "<td> Today's Date </td>";
  echo "<td>" . date("Y-m-d"). "</td>";
  echo "</tr>";

  $_SESSION['totalPrice'] = $totalPrice;
  $_SESSION['date'] = date("Y-m-d");

}

echo "</table>";

echo "</div>";

?>