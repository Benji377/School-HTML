<?php
// Stellt eine Liste von Cookie Einträge dar. Dabei erhält auch jeder Eintrag
// Ein Link um den Cookie einzeln zu löschen.
// Um ein Cookie zu löschen wird der delete.php Datei die Position des Eintrag
// in der Tabelle übergeben, an der sich der Link befindet worauf der Benutzer
// gerade geklickt hat
  printf("<table>");
  $i = 0;
  foreach ($_COOKIE as $key => $value) {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $key,
    is_array($value) ? implode(" ", $value) : $value,
    "<a href='delete.php?id=". $i ."' onclick='return confirm(\""
    . translate("Delete cookie?") ."\");'>". translate("Delete") ."</a>");
    $i++;
  }
  printf("</table>")


?>
