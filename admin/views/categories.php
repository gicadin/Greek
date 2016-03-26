<?php

echo "<table>";

  // Table Column names
  $columnNames = $this->db->getColumnNames("categories");
  $count = count($columnNames);
  echo "<tr><th></th>";
    for ($i = 1; $i < $count; $i++){
    echo "<th>";
      echo $columnNames[$i];
      echo "</th>";

    }
    echo "</tr>";

  // Item information
  $count = count($categories);
  for ($i = 0; $i < $count; $i++){
  echo "<tr>";

    // Checkbox
    $tmpId = "category" . $categories[$i][0];
    echo "<td>";
      echo "<input class=checkbox type=checkbox value=$tmpId>";
      echo "</td>";

    $count2 = count($categories[$i]);
    for ($j = 1; $j < $count2; $j++){
    echo "<td>";
      echo $categories[$i][$j];
      echo "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";

?>