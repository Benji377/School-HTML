<input type="hidden" name="questionNumber" value="">
<table width="100%">
    <tr>
        <td class="left-align">
            <input type="submit" name="quizend" value="Quiz fertigstellen">
        </td>
        <td class="middle-align">
        <?php
            // Wenn noch keine Nummer gesetzt wurde, sind wir am Anfang des Quizes und
            // setzen somit die Zahl auf 0
            if (empty($quiz->getActualQuestionNumber())) {
                $quiz->setActualQuestionNumber(0);
            }
            
            // Kontrolliert ob $_GET variable gesetzt ist und setzt somit die qZahl neu
            if (isset($_GET["prevq"]) && $quiz->getActualQuestionNumber() > 0) {
                $quiz->previousQuestion();
            } else if (isset($_GET["nextq"]) && $quiz->getActualQuestionNumber() < ($quiz::QUESTIONS_COUNT - 1)) {
                $quiz->nextQuestion();
            }
            
            // Mithilfe der Klasse Quiz solll ein Array geholt werden wo alle beantworteten Fragen drin stehen
            if ($quiz->getNumberAnsweredQuestions() > 0) {
                $to_print = '<p>Beantwortet:';
                
                for ($i = 1; $i <= $quiz->getNumberAnsweredQuestions(); $i++) {
                    $to_print = $to_print . ' ' . $i;
                }
                // Bildet ein String mit den Nummern von beantworteten Fragen
                // TODO: Aus Zahlen sollen klickbare Links werden
                echo $to_print . '</p>';
            } else {
                echo '<p>Beantwortet: Keine Fragen beantwortet</p>';
            } 
            if ($quiz->getNumberUnansweredQuestions() > 0) {
                echo '<p>Nicht Beantwortet:</p>';
                
                for ($i = 1; $i <= $quiz->getNumberUnansweredQuestions(); $i++) {
                    echo '<a href="javascript:questionLink('. $quiz->getActualQuestionNumber() .')" >'. $i .' </a>';
                }
            } else {
                echo '<p>Alle Fragen beantwortet</p>';
            }
        ?>
        </td>
        <td class="right-align">
            <button name="prevq" onclick="questionLink(1)">Vorherige Frage</button>
            <button name="nextq" onclick="questionLink(<?php echo $quiz->getActualQuestionNumber(); ?>)">Nächste Frage</button>
        </td>
    </tr>
</table>