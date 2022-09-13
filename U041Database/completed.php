<h2>Auswertung</h2>

<p>Von .. möglichen Punkte haben Sie .. erreicht. Das sind .. Prozent. Sie haben den Test ..</p>
<hr>

<!-- Für jede Frage kommt eine Frage - Sektion und eine Antwort - Sektion -->
<table width="100%">
    <tr>
        <td>
            <?php
                echo '<h3>Frage ' . $quiz->getActualQuestionNumber() . ' von ' . $quiz->getNumberQuestions() . '</h3>';
            ?>
        </td>
        <td class="right-align">
            <?php
                if ($quiz->getActualQuestion()->getImageFilename()) {
                    echo '<img src="images/' . $quiz->getActualQuestion()->getImageFilename() . '">';
                }
            ?>
        </td>
    </tr>
    <tr>
        <?php
            echo '<td>' . $quiz->getActualQuestion()->getQuestionText() . '</td>';
            echo '<td class="right-align">' . $quiz->getActualQuestion()->getImageText() . '</td>';
        ?>
    </tr>
</table>

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