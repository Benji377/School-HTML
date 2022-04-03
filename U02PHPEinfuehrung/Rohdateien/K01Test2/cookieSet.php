<?php
// setcookie(
//   "BesuchteKategorien",
//   "Wetter Lokales Inserate Chronik Webcams",
//   time() + 60 * 60 * 24
// );

$name = $_GET["name"];
$inhalt = $_GET["inhalt"];
$lebenszeit = $_GET["lebenszeit"];
setcookie($name, $inhalt, time() + $lebenszeit);
?>