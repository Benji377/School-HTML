<table width="100%">
    <tr>
        <td>
            <?php
                echo '<h2>Frage ' . $quiz->getActualQuestionNumber() . ' von ' . $quiz->getNumberQuestions();
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