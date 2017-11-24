<?php
  session_start();
  include "connect.php";

  $email = $_SESSION["id"];
  $pwd = $_POST["pwd"];

  $sql = "update member set password = '$pwd' where email = '$email'";
  $result = mysql_query($sql);

  if (!$result) {
    echo "변경 실패";
  }
  else {
    echo "변경 성공!";
  }
  echo "<meta http-equiv='refresh' content='1; url=main.php'>";
?>
