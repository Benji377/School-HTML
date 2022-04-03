<?php
$date = new DateTime();
setcookie("LETZTERZUGRIFF", $date->format("d.m.Y H:i:s"), time() + 60 * 60 * 24 * 7);

printf("<tr>
<td rowspan='2' style='vertical-align: middle'>
<h1>Cookiemanager</h1>
</td>
<td>%s Cookies gesetzt</td>
</tr>
<tr>
<td>%s</td>
</tr>", sizeof($_COOKIE),  isset($_COOKIE["LETZTERZUGRIFF"]) ?
"Ihr letzte Zugriff erfolgte " . $_COOKIE["LETZTERZUGRIFF"] :
  "Zum ersten Mal auf der Seite");
 ?>
