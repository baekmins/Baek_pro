<?php
  include "connect.php";

  session_start();

  $id = $_POST["id"];
  $pwd = $_POST["pwd"];

  $sql = "select * from member where email = '$id'";
  $result = mysql_query($sql);
  $row2 = mysql_num_rows($result);

  if ($id == "") {
    echo "아이디를 입력하세요.";
  }
  else if ($pwd == "") {
    echo "비밀번호를 입력하세요.";
  }
  else if ($row2 == 0) {
    echo "아이디를 확인하세요.";
  }
  else {
    while ($row = mysql_fetch_array($result)) {
      if ($id == $row['email'] && $pwd == $row['password']) {
        $_SESSION['id'] = $id;
        echo $id."님 환영합니다.";
        }
      else {
        echo "비밀번호를 확인하세요.";
      }
    }
  }
?>
<meta http-equiv='refresh' content='1; url=login_form.php'>
