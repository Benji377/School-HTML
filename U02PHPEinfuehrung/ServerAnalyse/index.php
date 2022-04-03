<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/html5reset.css">
    <link rel="stylesheet" href="../css/serverAnalyse.css">
    <title>ServerAnalyse</title>
  </head>
  <body>
    <!-- Includiert die translations-Funktion. Somit haben auch alle anderen
  Files, die includiert werden diese Funktion zur verfügung -->
    <?php include "../translations.php" ?>
    <table>
      <tr>
        <th><?php echo translate("Name") ?></th>
        <th><?php echo translate("Value") ?></th>
      </tr>
      <!-- Gibt in der Tabelle eine Liste aus, die als key im Array $_SERVER
    die Werte im $arr haben. -->
      <?php
      $arr = array("SERVER_NAME", "SERVER_PORT", "HTTP_ACCEPT_LANGUAGE", "PHP_SELF", "QUERY_STRING", "REQUEST_URI");
      foreach ($_SERVER as $key => $value) {
        if (in_array($key, $arr)) {
          printf("<tr><td>%s</td><td>%s</td></tr>", $key,
          is_array($value) ? implode(" ", $value) : $value);
        }
      }
      ?>
      <!-- Liste mit Werte die sich in der Variable $_GET befinden-->
      <th style="vertical-align: middle">$_REQUEST</th>
      <td>
        <table style="width: 100%;">
          <th><?php echo translate("Name") ?></th>
          <th><?php echo translate("Value") ?></th>
          <?php include "get_request.php" ?>
        </table>
      </td>
      <tr>
        <!-- Eine Liste von allen Sprachen die derzeit der Browser bevorzugt -->
        <th style="vertical-align: middle"><?php echo translate("Language") ?></th>
        <td>
          <table style="width: 100%;">
            <th><?php echo translate("Index") ?></th>
            <th><?php echo translate("Value") ?></th>
            <?php include "sprachen.php" ?>
          </table>
        </td>
      </tr>
    </table>
    <?php include "cookies.php" ?>
  </body>
</html>
