<?php 
require_once 'inc/classes/class.Quiz.php';

$quiz = new Quiz();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="inc/css/usermanagement.css">
        <link rel="stylesheet" href="inc/css/style.css">
        <script type="text/javascript" src="js/script.js"></script>
        <title>Fahrschulquiz</title>
    </head>
    <body>
        <h1>Fahrschulquiz</h1>
        
        <?php
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
    </body>
</html>