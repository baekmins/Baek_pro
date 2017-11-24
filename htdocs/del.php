<?php
  include "connect.php";

  $uid = $_GET['uid'];

    $sql = "delete from del_board where uid = '$uid'";
    $result = mysql_query($sql);

      if (!$result) {
        echo "흥흥";
      }
      else {
        echo "삭제 성공!";
      }
      echo "<meta http-equiv='refresh' content='1; url=del_mail.php'>";
?>
