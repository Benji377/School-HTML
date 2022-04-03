<?php
// Da sich im Array $_SERVER['HTTP_ACCEPT_LANGUAGE'] nicht nur die Namen der Sprachen
// befinden, sondern auch Zahlen und anderes, werden zuerst alle Elemente die mit
// Beistrich oder Punkt-Strich getrennt sind in ein weiteres Array unterteilt
$lanArray = array();
$lanArray = explode(",", str_replace(";", ",", $_SERVER['HTTP_ACCEPT_LANGUAGE']));
$counter = 0;

// Da wir jetzt die einzelnen Elemente haben, können wir diese unterscheiden und
// ermitteln ob es sich um eine Sprache oder anderes handelt
foreach ($lanArray as $key => $value) {
  // q= ist nicht eine Sprache und soll deswegen übersprungen werden,
  // alles andere wird ausgegeben
  if (strpos($value, "q=") === false) {
    printf("<tr><td>%s</td><td>%s</td></tr>", $counter,
    is_array($value) ? implode(" ", $value) : $value);
    // Counter gibt uns den Index aus
    $counter++;
  }
}
?>
