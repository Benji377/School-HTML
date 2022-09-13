<?php

if (isset($_POST["quizend"])) {
    // Quiz wurde beendet und Punkte werden vergeben
    header("Location: ../index.php?completed=yes");
} elseif (isset($_POST["prevq"])) {
    // Benutzer will zur vorherigen Frage springen
    header("Location: ../index.php?prevq");
} else if (isset($_POST["nextq"])) {
    // Benutzer will zur nächsten Frage springen
    header("Location: ../index.php?nextq");
}