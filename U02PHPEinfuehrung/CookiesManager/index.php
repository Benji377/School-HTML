<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/html5reset.css">
    <link rel="stylesheet" href="../css/cookiesManager.css">
    <title>CookieManager</title>
  </head>
  <body>
    <?php include "../translations.php" ?>
    <table>
      <tr>
        <?php include "head.php"?>
      </tr>
      <tr>
        <td>
          <?php include "menu.php" ?>
        </td>
        <td>
          <!-- Je nachdem, ob die ID in der URL gesetzt wurde, wird entsprechend auch
          die richtige Datei eingebunden. Bei keiner ID wird die Liste angezeigt -->
          <?php
          $file = "list.php";
          if (isset($_GET["id"])) {
            switch ($_GET["id"]) {
              case 1: {
                $file = "list.php";
                break;
              }
              case 2: {
                $file = "new.php";
                break;
              }
              default: {
                $file = "list.php";
                break;
              }
            }
          }
          include $file;
          ?>
        </td>
      </tr>
    </table>
  </body>
</html>
