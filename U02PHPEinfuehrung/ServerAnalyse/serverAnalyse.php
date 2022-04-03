<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/html5reset.css">
    <link rel="stylesheet" href="../css/serverAnalyse.css">
    <title>ServerAnalyse</title>
  </head>
  <body>
    <?php include "../translations.php" ?>
    <table>
      <tr>
        <th><?php echo translate("Name") ?></th>
        <th><?php echo translate("Value") ?></th>
      </tr>
      <?php
      $arr = array("SERVER_NAME", "SERVER_PORT", "HTTP_ACCEPT_LANGUAGE", "PHP_SELF", "QUERY_STRING", "REQUEST_URI");
      foreach ($_SERVER as $key => $value) {
        if (in_array($key, $arr)) {
          printf("<tr><td>%s</td><td>%s</td></tr>", $key,
          is_array($value) ? implode(" ", $value) : $value);
        }
      }
      ?>
      <th style="vertical-align: middle">$_REQUEST</th>
      <td>
        <table style="width: 100%;">
          <th><?php echo translate("Name") ?></th>
          <th><?php echo translate("Value") ?></th>
          <?php include "get_request.php" ?>
        </table>
      </td>
      <tr>
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
