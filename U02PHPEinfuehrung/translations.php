<?php
// Enthält die Übersetzunge, wobei davon ausgeht dass English die primäre Sprache ist

/*
Es funktioniert folgendermaßen: Es sucht sich das übergebene Wort im eng-Array
und wenn er es findet, ermittelt er den Index daraus. Nun sucht er das Wort mit dem
entsprechendem Index in das Array in der sich das übersetzte Wort befindet ist.
Gleiche Wörter haben deswegen den gleichen Index.

Wenn ein Wort nicht gefunden wird, wird es nicht übersetzt
*/

// Der Funktion wird ein Wort in englisch übergeben
function translate($value) {
  // Ermittelt die momentan ausgewählte Sprache
  // $lang = "it";
  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  // Wenn aus irgendeinem Grund die Sprache nicht gesetzt wurde,
  // wird Englisch verwendet
  if (!isset($lang)) {
    $lang = "en";
  }

  // Array mit allen Übersetzungen. Übersetzungen müssen in alle Arrays den gleichen
  // Index haben!
  $en = array("Name", "Value", "Parameter", "Index", "Language",
  "Your last access", "For the first time here", "Cookies set",
  "Delete", "List", "New", "Delete all", "Lifespan", "Create",
  "Reset", "Seconds", "Minute", "Minutes", "Hour", "Days",
  "Dies when the Browser gets closed", "Cookie Error",
  "You need to fill out the whole form", "Back", "Cookie successfull",
  "Cookie has been created", "Back to the Cookiemanager", "Delete cookie?",
  "Delete all cookies?");

  $it = array("Nome", "Valore", "Parametro", "Indice", "Lingua",
  "Il tuo ultimo accesso", "Per la prima volta sul sito", "Cookies aggiunti",
  "Cancellare", "Lista", "Nuovo", "Cancella tutti", "Durata di vita",
  "Creare", "Resettare", "Secondi", "Minuto", "Minuti", "Ora", "Giorni",
  "Muore quando il browser si chiude", "Errore Cookie",
  "Devi compilare tutto il form", "Indietro", "Cookie successo",
  "Cookie è stato creato", "Ritorna al CookieManager", "Cancellare il cookie?",
  "Cancellare tutti i cookie?");

  $de = array("Name", "Wert", "Parameter", "Index", "Sprache",
  "Ihr letzte Zugriff erfolgte", "Zum ersten Mal auf der Seite", "Cookies gesetzt",
  "Löschen", "Liste", "Neu", "Alle löschen", "Lebensdauer", "Erstellen",
  "Zurücksetzen", "Sekunden", "Minute", "Minuten", "Stunde", "Tage",
  "Stirbt wenn der Browser geschlossen wird", "Cookie Fehler",
  "Du musst das ganze Formular ausfüllen", "Zurück", "Cookie erfolgreich",
  "Cookie wurde erstellt", "Zurück zum CookieManager", "Cookie löschen?",
  "Alle cookies löschen");

  // Sucht das übergeben Wort und definiert somit den Index
  $index = null;
  $word = $value;
  foreach($en as $key => $arr) {
      if($arr == $value) {
          $index = $key;
          break;
      }
  }
  // Je nach Sprache wird mittels Index das übersetzte Wort gesucht
  if (!is_null($index)) {
    if ($lang == "it") {
      $word = $it[$index];
    } elseif ($lang == "de") {
      $word = $de[$index];
    }
  }
  return $word;
}
 ?>
