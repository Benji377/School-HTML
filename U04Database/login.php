<?php session_start(); ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="inc/css/usermanagement.css">
    <title>Login</title>
  </head>
  <body>
    <a href="index.php?id=1">Zurück</a>
    <form name="loginForm" method="post" action="index.php?id=2" enctype="multipart/form-data">
      <table>
        <tr>
          <td><label>Benutzername:</label></td>
          <td>
            <input type="text" name="loginUsername" value="">
          </td>
          <td class="error">
            <?php if (isset($_SESSION["loginError"]) && $_SESSION["loginError"]) {
              printf("Error: Username or password incorrect");
            }?>
          </td>
        </tr>
        <tr>
          <td><label>Passwort:</label></td>
          <td>
            <input type="password" name="loginPassword" value="">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="Login">
            <input type="reset" name="reset" value="Zurücksetzen">
          </td>
          <td></td>
        </tr>
      </table>
    </form>
  </body>
</html>
