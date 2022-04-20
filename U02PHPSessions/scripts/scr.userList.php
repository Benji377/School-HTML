<?php $list = $userList->getUsers();?>
<?php if (!$list) {?>
  <p>Keine Benutzer vorhanden</p>
<?php } else { ?>
  <table>
    <tr>
      <th>Benutzername</th><th>Geschlecht</th>
      <th>Geburtsdatum</th><th>Bewertung</th><th></th>
    </tr>
<?php forEach($list as $key => $value) {?>
  <tr>
    <td><?php$value->getUsername()?></td>
    <td><?php$value->getMale() ? "Männlich" : "Weiblich"?></td>
    <td><?php$value->getBirthDate()?></td>
    <td><?= $value->getRating()?></td>
    <td>
      <a href="index.php?id=3&username=<?php$value->getUsername()?>">Bearbeiten</a>
      <a href="index.php?id=4&username=<?php$value->getUsername()?>">Löschen</a>
    </td>
  </tr>
<?php }?>
</table>
<?php }?>
