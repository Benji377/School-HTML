<?php
require_once 'inc/classes/class.User.php';


class ValidableUser extends User {
  public $errors = array();

  public function getErrors() {
    return $this->errors;
  }

  public function getError($fieldname) {
    if (isset($this->errors[$fieldname])) {
      return $this->errors[$fieldname];
    }
  }

  public function setError($fieldname, $errormessage) {
    if(isset($this->errors[$fieldname])) {
      $this->errors[$fieldname] = $errormessage;
    } else {
      $this->errors += array($fieldname => $errormessage);
    }
  }

  public function validate() {
    if(empty(parent::getUsername())){
      $this->errors += array('username' =>"Der Benutzername muss eingegeben werden");
    } else {
      if (isset($this->errors['username'])) {
        unset($this->errors['username']);
      }
    }
    if(empty(parent::getPassword())){
      $this->errors += array('password' =>"Das Passwort muss eingegeben werden");
    } else {
      if (isset($this->errors['password'])) {
        unset($this->errors['password']);
      }
    }
    if(empty(parent::getBirthdate())){
      $this->errors += array('birthDate' =>"Das Geburtsdatum muss eingegeben werden");
    } else {
      if (isset($this->errors['birthDate'])) {
        unset($this->errors['birthDate']);
      }
    }
    if (parent::getPassword()!=parent::getPasswordRepeat()) {
      $this->errors += array('passwordRepeat' =>"Das erste und das zweite Password müssen übereinstimmen");
    } else {
      if (isset($this->errors['passwordRepeat'])) {
        unset($this->errors['passwordRepeat']);
      }
    }
    $dateAsObject=DateTime::createFromFormat("Y-m-d",parent::getBirthdate());
    if (DateTime::getLastErrors()["warning_count"] != 0 || DateTime::getLastErrors()["error_count"] != 0) {
      $this->errors = array('birthDate'=> "Geburtsdatum im falschen Format eingegeben");
    } else {
      if (isset($this->errors['birthDate'])) {
        unset($this->errors['birthDate']);
      }
    }
    if(!(parent::getRating()>=1 && parent::getRating()<=5)){
      $this->errors += array('rating' => "Die Bewerttung muss zwischen 1 und 5 liegen");
    } else {
      if (isset($this->errors['rating'])) {
        unset($this->errors['rating']);
      }
    }
    if(parent::getImageSize()>parent::MAX_IMAGE_SIZE){
      $this->errors += array('imageSize'=>"Das Bild ist zu groß");
    } else {
      if (isset($this->errors['imageSize'])) {
        unset($this->errors['imageSize']);
      }
    }
  }
}
?>
