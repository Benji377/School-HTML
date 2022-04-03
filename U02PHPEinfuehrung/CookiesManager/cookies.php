<?php
$date = new DateTime();
setcookie("LetzterZugriff", $date->format("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 7);

if (isset($_COOKIE["LetzterZugriff"])) {
  printf("<p>Ihr letzte Zugriff erfolgte " . $_COOKIE["LetzterZugriff"]);
} else {
  printf("<p>Zum ersten Mal auf der Seite</p>");
}
 ?>
