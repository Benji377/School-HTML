<?php
// Löscht einen cookie aus der Tabelle, indem es den Index dass es in der Tabelle
// hat benutzt um den Cookie an der gleichen Stelle im $_COOKIe Array zu finden
// und zu löschen
$count = 0;
// Geht alle Cookies im $_COOKIE Array durch
foreach ($_COOKIE as $key => $value) {
  // Der Index wird über GET übergeben, wenn es mit dem Counter übereinstimmt
  // wird der Cookie gelöscht
  if ($count == $_GET["id"]) {
    // Cookies löscht man indem man die Zeit negativ einstellt
    setcookie($key, "", time() - 3600);
  }
  // Count gibt uns den Index an
  $count++;
}
// nachdem der Script ausgeführt wurde, wird der Nutzer zur Hauptseite zurück-
// geschickt. Vor allem weil es auf dieser Seite nichts zu sehen gibt.
header('Location: index.php?id=1');
// Als Sicherheit wird der Script hier noch unterbrochen
exit();
 ?>
