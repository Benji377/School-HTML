<?php 
if (empty($_POST["firstname"]) || empty($_POST["surname"])
    || empty($_POST["email"])) { 
?>
  <h2>Fehler</h2>
  <p>Vor-, Nachname und E-Mail müssen eingegeben werden</p>
  <p><a href="index.php?id=2">Zurück</a>
<?php 
} else { 
  header("Location:index.php");
}
?>