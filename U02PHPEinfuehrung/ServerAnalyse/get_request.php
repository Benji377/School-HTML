<?php
foreach ($_GET as $key => $value) {
  printf("<tr><td>%s</td><td>%s</td></tr>", $key,
  is_array($value) ? implode(" ", $value) : $value);
}
 ?>
