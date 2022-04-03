<?php
$date = new DateTime();
setcookie("LETZTERZUGRIFF", $date->format("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 7);

if (isset($_COOKIE["LETZTERZUGRIFF"])) {
  printf("<p>" . translate("Your last access") . ": " . $_COOKIE["LETZTERZUGRIFF"]);
} else {
  printf("<p>" . translate("Fo the first time here") . "</p>");
}
 ?>
