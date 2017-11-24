<?php
  session_start();
  include "connect.php";

  $email = $_SESSION["id"];

  $sql = "delete from member where email = '$email'";
  $result = mysql_query($sql);

  $sql2 = "delete from board where email = '$email'";
  $result2 = mysql_query($sql2);

  $sql3 = "delete from del_board where email = '$email'";
  $result3 = mysql_query($sql3);

  echo "탈퇴 완료.";
  echo "<meta http-equiv='refresh' content='1; url=logout.php'>";
?>
