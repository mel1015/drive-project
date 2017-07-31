<?php
  session_start();

  if(isset($_SESSION['id_check']))
  {
    $id_check = $_SESSION['id_check'];
    if($id_check == true)
    {
      echo '<script>alert("중복된 아이디입니다.")</script>';
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

  <title>Sign Up Page</title>

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

      <h3>새로운 계정</h3>
      <form action="process.php" method="post">
        
        <div class="form-group">
          <label for="form-name">아이디</label>
          <input type="text" class="form-control" name="sign_up_username"
            id="from-name" placeholder="아이디" required>
        </div>
        <div class="form-group">
          <label for="form-password">비밀번호</label>
          <input type="text" class="form-control" name="sign_up_password"
            id="from-password" placeholder="비밀번호" required>
        </div>

        <input type="submit" class="btn btn-success btn-lg" value="회원가입">
        <input type="button" class="btn btn-default btn-lg" value="홈으로"
        onclick="location.href='http://localhost/cloud/main.php'">
      </form>

    </article>

  </div>
</body>

</html>
