<?php
// Bestimmt den Kopf der Tabelle. Setzt dabei lediglich den Zugriffs-Cookie
// und definiert eine generelle Struktur der Webseite
$date = new DateTime();
setcookie("LETZTERZUGRIFF", $date->format("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 7);

printf("<tr>
<td rowspan='2' style='vertical-align: middle'>
<h1>Cookiemanager</h1>
</td>
<td>%s " . translate("Cookies set") . "</td>
</tr>
<tr>
<td>%s</td>
</tr>", sizeof($_COOKIE),  isset($_COOKIE["LETZTERZUGRIFF"]) ?
translate("Your last access") . ": " . $_COOKIE["LETZTERZUGRIFF"] :
  translate("For the first time here"));
 ?>
