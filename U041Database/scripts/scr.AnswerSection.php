<form>
    <table width="100%">
        <tr>
            <th width="90%">Antworten</th>
            <th class="middle-align">Richtig</th>
            <th class="middle-align">Falsch</th>
        </tr>
        
        <?php 
        
            for ($i = 0; $i < count($quiz->getActualQuestion()->getAnswers()); $i++) {
                echo '<tr>';
                echo '<td>' . $quiz->getActualQuestion()->getAnswers()[$i]->getAnswerText() . '</td>';
                echo '<td class="middle-align"><input type="radio" id="true_'.$i.'" name="ans1" value="TRUE"></td>';
                echo '<td class="middle-align"><input type="radio" id="false_'.$i.'" name="ans1" value="FALSE"></td>';
                echo '</tr>';
            }
        
        ?>
    </table>
</form>