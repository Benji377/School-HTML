<?php
class UserList {

  public function addUser($user) {
    $ret = false;
    $con = new MySQLi("localhost", "root", "", "users");
    if ($con->connect_errno) {
      // Meldung wird bereits ausgegeben bzw. in den Log geschrieben
      // Skript wird nicht abgebrochen
    } else {
      $sql = "
      INSERT INTO users(uusername, upassword, umale, ubirthdate,
      urating, uimagetype, uimagesize, uimage)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?);
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        // Meldung muss händisch geworfen werden
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->bind_param("ssisdsib", $username, $password, $male,
        $birthDate, $rating, $imageType, $imageSize, $null);
        $username = $user->getUsername();
        $password = password_hash(
          $user->getPassword(), PASSWORD_DEFAULT);
          $male = $user->getMale();
          $birthDate = $user->getBirthDate();
          $rating = $user->getRating();
          $imageType = $user->getImageType();
          $imageSize = $user->getImageSize();
          $null = null;
          $stmt->send_long_data(7, $user->getImage());
          $stmt->execute();
          if ($con->errno) {
            if ($con->errno == 1062)
            $user->setError(
              "username", "Benutzername bereits vergeben");
              else
              trigger_error($con->error, E_USER_WARNING);
            } else {
              echo "Anzahl eingetragene Datensätze ".$stmt->affected_rows;
              echo "Primärschlüssel neuer Benutzer ".$stmt->insert_id;
              $ret = true;
            }
            $stmt->close();
          }
          $con->close();
        }
        return $ret;
      }

  public function updateUser($oldUsername, $user) {
    $ret = false;
    $con = new MySQLi("localhost", "root", "", "users");
    if (!$con->connect_errno) {
      $sql = "
      UPDATE users
      SET uusername = ?, upassword = ?, umale = ?, ubirthdate = ?, urating = ?,
      uimagetype = ?, uimagesize = ?, uimage = ?
      WHERE uusername = ?;
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        // Meldung muss händisch geworfen werden
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->bind_param("ssisdsibs", $username, $password, $male,
        $birthDate, $rating, $imageType, $imageSize, $null, $oldUsername);
        $username = $user->getUsername();
        $password = password_hash(
          $user->getPassword(), PASSWORD_DEFAULT);
          $male = $user->getMale();
          $birthDate = $user->getBirthDate();
          $rating = $user->getRating();
          $imageType = $user->getImageType();
          $imageSize = $user->getImageSize();
          $null = null;
          $stmt->send_long_data(7, $user->getImage());
          $stmt->execute();
          if ($con->errno) {
            if ($con->errno == 1062)
            $user->setError(
              "username", "Benutzername bereits vergeben");
              else
              trigger_error($con->error, E_USER_WARNING);
            } else {
              echo "Anzahl eingetragene Datensätze ".$stmt->affected_rows;
              echo "Primärschlüssel neuer Benutzer ".$stmt->insert_id;
              $ret = true;
            }
            $stmt->close();
          }
          $con->close();
        }
        return $ret;
  }

  public function getUsers() {
    $ret = array();
    $con = new MySQLi("localhost", "root", "", "users");
    if (!$con->connect_errno) {
      $sql = "
      SELECT uusername, upassword, umale, ubirthdate, urating,
      uimagetype, uimagesize, uimage
      FROM users;
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username, $password, $male, $birthDate,
        $rating, $imageType, $imageSize, $image);
        while ($stmt->fetch()) {
          $user = new ValidableUser($username, null, null, $male,
          $birthDate, $rating, $imageType, $imageSize, $image);
          $ret[] = $user;
        }
        $stmt->close();
      }
      $con->close();
    }
    return $ret;
  }

  public function getUser($username) {
    $ret = null;
    $con = new MySQLi("localhost", "root", "", "users");
    if (!$con->connect_errno) {
      $sql = "
      SELECT uusername, upassword, umale, ubirthdate, urating,
      uimagetype, uimagesize, uimage
      FROM users
      WHERE uusername = ?;
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username, $password, $male, $birthDate,
        $rating, $imageType, $imageSize, $image);
        if ($stmt->fetch()) {
          $user = new ValidableUser($username, null, null, $male,
          $birthDate, $rating, $imageType, $imageSize, $image);
          $ret = $user;
        }
        $stmt->close();
      }
      $con->close();
    }
    return $ret;
  }

  public function deleteUser($username) {
    $ret = false;
    $con = new MySQLi("localhost", "root", "", "users");
    if (!$con->connect_errno) {
      $sql = "
      DELETE FROM users
      WHERE uusername = ?;
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
        $ret = true;
      }
    $con->close();
  }
  return $ret;
}

  public function getImage($username) {
    $ret = null;
    $con = new MySQLi("localhost", "root", "", "users");
    if (!$con->connect_errno) {
      $sql = "
      SELECT uimage
      FROM users
      WHERE uusername = ?;
      ";
      $stmt = $con->prepare($sql);
      if ($con->errno) {
        trigger_error($con->error, E_USER_WARNING);
      } else {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($image);
        if ($stmt->fetch()) {
          $ret = $image;
        }
        $stmt->close();
      }
      $con->close();
    }
    return $ret;
  }

  public static function authUser($username, $password) {
    // Wenn Username und Password noch nicht gesetzt wurden wird es gesetzt, danach
    // wird nur noch kontrolliert ob es auch übereinstimmt
    $ret = false;
    if (isset($_GET["loginUsername"]) && isset($_GET["loginPassword"])) {
      if ($username == $_GET["loginUsername"] && $password == $_GET["loginPassword"]) {
        $ret = true;
      }
    } else {
      $_GET["loginUsername"] = $username;
      $_GET["loginPassword"] = $password;
      $ret = true;
    }
    return true;
  }
}
