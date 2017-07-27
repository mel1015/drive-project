<?php
  session_start();   //세션의 시작

  $conn = mysqli_connect('localhost', 'root', 4987);
  mysqli_select_db($conn, "cloud");
  $result = mysqli_query($conn, "SELECT * FROM data");

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $check = true;

    while($row = mysqli_fetch_assoc($result)) {

      if($row['username'] == $myusername &&
      $row['password'] == $mypassword) {

        $_SESSION['myusername']=$myusername;
        header('Location: http://localhost/cloud/welcome.php');
      }
      else {
        $check = false;
      }
    }
    if($check == false)
    {
      echo '<script>alert("틀린 입력입니다.")</script>';
    }
    // header('Location: http://localhost/cloud/main.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/cloud/style.css">
</head>

<body class = "main">
  <p><b>아이디와 패스워드를 입력해주세요</b></p>
  <form action="" method="post">
    <p><label>아 이 디 : </label><input type="text" name="username" required></p>
    <p><label>패스워드 : </label><input type="password" name="password" required></p>
    <input type="submit" value="로그인">
    <input type="button" value="회원가입"
      onclick="location.href='http://localhost/cloud/sign_up.php'">
  </form>

</body>

</html>
