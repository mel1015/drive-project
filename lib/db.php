<?php
  //중복제거 -> 라이브러리화 db_init() 함수로 모듈화
  function db_init($host, $duser, $dpw, $dname)
  {
    $conn = mysqli_connect($host, $duser, $dpw);
    mysqli_select_db($conn, $dname);
    return $conn;
  }
?>
