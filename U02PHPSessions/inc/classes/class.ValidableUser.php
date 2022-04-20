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
      $errors += array($fieldname => $errormessage);
    }
  }

  public function validate() {
    if(empty(parent::getUsername())){
      $this->errors += array('username' =>"Der Benutzername muss eingegeben werden");
    }
    if(empty(parent::getPassword())){
      $this->errors += array('password' =>"Das Passwort muss eingegeben werden");
    }
    if(empty(parent::getBirthdate())){
      $this->errors += array('birthDate' =>"Das Geburtsdatum muss eingegeben werden");
    }
    if (parent::getPassword()!=parent::getPasswordRepeat()) {
      $this->errors += array('passwordRepeat' =>"Das erste und das zweite Password müssen übereinstimmen");
    }
    $dateAsObject=DateTime::createFromFormat("Y-m-d",parent::getBirthdate());
    if (DateTime::getLastErrors()["warning_count"] != 0 || DateTime::getLastErrors()["error_count"] != 0) {
      $this->errors = array('birthDate'=> "Geburtsdatum im falschen Format eingegeben");
    }
    if(!(parent::getRating()>=1 && parent::getRating()<=5)){
      $this->errors += array('rating' => "Die Bewerttung muss zwischen 1 und 5 liegen");
    }
    if(parent::getImageSize()>parent::MAX_IMAGE_SIZE){
      $this->errors += array('imageSize'=>"Das Bild ist zu groß");
    }
  }

}
?>
