<?php
  include "connect.php";

  $uid = $_GET['uid'];

  $sql = "select * from del_board where uid = '$uid'";
  $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
      $email = $row['email'];
      $title = $row['title'];
      $content = $row['content'];
      $wdate = $row['wdate'];
      $pid = $row['pid'];
    }
    $sql2 = "insert into board value('$uid','$email','$title','$content','$wdate','$pid')";
    $result2 = mysql_query($sql2);

    $sql3 = "delete from del_board where uid = '$uid'";
    $result3 = mysql_query($sql3);

    if (!$result2 && !$result3) {
      echo "복구 실패";
    }
    else {
      echo "복구 성공!";
    }
    echo "<meta http-equiv='refresh' content='1; url=mail_list.php'>";
?>
