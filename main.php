<?php
  require("config/config.php");
  require("lib/db.php");

  session_start();   //세션의 시작

  //데이터베이스 연결
  $conn = db_init($config["host"], $config["duser"],
    $config["dpw"], $config["dname"]);
  $result = mysqli_query($conn, "SELECT * FROM user");

  //POST를 이용해 전달해준 값이 있는지 확인 후
  //전달받은 아이디랑 비밀번호로 로그인
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $check = true;

    while($row = mysqli_fetch_assoc($result))
    {
      if($row['name'] == $myusername &&
      $row['password'] == $mypassword)
      {
        $_SESSION['myusername']=$myusername;
        header('Location: http://localhost/cloud/welcome.php');
      }
      else
        $check = false;
    }
    if($check == false)
      echo '<script>alert("틀린 입력입니다.")</script>';
  }

  //회원가입 세션에서 넘겨준 값으로 회원가입 성공 알림창
  if(isset($_SESSION['id_check']))
  {
    $id_check = $_SESSION['id_check'];
    if($id_check == false)
    {
      echo '<script>alert("회원가입 성공!!!")</script>';
      session_unset();
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Page</title>

  <link rel="stylesheet" type="text/css" href="http://localhost/cloud/style.css">
  <link href="http://localhost/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">

    <header class="jumbotron text-center">
      <img src="https://avatars2.githubusercontent.com/u/26675061?v=4&s=400"
      alt="프로필" class="img-circle" id="logo">
      <h2><a href="http://localhost/cloud/main.php">My-Drive</a></h2>
    </header>

    <article>

      <h3>로그인</h3>
      <form action="" method="post">

        <div class="form-group">
          <label for="form-name">아이디</label>
          <input type="text" class="form-control" name="username"
            id="from-name" placeholder="아이디" required>
        </div>
        <div class="form-group">
          <label for="form-password">비밀번호</label>
          <input type="password" class="form-control" name="password"
            id="from-password" placeholder="비밀번호" required>
        </div>

        <input type="submit" class="btn btn-success btn-lg" value="로그인">
        <input type="button" class="btn btn-default btn-lg" value="회원가입"
        onclick="location.href='http://localhost/cloud/sign_up.php'">
      </form>

    </article>

  </div>

</body>

</html>
