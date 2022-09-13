<?php 
require_once 'inc/classes/class.Quiz.php';

// PROBLEM: Variable wird bei jedem submit nue gesetzt oder gelöscht.
// das verhindert das korrekte ausführen der Datei
session_start();
if (isset($_SESSION["quiz"])) {
    $quiz = $_SESSION["quiz"];
} else {
    $quiz = new Quiz();
    $_SESSION['quiz'] = $quiz; 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="inc/css/usermanagement.css">
        <link rel="stylesheet" href="inc/css/style.css">
        <title>Fahrschulquiz</title>
    </head>
    <body>
        <h1>Fahrschulquiz</h1>
        
        <?php if (isset($_GET["completed"])) {
            // Wenn ein Get flag gesetzt wird, soll das Ergebnis des Quiz gezeigt werden
            require_once './completed.php';
        } else {
        ?>
        <form name="questionForm" action="scripts/scr.FormAction.php" method="POST">
            
            <?php
                require_once 'scripts/scr.FormAction.php';
                require_once 'scripts/scr.HeaderSection.php';
            ?>
            <hr>
            <?php
                require_once 'scripts/scr.QuestionSection.php';
            ?>
            <hr>
            <?php
                require_once 'scripts/scr.AnswerSection.php';
            ?>
            <hr>
        </form>
        <script type="text/javascript" src="inc/js/script.js"></script>
        <?php } ?>
    </body>
</html>