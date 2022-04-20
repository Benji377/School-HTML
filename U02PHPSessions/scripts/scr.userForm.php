<form method="post" action="index.php?id=20" enctype="multipart/form-data">
<table>
  <tr>
    <td><label>Benutzername:</label></td>
    <td>
      <input type="text" name="username" value="<?php $user->getUsername()?>">
    </td>
    <td class="error">
      <?php $user->getError("username")?>
    </td>
  </tr>
    <td><label>Passwort:</label></td>
    <td>
      <input type="text" name="password" value="<?php $user->getPassword()?>">
    </td>
    <td class="error">
      <?php $user->getError("password")?>
    </td>
  <tr>
  </tr>
    <td><label>Passwort wiederholen:</label></td>
    <td>
      <input type="text" name="passwordRepeat" value="<?php $user->getPasswordRepeat()?>">
    </td>
    <td class="error">
      <?php $user->getError("passwordRepeat")?>
    </td>
  <tr>
  </tr>
    <td><label>Geschlecht:</label></td>
    <td>
      <input type="radio" name="gender" id="false" value="<?php $user->getMale()?>">
      <label for="false">Weiblich</label>
      <input type="radio" name="gender" id="true" value="<?php $user->getMale()?>">
      <label for="true">Männlich</label>
    </td>
  <tr>
  </tr>
    <td><label>Geburtsdatum:</label></td>
    <td>
      <input type="date" name="birthDate" value="<?php $user->getBirthDate()?>">
    </td>
    <td class="error">
      <?php $user->getError("birthDate")?>
    </td>
  <tr>
  </tr>
    <td><label>Bewertung:</label></td>
    <td>
      <input type="number" name="rating" value="<?php $user->getRating()?>">
    </td>
    <td class="error">
      <?php $user->getError("rating")?>
    </td>
  <tr>
  </tr>
    <td><label>Profilbild:</label></td>
    <td>
      <input type="file" name="image" value="<?php $user->getImage()?>">
    </td>
    <td class="error">
      <?php $user->getError("imageSize")?>
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
