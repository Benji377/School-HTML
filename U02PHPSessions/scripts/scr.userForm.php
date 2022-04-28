<form method="post" action="index.php?id=20" enctype="multipart/form-data">
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
      <input type="number" name="rating" value="<?= $user->getRating()?>">
    </td>
    <td class="error">
      <?= $user->getError("rating")?>
    </td>
  <tr>
  </tr>
    <td><label>Profilbild:</label></td>
    <td>
      <input type="file" name="image" value="<?= $user->setImageFromSuperglobal($user->getImage())?>">
    </td>
    <td class="error">
      <?= $user->getError("imageSize")?>
    </td>
  <tr>
    <td>
      <input type="submit" name="submit" value="Hinzufügen">
      <input type="reset" name="reset" value="Zurücksetzen">
    </td>
    <td></td>
  </tr>
</table>
</form>
