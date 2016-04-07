<?php

echo "<div class='col-md-8 col-sm-12'>";

echo "<div class='menuSubTitle'><h3> Menu </h3></div>";

//  // Item information
  $count = count($items);
  for ($i = 0; $i < $count; $i++){

    $itemSku = "itemSku" . $items[$i][1];
    $itemName = $items[$i][0];

      echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
        echo "<div class='w3-container '>";
          echo "<div class='w3-card-4 card'>";
            echo "<img class='card-img-top' src='" . IMAGE_PATH . $items[$i][6] . "' alt='Norway'>";
            echo "<div class='w3-container card-block'>";
              echo "<h4 class='card-title'>" . $items[$i][0] . "</h4>";
              echo "<p class='card-text'>" . $items[$i][5] . "</p>";
              echo "<span> Price: $" . $items[$i][2] . "</span>";
              echo "<button value='" . $itemName ."' class='addOrderItemButton btn btn-primary' type=button id=$itemSku> Add </button>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      echo " </div>";

  }

echo "</div>";

//
//
//  echo "<table id='orderItemList'>";
//
//  // Table Column names
//  $columnNames = $this->db->getColumnNames("items");
//
//  echo "<tr>";
//    // Name
//  echo "<th>$columnNames[1]</th>";
//  // Price
//  echo "<th>$columnNames[3]</th>";
//  // Description
//  echo "<th>$columnNames[6]</th>";
//  // File path
//  echo "<th>Image</th>";
//  echo "</tr>";
//
//  // Item information
//  $count = count($items);
//  for ($i = 0; $i < $count; $i++){
//    echo "<tr>";
//
//    echo "<td>" . $items[$i][0] . "</td>";
//    echo "<td>" . $items[$i][2] . "</td>";
//    echo "<td>" . $items[$i][5] . "</td>";
//    echo "<td><img src='" . IMAGE_PATH . $items[$i][6] . "' /></td>";
//
//    // Add Button
//    $itemSku = "itemSku" . $items[$i][1];
//    $itemName = $items[$i][0];
//
//    echo "<td>";
//    echo "<button value='" . $itemName ."' class='addOrderItemButton' type=button id=$itemSku> Add </button>";
//    echo "</td>";
//
//    echo "</tr>";
//  }
//  echo "</table>";
//

echo "<div class='col-md-2'>";

  echo "<div class=''><h3> Order List </h3></div>";

  echo "<table id='orderAddedItemList' class='table'>";

  if (isset($_SESSION['order']) && count($_SESSION['order']) > 0){
    $length = count($_SESSION['order']);
    $counter = 1;
    for ($i = 0; $counter <= $length; $i++){
      if ( isset($_SESSION['order'][$i])){
        echo "<tr>";
        $checkoutListId = $_SESSION['order'][$i]['shoppingID'];
        echo '<td><a class="removeOrderItemButton fa fa-minus-circle" type=button id="' . $checkoutListId . '"> </a> </td>';
        echo "<td>" . $_SESSION['order'][$i]['name'] . "</td>";
        echo "</tr>";
        $counter++;
      }
    }
  }

  echo "</table>";

echo "</div>";
