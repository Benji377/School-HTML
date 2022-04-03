<?php

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

function translate($value) {
  global $lang;
  if (!isset($lang)) {
    $lang = "en";
  }

  $en = array("Name", "Value", "Parameter", "Index", "Language",
  "Your last access", "For the first time here");
  $it = array("Nome", "Valore", "Parametro", "Indice", "Lingua",
  "Il tuo ultimo accesso", "Per la prima volta sul sito");
  $de = array("Name", "Wert", "Parameter", "Index", "Sprache",
  "Ihr letzte Zugriff erfolgte", "Zum ersten Mal auf der Seite");

  $id = null;
  $word = $value;
  foreach($en as $key => $arr) {
      if($arr == $value) {
          $id = $key;
          break;
      }
  }
  if (!is_null($id)) {
    if ($lang == "it") {
      $word = $it[$id];
    } elseif ($lang == "de") {
      $word = $de[$id];
    }
  }
  return $word;
}
 ?>
