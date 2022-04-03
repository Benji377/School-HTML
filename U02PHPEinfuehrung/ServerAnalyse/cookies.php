<?php
// Setzt ein Cookie der die aktuelle Zeit als Wert hat und 7 Tage erhalten bleibt
$date = new DateTime();
setcookie("LETZTERZUGRIFF", $date->format("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 7);

// Je nachdem, ob der Cookie gesetzt wurde, wird entsprechend eine Meldung ausgegeben
if (isset($_COOKIE["LETZTERZUGRIFF"])) {
  printf("<p>" . translate("Your last access") . ": " . $_COOKIE["LETZTERZUGRIFF"]);
} else {
  printf("<p>" . translate("For the first time here") . "</p>");
}
 ?>
