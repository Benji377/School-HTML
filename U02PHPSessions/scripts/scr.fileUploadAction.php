<?php
  session_start();
  var_dump($_FILES);
  if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
    $type = $_FILES["image"]["type"];
    $size = $_FILES["image"]["size"];
    $fileHandler = fopen($_FILES["image"]["tmp_name"], "rb");
    $_SESSION["fileStream"] = fread($fileHandler, $_FILES["image"]["size"]);
    fclose($fileHandler);
  }
?>
<a href="fileUpload.php">Zurück</a>
