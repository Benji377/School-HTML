<table width="100%">
    <tr>
        <th width="90%">Antworten</th>
        <th class="middle-align">Richtig</th>
        <th class="middle-align">Falsch</th>
    </tr>
        
    <?php 
        // Für jede Antwort im Array wird ein paragraph und zwei Radiobuttons generiert
        // Der Name der radiobuttons ist immer wie folgt:
        // ans_(nummer der aktuellen Frage)_(Nummer der aktuellen Antwort)
        $cu_nr = $quiz->getActualQuestionNumber();
        for ($i = 0; $i < count($quiz->getActualQuestion()->getAnswers()); $i++) {
            echo '<tr>';
            echo '<td>' . $quiz->getActualQuestion()->getAnswers()[$i]->getAnswerText() . '</td>';
            echo '<td class="middle-align">';
            // Wenn der Name im Post entahletn ist, wird er gesetzt, anosnten nicht
            if (isset($_POST["ans_'.$cu_nr.'_'.$i.'"]) && $_POST["ans_'.$cu_nr.'_'.$i.'"] == "TRUE") {
                echo '<input type="radio" name="ans_'.$cu_nr.'_'.$i.'" value="TRUE" checked>';
            } else {
                echo '<input type="radio" name="ans_'.$cu_nr.'_'.$i.'" value="TRUE" >';
            }
            echo '</td>';
            if (isset($_POST["ans_'.$cu_nr.'_'.$i.'"]) && $_POST["ans_'.$cu_nr.'_'.$i.'"] == "FALSE") {
                echo '<td class="middle-align"><input type="radio" name="ans_'.$cu_nr.'_'.$i.'" value="FALSE" checked></td>';
            } else {
                echo '<td class="middle-align"><input type="radio" name="ans_'.$cu_nr.'_'.$i.'" value="FALSE"></td>';
            }
            echo '</tr>';
        }
    ?>
</table>