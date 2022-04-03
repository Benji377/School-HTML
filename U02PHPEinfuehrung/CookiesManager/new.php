<!-- Stellt ein Formular dar wo man ein neuen Cookie hinzufügen kann.
Beim Abschicken des Formulars kontrolliert dann newAction.php dass alle Werte
eingegeben wurden und dass der Cookie erstellt wird.-->
<form action="newAction.php" method="post">
  <table>
    <tr>
      <td><?php echo translate("Name"); ?></td>
      <td>
        <!-- Ist normalerweiße leer, außer wenn sich eine Wert in der POST Variable befindet -->
        <input type="text" name="name" value=<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>>
      </td>
    </tr>
    <tr>
      <td><?php echo translate("Value"); ?></td>
      <td>
        <input type="text" name="value" value=<?php echo isset($_POST['value']) ? $_POST['value'] : '' ?>>
      </td>
    </tr>
    <tr>
      <td><?php echo translate("Lifespan"); ?></td>
      <td>
        <!-- Liste von Möglichen Auswahlen, bleibt beim submit nicht erhalten.
        Die values sind die Angegebene Zeit in Sekunden -->
        <select name="lifespan">
          <option value="1"><?php echo translate("Dies when the Browser gets closed"); ?></option>
          <option value="30">30 <?php echo translate("Seconds"); ?></option>
          <option value="60">1 <?php echo translate("Minute"); ?></option>
          <option value="300">5 <?php echo translate("Minutes"); ?></option>
          <option value="3600">1 <?php echo translate("Hour"); ?></option>
          <option value="604800">7 <?php echo translate("Days"); ?></option>
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <!-- Gibt dem Nutzer die Möglichkeit den Cookie anzulegen oder die Felder
      zurückzusetzen -->
        <input type="submit" name="submit" value=<?php echo translate("Create"); ?>>
        <input type="reset" name="reset" value=<?php echo translate("Reset"); ?>>
      </td>
    </tr>
  </table>
</form>
