<?php
require_once 'inc/classes/class.ValidableUser.php';
require_once 'inc/classes/class.UserList.php';

define("MAX_INACTIVITY_SECOND", 600); // Erstellt eine Konstante
ini_set('session.gc_maxlifetime', MAX_INACTIVITY_SECOND); // Setzt die maximale Lebensdauer der session
session_start();
// KOntrolliert ob die session verfallen ist
if (isset($_SESSION['expiry']) && (time() - $_SESSION['expiry'] > MAX_INACTIVITY_SECOND)) {
    session_unset();
    session_destroy();
}
// Setzt den jetzigen Zeitpunkt
$_SESSION['expiry'] = time();

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="inc/css/usermanagement.css">
    <title>Benutzerliste</title>
  </head>
  <body>
    <a href="index.php?id=1">Benutzerliste</a>
    <a href="index.php?id=2">Neuer Benutzer</a>
    <?php if (isset($_SESSION["loginUsername"])) {
      echo '<a href="index.php?id=101">Logout</a>';
      echo '<a style="text-decoration: none"> Sie sind eingeloggt als Benutzer <b>' . $_SESSION["loginUsername"] . '</b></a>';
    } else {
      echo '<a href="index.php?id=100">Login</a>';
      echo '<a style="text-decoration: none"> Sie sind nicht eingeloggt</a>';
    } ?>
    <?php
    if (!isset($_SESSION["userList"])) {
      $_SESSION["userList"] = new UserList();
    }
    $userList = $_SESSION["userList"];

    if (!isset($_SESSION["user"])) {
      $_SESSION["user"] = new ValidableUser();
    }
    $user = $_SESSION["user"];
// Zeigt Benutzerliste an
    if (!isset($_GET["id"]) || $_GET["id"] == "1") {
      require_once 'scripts/scr.auth.php';
      require_once 'scripts/scr.userList.php';
// Fügt neuen Benutzer hinzu
    } elseif ($_GET["id"] == "2") {
      require_once 'scripts/scr.auth.php';
      $user = new ValidableUser();
      $_SESSION["user"] = $user;
      require_once 'scripts/scr.userForm.php';
// Validiert und trägt neuer Benutzer in der Liste ein
    } elseif ($_GET["id"] == "20") {
      require_once 'scripts/scr.auth.php';
      $user->setUsername(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
      $user->setPassword(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
      $user->setPasswordRepeat(filter_input(INPUT_POST, "passwordRepeat", FILTER_SANITIZE_STRING));
      $user->setMale(filter_input(INPUT_POST, "male", FILTER_VALIDATE_BOOLEAN));
      $user->setBirthDate(filter_input(INPUT_POST, "birthDate", FILTER_SANITIZE_STRING));
      $user->setRating(filter_input(INPUT_POST, "rating", FILTER_VALIDATE_FLOAT));
      $user->setImageFromSuperglobal($_FILES["image"]);
      $user->validate();
      if ($user->getErrors() != null || !$userList->addUser($user)) {
        require_once 'scripts/scr.userForm.php';
      } else {
        require_once 'scripts/scr.userList.php';
      }
// Bearbeitet den Benutzer
    } elseif ($_GET["id"] == "3") {
      require_once 'scripts/scr.auth.php';
      if (!isset($_GET["username"])||strlen($_GET["username"]) == 0) {
        require_once 'scripts/scr.userList.php';
      } else {
        $user = $userList->getUser($_GET["username"]);
        if (!$user) {
          require_once 'scripts/scr.userList.php';
        } else {
          $_SESSION["user"] = $user;
          require_once 'scripts/scr.userForm.php';
        }
      }
// Validiert den bearbeiteten Benutzer und trägt es in der Liste ein
    } elseif ($_GET["id"] == "30") {
      require_once 'scripts/scr.auth.php';
      $oldUsername = $user->getUsername();
      $user->setUsername(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
      $user->setPassword(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
      $user->setPasswordRepeat(filter_input(INPUT_POST, "passwordRepeat", FILTER_SANITIZE_STRING));
      $user->setMale(filter_input(INPUT_POST, "male", FILTER_VALIDATE_BOOLEAN));
      $user->setBirthDate(filter_input(INPUT_POST, "birthDate", FILTER_SANITIZE_STRING));
      $user->setRating(filter_input(INPUT_POST, "rating", FILTER_VALIDATE_FLOAT));
      if (isset($_FILES["image"]))
        $user->setImageFromSuperglobal($_FILES["image"]);
      $user->validate();
      if ($user->getErrors() != null || !$userList->updateUser($oldUsername, $user)) {
        require_once 'scripts/scr.userForm.php';
      } else {
        require_once 'scripts/scr.userList.php';
      }
// Löscht das Bild vom Form über PHP
    } elseif ($_GET["id"] == "31") {
      require_once 'scripts/scr.auth.php';
      $user->deleteImage();
      require_once 'scripts/scr.userForm.php';
// Löscht den Benutzer aus der Liste
    } elseif ($_GET["id"] == "4") {
      require_once 'scripts/scr.auth.php';
      if (isset($_GET["username"]) && strlen($_GET["username"]) > 0) {
        $username = filter_input( INPUT_GET, "username", FILTER_SANITIZE_STRING);
        if ($userList->deleteUser($username)) {
          unset($_SESSION["user"]);
          unset($user);
        }
      }
      require_once 'scripts/scr.userList.php';
    } elseif ($_GET["id"] == "100" || $_GET["id"] == "101") {
      require_once 'scripts/scr.auth.php';
    }
    ?>
  </body>
</html>
