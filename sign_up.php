<?php
  session_start();

  if(isset($_SESSION['id_check']))
  {
    $id_check = $_SESSION['id_check'];
    if($id_check == true) {
      echo '<script>alert("중복된 아이디입니다.")</script>';
      session_unset();
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Sign Up Page</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/cloud/style.css">
</head>

<body class = "main">
  <p><b>새로운 계정</b></p>
  <form action="process.php" method="post">
    <p><label>아 이 디 : </label><input type="text" name="sign_up_username" required></p>
    <p><label>패스워드 : </label><input type="password" name="sign_up_password" required></p>
    <input type="submit" value="회원가입">
  </form>
  <a href="http://localhost/cloud/main.php">홈으로</a>
</body>

</html>
