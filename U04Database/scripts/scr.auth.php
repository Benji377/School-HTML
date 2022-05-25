<?php
const IDS_LOGIN_NOT_NECESSARY = ["1"];
if (isset($_GET["id"])) {
  if ($_GET["id"] == 101) {
    // Logout
    session_destroy();
    header("Location:index.php");
    // Bricht Abarbeitung des Skripts ab
    exit();
  } else {
    if (array_search($_GET["id"], IDS_LOGIN_NOT_NECESSARY, true) === false && !isset($_SESSION["loginUsername"])) {
      // Benutzer muss sich für gewünschte Operation auth.
      // und hat sich noch nicht authentifiziert
      if (!isset($_SESSION["requested_id"])) {
        // Für Benutzer wurde noch nie login.php aufgerufen
        // Merke welche id und Parameter Benutzer angefordert hat
        foreach ($_GET as $key => $value)
          $_SESSION["requested_" . $key] = $value;
        header("Location:login.php");
      } else {
        // Für Benutzer wurde login.php aufgerufen
        // Kontrolliere ob Benutzername und Passwort passen
        $username = filter_input(INPUT_POST, "loginUsername", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "loginPassword", FILTER_SANITIZE_STRING);
        if (!UserList::authUser($username, $password)) {
          $_SESSION["loginError"] = true;
          header('Location:login.php');
        } else {
          // Benutzername und Passwort passen
          $_SESSION["loginUsername"] = $username;
          unset($_SESSION["loginError"]);
          if ($_SESSION["requested_id"] == "100")
            unset($_SESSION["requested_id"]);
          $params = "";
          foreach ($_SESSION as $key => $value)
            if (strpos($key, "requested_") === 0) {
              if (!empty($params))
                $params .= "&";
              else
                $params = "?";
              $params .= substr($key, 10) . "=" . $value;
              unset($_SESSION[$key]);
            }
          header("Location:index.php" . $params);
        }
      }
      exit();
    }
  }
}
