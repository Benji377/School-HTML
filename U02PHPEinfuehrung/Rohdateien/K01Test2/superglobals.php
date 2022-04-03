<table>
	<tr>
		<th>Name</th>
		<th>Wert</th>
	</tr>
<?php
ksort($_SERVER);
foreach ($_SERVER as $key => $value) {
  printf("<tr><td>%s</td><td>%s</td></tr>", $key,
    is_array($value) ? implode(" ", $value) : $value);
}
?>
</table>
