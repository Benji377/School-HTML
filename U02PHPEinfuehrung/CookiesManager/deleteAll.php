<?php
// Ähnlich wie bei delete.php, werden hier aber alle Cookies gelöscht
$past = time() - 3600;
foreach ($_COOKIE as $key => $value) {
    setcookie($key, "", $past);
}

header('Location: index.php?id=1');
exit();
 ?>
