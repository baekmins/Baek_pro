<?php
  include "connect.php";

  $id = $_GET["id"];

  $sql = "select * from member where email = '$id'";
  $result = mysql_query($sql);
  $row2 = mysql_num_rows($result);

  if ($id == "") {
    echo "아이디를 입력하세요.";
    $cid = 0;
  }
  else {
    if ($row2 == 0) {
      echo "사용 가능한 아이디입니다.";
      $cid = 1;
    }
    else {
      while ($row = mysql_fetch_array($result)) {
        if ($id == $row['email']) {
          echo "동일한 아이디가 존재합니다.";
          $cid = 0;
        }
      }
    }
  }
?>
<meta http-equiv='refresh' content='1; url=register_form.php?cid=<?=$cid?>&id=<?=$id?>'>
