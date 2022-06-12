<table width="100%">
    <tr>
        <td class="left-align"><button>Quiz fertigstellen</button></td>
        <td class="middle-align">
        <?php
            // Mithilfe der Klasse Quiz solll ein Array geholt werden wo alle beantworteten Fragen drin stehen
            if ($quiz.getNumberAnsweredQuestions() > 0) {
                $to_print = '<p>Beantwortet:';
                
                for ($i = 1; $i <= $quiz.getNumberAnsweredQuestions(); $i++) {
                    $to_print = $to_print . ' ' . $i;
                }
                
                echo $to_print . '</p>';
            } else {
                echo '<p>Beantwortet: Keine Fragen beantwortet</p>';
            }
        ?>
        <p>Nicht beantwortet: 1 2 3 4 5 6 7 8</p>
        </td>
        <td class="right-align"><button>Vorige Frage</button><button>Nächste Frage</button></td>
    </tr>
</table>