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
        <h1 style="float:left;">Fahrschulquiz</h1>
        
        <?php
        // Kontrolliert ob ein Benutzer eingeloggt ist oder nicht.
        // Zum Login und Logout wird die Benutzerliste der vorherigen Übung benutzt
        if (isset($_SESSION["loginUsername"])) {
            echo '<p style="float:right;"> Sie sind eingeloggt als <b>'. $_SESSION["loginUsername"] .'</b> <a href="../UserListe/index.php?id=101">Logout</a> </p>';
        } else {
            echo '<p style="float:right;"> Sie sind nicht eingeloggt <a href="../UserListe/index.php?id=100">Login</a></p>';
            // Setzt einen roten Text als Warnung dar
            echo '<p style="color:red; padding-top: 50px; padding-left: 25%;"><b>Ihre Antworten werden nicht gespeichert. Loggen Sie sich ein, wenn Sie das Quiz'
            . '<br>durchführen und auswerten lassen möchten.</b></p>';
        }
        
        if (isset($_GET["completed"])) {
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