<?php
  printf("<table>");
  foreach ($_COOKIE as $key => $value) {
    printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $key,
    is_array($value) ? implode(" ", $value) : $value,
    "<a href='#'>Löschen</a>");
  }
  printf("</table>")
?>
