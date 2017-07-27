<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', 4987);
  mysqli_select_db($conn, "cloud");
  $result = mysqli_query($conn, "SELECT * FROM data");

  while($row = mysqli_fetch_assoc($result)) {
    $id_check = false;
    if($row['username'] === $_POST['sign_up_username']) {
      $id_check = true;
      break;
    }
  }
  if($id_check != true) {
    $sql = "INSERT INTO data (username,password) VALUES('".$_POST['sign_up_username']."', '".$_POST['sign_up_password']."')";
    $result = mysqli_query($conn, $sql);
    header('Location: http://localhost/cloud/main.php');
  }
  if($id_check == true) {
    header('Location: http://localhost/cloud/sign_up.php');
  }
  $_SESSION['id_check']=$id_check;
?>
