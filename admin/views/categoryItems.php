<?php

echo "<div class='col-md-9'>";
echo "<div class='table-responsive'>";

echo "<table class='table table-striped table-hover table-condensed'>";

// Table Column names
$columnNames = $this->db->getColumnNames("items");
$count = count($columnNames);
echo "<tr>";
for ($i = 1; $i < $count; $i++){
  echo "<th>";
  echo $columnNames[$i];
  echo "</th>";

}
echo "</tr>";

// Item information
$count = count($items);
for ($i = 0; $i < $count; $i++){
  echo "<tr>";

  $count2 = count($items[$i]);
  for ($j = 0; $j < $count2; $j++){
    echo "<td>";
    echo $items[$i][$j];
    echo "</td>";
  }
  echo "</tr>";
}
echo "</table>";

echo "</div>";
echo "</div>";