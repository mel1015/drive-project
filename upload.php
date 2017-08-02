<?php
  $source = $_FILES['profile']['tmp_name'];
  $dest = "./user/shin/".basename($_FILES['profile']['name']);
  move_uploaded_file($source, $dest);
  header('Location: http://localhost/cloud/welcome.php');
?>
