<h1>Hallo</h1>
<?php
if ($_POST["username"]=="sepp" && $_POST["password"]=="verycomplex")
  header("Location:index.php");
else {
  echo "<p>Benutzername und/oder Passwort nicht korrekt</p>";
  echo "<p><a href='loginform.php'>Zurück</a></p>";
}
?>
