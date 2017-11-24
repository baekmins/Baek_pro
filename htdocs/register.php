<?php
  include "connect.php";

  $id = $_POST["id"];
  $pwd = $_POST["pwd"];
  $chid = 1;

  if ($pwd == "") {
    echo "비밀번호를 입력하세요.";
    echo "<meta http-equiv='refresh' content='1; url=register_form.php?id=$id&chid=$chid'>";
  }
  else {
    $sql = "insert into member(email, password) values('$id', '$pwd')";
    $result = mysql_query($sql);

      if ($result) {
        echo "회원가입 완료!";
      }
      else {
        echo "가입 실패..";
      }
      echo "<meta http-equiv='refresh' content='1; url=login_form.html'>";
  }
?>
