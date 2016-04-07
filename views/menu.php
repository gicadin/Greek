<?php

echo "<div class='col-md-offset-2 col-md-8 col-sm-12'>";

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
  echo "</div>";
  echo "</div>";
  echo "</div>";
  echo " </div>";

}

echo "</div>";

