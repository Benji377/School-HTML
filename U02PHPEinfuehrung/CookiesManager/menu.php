<?php
// Stellt lediglich eine Liste von Links zu anderen Aktionen und Seiten dar
printf("<ul style='list-style-type: none; text-align: left'>
<li><a href='index.php?id=1'>". translate("List") ."</a></li>
<li><a href='index.php?id=2'>". translate("New") ."</a></li>
<li><a href='deleteAll.php' onclick='return confirm(\"".
translate("Delete all cookies?") ."\")'>". translate("Delete all") ."</a></li>
</ul>")
 ?>
