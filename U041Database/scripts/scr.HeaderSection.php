<table width="100%">
    <tr>
        <!-- TODO: Form soll submitted werden und PHP soll den Quiz als beendet markieren. Javascript? -->
        <td class="left-align">
            <input type="button" value="Quiz fertigstellen">
        </td>
        <td class="middle-align">
        <?php
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
                $to_print = '<p>Nicht Beantwortet:';
                
                for ($i = 1; $i <= $quiz->getNumberUnansweredQuestions(); $i++) {
                    $to_print = $to_print . ' ' . $i;
                }
                // Gleiche wie oben, aber mit nicht beantworteten Fragen
                echo $to_print . '</p>';
            } else {
                echo '<p>Alle Fragen beantwortet</p>';
            }
        ?>
        </td>
        <!-- TODO: Mittels PHP soll man zur nächsten Frage gelangen. Javascript onClick?  -->
        <td class="right-align">
            <input type="submit" name="prevq" value="Vorige Frage">
            <input type="submit" name="nextq" value="Nächste Frage">
        </td>
    </tr>
</table>