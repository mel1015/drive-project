<?php
  require("config/config.php");
  require("lib/db.php");

  session_start();

  $conn = db_init($config["host"], $config["duser"],
    $config["dpw"], $config["dname"]);
  mysqli_select_db($conn, "cloud");
  $result = mysqli_query($conn, "SELECT * FROM user");

  //Escaping
  $name = mysqli_real_escape_string($conn, $_POST['sign_up_username']);
  $password = mysqli_real_escape_string($conn, $_POST['sign_up_password']);

  while($row = mysqli_fetch_assoc($result))
  {
    $id_check = false;
    if($row['name'] === $name)
    {
      $id_check = true;
      break;
    }
  }
  if($id_check != true)
  {
    $sql = "INSERT INTO user (name,password)
      VALUES('".$name."', '".$password."')";
    $result = mysqli_query($conn, $sql);

    header('Location: http://localhost/cloud/main.php');
  }
  if($id_check == true)
  {
    header('Location: http://localhost/cloud/sign_up.php');
  }
  $_SESSION['id_check'] = $id_check;
?>
