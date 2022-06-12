<?php 
require_once 'inc/classes/class.Answer.php';
require_once 'inc/classes/class.Question.php';

class Quiz
{
  /*
   * Konstanten
   */
  public const QUESTIONS_COUNT = 10;
  public const ANSWERS_COUNT = 3;
  public const MINIMUM_PERCENT = 86.6666;
  
	/**
	 * Hier wird die Fragenummer der aktuellen Frage gemerkt. Die Fragen werden
	 * mit 0 beginnend nummeriert
	 */
	private $actualQuestionNumber = -1;
	/**
	 * Hier wird gemerkt, ob das Quiz fertiggestellt bzw. abgegeben wurde
	 */
	private $completed = false;
	/**
	 * Enthält die für das Quiz ausgewählten Fragen
	 */
	private $questions = null;
	
	/*
	 * Konstruktoren
	 */
	/**
	 * Legt Quiz an und holt sich dabei Fragen zufällig aus der Datenbank
	 * und schreibt diese in das Fragen-Array hinein
	 */
	public function __construct() {
        $ret = array();
        $con = new MySQLi("localhost", "root", "", "quiz");
        if ($con->connect_errno) {
          // Meldung wird bereits ausgegeben bzw. in den Log geschrieben
          // Skript wird nicht abgebrochen
        } else {
            // Hole in zufälliger Reihenfolge eine bestimmte Anzahl an Fragen
          $sql = "
          SELECT * FROM fragen ORDER BY RAND() LIMIT ?;
          ";
          $stmt = $con->prepare($sql);
          if ($con->errno) {
            trigger_error($con->error, E_USER_WARNING);
          } else {
              // Übergebe die Paramater und deklariere die Variablen
            $stmt->bind_param("i", $this->QUESTIONS_COUNT);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($fragenummer, $fragetext, $bild);
            while ($stmt->fetch()) {
                echo "hallo";
                // Für jede Frage sollen alle Antworten dazu gebunden werden
                $ans_array = array();
                $sql = "
                SELECT * FROM antworten ORDER BY RAND() WHERE fragenummer = ?;
                ";
                $stmt = $con->prepare($sql);
                if ($con->errno) {
                    trigger_error($con->error, E_USER_WARNING);
                } else {
                    $stmt->bind_param("i", $fragenummer);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($antwortnummer, $antworttext, $richtig);
                    // Antworten zu der Frage werden in Array abgespeichert
                    while ($stmt->fetch()) {
                        $antwort = new Answer($antworttext, $richtig);
                        $ans_array[] = $antwort;
                    }
                }
                // Neue Frage mit Text, Bildname und Array an Antworten
              $frage = new Question($fragetext, $bild, $ans_array);
              $this->actualQuestionNumber += 1;
              $ret[] = $frage;
            }
            $stmt->close();
          }
          $con->close();
        }
        // Zurück kommt ein Array an Fragen
        $this->questions = $ret;
	}
	
	/*
	 * Getter- und Settermethoden
	 */
	/**
	 * Liefert die Nummer der aktuellen Frage zurück
	 * @return 
	 */
	public function getActualQuestionNumber() {
	  return $this->actualQuestionNumber;
	}
	/**
	 * Setzt die Nummer der aktuellen Frage
	 * @param 
	 */
	public function setActualQuestionNumber($actualQuestionNumber) {
        $this->actualQuestionNumber = $actualQuestionNumber;
	}
	/**
	 * Springt zur nächsten Frage die zur aktuellen Frage wird
	 * @return
	 */
	public function nextQuestion() {
        if ($this->getHasNextQuestion()) {
            return $this->questions[$this->actualQuestionNumber++];
        }
	}
	/**
	 * Springt zur vorigen Frage die zur aktuellen Frage wird
	 * @return
	 */
	public function previousQuestion() {
        if ($this->getHasPreviousQuestion()) {
            return $this->questions[$this->actualQuestionNumber--];
        }
	}
	/**
	 * Liefert die Anzahl der Fragen des Quiz zurück
	 * @return 
	 */
	public function getNumberQuestions() {
        return count($this->questions);
	}
	/**
	 * Liefert die aktuelle Frage zurück
	 * @return 
	 */
	public function getActualQuestion() {
        if ($this->questions[$this->actualQuestionNumber]) {
            return $this->questions[$this->actualQuestionNumber];
        }
	}
	/**
	 * Liefert true zurück, falls nach der aktuellen Frage noch eine weitere
	 * Frage im Quiz existiert
	 * @return 
	 */
	public function getHasNextQuestion() {
        $ret = false;
        if ($this->questions[$this->actualQuestionNumber++]) {
            $ret = true;
        }
        return $ret;
	}
	/**
	 * Liefert true zurück, falls vor der aktuellen Frage noch eine Frage
	 * im Quiz vorhanden ist
	 * @return 
	 */
	public function getHasPreviousQuestion() {
        $ret = false;
        if ($this->questions[$this->actualQuestionNumber--]) {
            $ret = true;
        }
        return $ret;
	}
	/**
	 * Liefert die ganzen Fragen des Quiz zurück
	 * @return 
	 */
	public function getQuestions() {
        return $this->questions;
	}
	/**
	 * Liefert die Anzahl der beantworteten Fragen des Quiz zurück
	 * @return 
	 */
	public function getNumberAnsweredQuestions() {
        $ret = 0;
        for ($i = 0; $i < count($this->questions); $i++) {
            if ($this->questions[$i].getAnswered()) {
                $ret++;
            }
        }
        return $ret;
	}
	/**
	 * Liefert die Anzahl der nicht beantworteten Fragen des Quiz zurück
	 * @return 
	 */
	public function getNumberUnansweredQuestions() {
        $ret = 0;
        for ($i = 0; $i < count($this->questions); $i++) {
            if ($this->questions[$i].getAnswered()) {
                $ret++;
            }
        }
        return $ret;
	}
	/**
	 * Das Quiz wird fertiggestellt
	 * @param 
	 */
	public function setCompleted($completed) {
        $this->completed = $completed;
	}
	/**
	 * Kontrolliert ob das Quiz fertiggestellt wurde
	 * @return
	 */
	public function getCompleted() {
        return $this->completed;
	}
	/**
	 * Liefert die Anzahl der richtig gesetzten Antwortmöglichkeiten zurück. Für
	 * jede richtige Antwort wird ein Punkt vergeben
	 * @return 
	 */
	public function getPoints() {
        $ret = 0;
        for ($i = 0; $i < count($this->questions); $i++) {
            for ($j = 0; $j < count($this->questions[$i].getAnswers()); $j++) {
                $ret += $this->questions[$i].getAnswers()[$j].getPoints();
            }
        }
        return $ret;
	}
	/**
	 * Liefert die insgesamt möglichen Punkte zurück. Pro Antwortmöglichkeit wird
	 * ein Punkt vergeben
	 * @return 
	 */
	public function getMaximalPoints() {
        $ret = 0;
        for ($i = 0; $i < count($this->questions); $i++) {
            $ret += count($this->questions[$i].getAnswers());
        }
        return $ret;
	}
	/**
	 * Ermittelt die Anzahl der richtig gesetzten Antworten in Prozent gerundet auf 2
	 * Kommastellen
	 * @return 
	 */
	public function getPointsInPercent() {
        $ret = 0;
        $points = ($this->getPoints() / $this->getMaximalPoints()) * 100;
        $ret = round($points, 2);
        return $ret;
	}
	/**
	 * Liefert zurück ob das Quiz bestanden wurde oder nicht. Ein Quiz kann nur
	 * bestanden werden, falls es fertiggestellt wurde und falls MINIMUM_PERCENT 
	 * der Punkte erzielt werden konnten
	 * @return 
	 */
	public function getPassed() {
        $ret = false;
        if ($this->getCompleted && $this->getPointsInPercent > $this->MINIMUM_PERCENT) {
            $ret = true;
        }
        return $ret;
	}
}
