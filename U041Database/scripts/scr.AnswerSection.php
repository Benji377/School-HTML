<table width="100%">
    <tr>
        <th width="90%">Antworten</th>
        <th class="middle-align">Richtig</th>
        <th class="middle-align">Falsch</th>
    </tr>
        
    <?php 
        // Für jede Antwort im Array wird ein paragraph und zwei Radiobuttons generiert
        for ($i = 0; $i < count($quiz->getActualQuestion()->getAnswers()); $i++) {
            echo '<tr>';
            echo '<td>' . $quiz->getActualQuestion()->getAnswers()[$i]->getAnswerText() . '</td>';
            // TODO: Buttons sollen status der Answerklasse updaten, wie?
            echo '<td class="middle-align"><input type="radio" id="true_'.$i.'" name="ans1" value="TRUE"></td>';
            echo '<td class="middle-align"><input type="radio" id="false_'.$i.'" name="ans1" value="FALSE"></td>';
            echo '</tr>';
        }
    ?>
</table>