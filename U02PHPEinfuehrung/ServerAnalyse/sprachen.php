<?php
$lanArray = array();
$lanArray = explode(",", str_replace(";", ",", $_SERVER['HTTP_ACCEPT_LANGUAGE']));
$counter = 0;

foreach ($lanArray as $key => $value) {
  if (strpos($value, "q=") === false) {
    printf("<tr><td>%s</td><td>%s</td></tr>", $counter,
    is_array($value) ? implode(" ", $value) : $value);
    $counter++;
  }
}
?>
