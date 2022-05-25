<!-- Je nachdem, ob ein username gesetzt ist, kann man ermitteln ob
sich das Form in editing oder adding befindet -->
<?php if ($user->getUsername() == NULL) {
  echo '<form name="userForm" method="post" action="index.php?id=20" enctype="multipart/form-data">';
} else {
    echo '<form name="userForm" method="post" action="index.php?id=30" enctype="multipart/form-data">';
} ?>
<table>
  <tr>
    <td><label>Benutzername:</label></td>
    <td>
      <input type="text" name="username" value="<?= $user->getUsername()?>">
    </td>
    <td class="error">
      <?= $user->getError("username")?>
    </td>
  </tr>
    <td><label>Passwort:</label></td>
    <td>
      <input type="password" name="password" value="<?= $user->getPassword()?>">
    </td>
    <td class="error">
      <?= $user->getError("password")?>
    </td>
  <tr>
  </tr>
    <td><label>Passwort wiederholen:</label></td>
    <td>
      <input type="password" name="passwordRepeat" value="<?= $user->getPasswordRepeat()?>">
    </td>
    <td class="error">
      <?= $user->getError("passwordRepeat")?>
    </td>
  <tr>
  </tr>
    <td><label>Geschlecht:</label></td>
    <td>
      <!-- Alternierend, je nach true oder false, wird der Radiobutton aktiviert -->
      <input type="radio" name="male" value="false" <?= $user->getMale() ? '' : ' checked'; ?>>
      <label for="female">Weiblich</label>
      <input type="radio" name="male" value="true" <?= $user->getMale() ? ' checked' : ''; ?>>
      <label for="male">Männlich</label>
    </td>
  <tr>
  </tr>
    <td><label>Geburtsdatum:</label></td>
    <td>
      <input type="date" name="birthDate" value="<?= $user->getBirthDate()?>">
    </td>
    <td class="error">
      <?= $user->getError("birthDate")?>
    </td>
  <tr>
  </tr>
    <td><label>Bewertung:</label></td>
    <td>
      <input type="number" name="rating" step="0.01" value="<?= $user->getRating()?>">
    </td>
    <td class="error">
      <?= $user->getError("rating")?>
    </td>
  <tr>
  </tr>
    <td><label>Profilbild:</label></td>
    <td>
      <?php // Fügt das Bild ein, aber nur wenn es bereits eingefügt wurde
      if ($user->getImage() !== NULL) {
        echo '<img src="data:image/jpeg;base64,'.base64_encode($user->getImage()).'"/>';
        echo '<br>';
      }?>
      <input type="file" name="image">
      <?php // Fügt das "Lösche Bild"-Knopf ein. Wobei hier die action des Form mit
      // Javascript geändert wird um der index die richtige id zu übergeben
      if ($user->getImage() !== NULL) {
        echo '<input type="submit" onclick="form.action=\'index.php?id=31\'" value="Bild löschen">';
      } ?>
    </td>
    <td class="error">
      <?= $user->getError("imageSize")?>
    </td>
  <tr>
    <td>
      <?php // Je nachdem ob man den Benutzer gerade verändert, wird ein anderer
      // Name für den Submit Knopf benutzt
      if ($user->getUsername() == NULL) {
        echo '<input type="submit" name="submit" value="Hinzufügen">';
      } else {
        echo '<input type="submit" name="submit" value="Ändern">';
      }?>

      <input type="reset" name="reset" value="Zurücksetzen">
    </td>
    <td></td>
  </tr>
</table>
</form>
