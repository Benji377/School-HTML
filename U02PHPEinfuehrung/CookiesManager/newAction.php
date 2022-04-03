<?php
include "../translations.php";
// Kontrolliert dass alle Felder gefüllt sind
if (empty($_POST["name"]) || empty($_POST["value"])||empty($_POST["lifespan"])){
?>
<h2><?php echo translate("Cookie Error") ?></h2>
<p><?php echo translate("You need to fill out the whole form") ?></p>
<!-- Durch Javascript kann man hier ganz einfach zur vorherigen Seite zurück
gelangen. Mit dem PHP header location würden die Werte im Formular überschrieben werden -->
<a href="javascript:history.go(-1)"><?php echo translate("Back") ?></a>
<?php
} else {
  // Wenn der Cookie nur so lange am Leben bleiben soll, wie der Browser,
  // wird es auf 0 gesetzt
  if ($_POST['lifespan'] == 1) {
    setcookie($_POST['name'], $_POST['value'], 0);
  }
  setcookie($_POST['name'], $_POST['value'], time() + $_POST['lifespan']);
?>
<!-- Bei erfolgeiches Erstellen eines Cookie kann man zum CookieManager
zurück gelangen -->
<h2><?php echo translate("Cookie successfull") ?></h2>
<p><?php echo translate("Cookie has been created, you can now go back") ?></p>
<a href="index.php?id=1"><?php echo translate("Back to the CookieManager") ?></a>

<?php
}
?>
