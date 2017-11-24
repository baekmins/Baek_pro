<?php
  include "connect.php";
  session_start();

  $email = $_POST["email"];
  $title = $_POST["title"];
  $content = $_POST["content"];
  $pid = $_SESSION['id'];
  $wdate = date("m-d H:i");

    $sql = "select email from member where email = '$email'";
    $result = mysql_query($sql);
    $rows = mysql_num_rows($result);
      if ($rows == 0) {
        echo "받는 사람이 잘못되었습니다.";
        echo "<meta http-equiv='refresh' content='1; url=send_mail.php?title=$title&content=$content'>";
      }
      else {
        $sql2 = "insert into board(email, title, content, wdate, pid) values('$email', '$title', '$content', '$wdate', '$pid')";
        $result2 = mysql_query($sql2);
          if ($result2) {
            echo "메일 보내기 완료!";
          }
          else {
            echo "메일 보내기 실패..";
          }
          echo "<meta http-equiv='refresh' content='1; url=mail_list.php'>";
      }
?>
