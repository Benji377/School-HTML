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
    <td><?= $value->getUsername()?></td>
    <td><?= $value->getMale() ? "Männlich" : "Weiblich"?></td>
    <td><?= date_format(date_create($value->getBirthDate()), "d.m.Y")?></td>
    <td><?= number_format($value->getRating(), 2, ",")?></td>
    <td>
      <a href="index.php?id=3&username=<?= $value->getUsername()?>">Bearbeiten</a>
      <a href="index.php?id=4&username=<?= $value->getUsername()?>">Löschen</a>
    </td>
  </tr>
<?php }?>
</table>
<?php }?>
