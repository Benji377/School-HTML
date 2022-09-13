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
            echo '<td class="middle-align"><input type="radio" name="ans_'.$i.'" value="TRUE"></td>';
            echo '<td class="middle-align"><input type="radio" name="ans_'.$i.'" value="FALSE"></td>';
            echo '</tr>';
        }
    ?>
</table>