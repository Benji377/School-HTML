<?php
require_once "circle.php";
require_once "functions.php";
function volume($r) {
  return 2/3*pow($r, 3)* pi();
}
echo "Volumen Halbkugel: " . volume(3.1) . "<br>";
echo "Umfang Halbkugel: " . circumference(3.1) . "<br>";
?>
