<?php
// Listet alle Parameter die über die URL übergeben wurden in Spalten auf
// Dies kann danach in eine Tabelle angezeigt werden
foreach ($_GET as $key => $value) {
  printf("<tr><td>%s</td><td>%s</td></tr>", $key,
  is_array($value) ? implode(" ", $value) : $value);
}
 ?>
