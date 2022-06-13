<table width="100%">
    <tr>
        <td class="left-align"><button>Quiz fertigstellen</button></td>
        <td class="middle-align">
        <?php
            // Mithilfe der Klasse Quiz solll ein Array geholt werden wo alle beantworteten Fragen drin stehen
            if ($quiz->getNumberAnsweredQuestions() > 0) {
                $to_print = '<p>Beantwortet:';
                
                for ($i = 1; $i <= $quiz->getNumberAnsweredQuestions(); $i++) {
                    $to_print = $to_print . ' ' . $i;
                }
                echo $to_print . '</p>';
            } else {
                echo '<p>Beantwortet: Keine Fragen beantwortet</p>';
            } 
            if ($quiz->getNumberUnansweredQuestions() > 0) {
                $to_print = '<p>Nicht Beantwortet:';
                
                for ($i = 1; $i <= $quiz->getNumberUnansweredQuestions(); $i++) {
                    $to_print = $to_print . ' ' . $i;
                }
                echo $to_print . '</p>';
            } else {
                echo '<p>Alle Fragen beantwortet</p>';
            }
        ?>
        </td>
        <td class="right-align"><button>Vorige Frage</button><button>Nächste Frage</button></td>
    </tr>
</table>