<?php

  echo "<table>";

  // Table Column names
  $columnNames = $this->db->getColumnNames("items");

  echo "<tr>";
    // Name
  echo "<th>$columnNames[1]</th>";
  // Price
  echo "<th>$columnNames[3]</th>";
  // Description
  echo "<th>$columnNames[6]</th>";
  echo "</tr>";

  // Item information
  $count = count($items);
  for ($i = 0; $i < $count; $i++){
    echo "<tr>";

    echo "<td>" . $items[$i][0] . "</td>";
    echo "<td>" . $items[$i][2] . "</td>";
    echo "<td>" . $items[$i][5] . "</td>";

    // Add Button
    $itemSku = "itemSku" . $items[$i][1];
    $itemName = $items[$i][0];

    echo "<td>";
    echo "<button value='" . $itemName ."' class='addOrderItemButton' type=button id=$itemSku> Add </button>";
    echo "</td>";

    echo "</tr>";
  }
  echo "</table>";

  echo "<br/>";

  echo "<h2>Order List</h2>";

  echo "<table id='orderList'>";

  echo "</table>";

?>