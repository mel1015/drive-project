<?php
  $path = "user/shin"; // 오픈하고자 하는 폴더
  $entrys = array(); // 폴더내의 정보를 저장하기 위한 배열
  $dirs = dir($path); // 오픈하기
  while(false !== ($entry = $dirs->read()))
  { // 읽기
    if(($entry != '.') && ($entry != '..'))
    {
      if(is_dir($path.'/'.$entry)) // 폴더이면
        $entrys['dir'][] = $entry;
      else // 파일이면
        $entrys['file'][] = $entry;
    }
  }
  $dirs->close(); // 닫기

  $dircnt = count($entrys['dir']); // 폴더 수
  // $filecnt = count($entrys['file']); // 파일 수
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

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

      <div class="row">

        <nav class="col-md-2">
          <ol class="nav nav-pills nav-stacked">
            <?php
              $index = 0;
              while($index < $dircnt)
              {
                echo '<li><h3>'.htmlspecialchars($entrys['dir'][$index]).'</h3></li>';
                $index++;
              }
            ?>
          </ol>
        </nav>

        <div class="col-md-10" id="file">

          <div class="btn-group" role="group" aria-label="..." id="load">
            <input type="button" class="btn btn-default" value="업로드">
            <input type="button" class="btn btn-default" value="다운로드">
          </div>

          <article>

              <?php
                session_start();
                $myusername = $_SESSION['myusername'];
                echo "<h4>로그인을 환영합니다. ".$myusername."님</h4><br>";
                if($handle = opendir('user/shin'))
                {
                  while(false !== ($entry = readdir($handle)))
                  {
                    if($entry != '.' && $entry !='..')
                    {
                      if(strchr($entry, ".jpg") || strchr($entry, ".png") == true)
                      {
                        // echo "<div>파일명 : $entry</div>";
                        echo "<img src='./user/shin/$entry'/>";
                      }
                    }
                  }
                  closedir($handle);
                }
              ?>

          </article>
        <!-- div : col-md-9   -->
        </div>
      <!-- div : row   -->
      </div>
    <!-- div : container -->
    </div>

  </body>

</html>
