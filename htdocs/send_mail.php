<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>메일 보내기</title>
  </head>
  <body>
  <script type="text/javascript">
    function check_send() {
      if (!document.send_mail.email.value) {
        alert("받는 사람을 입력하세요.");
        return document.send_mail.email.focus();
      }
      else if (!document.send_mail.title.value) {
        alert("제목을 입력하세요.");
        return document.send_mail.title.focus();
      }
      else if (!document.send_mail.content.value) {
        alert("내용을 입력하세요.");
        return document.send_mail.content.focus();
      }
      else {
        send_mail.submit();
      }
    }
  </script>
<?php
session_start();

if (!isset($_SESSION['id'])) {
  echo "<meta http-equiv='refresh' content='0; url=main.php'>";
}
else {
    $pid = $_GET['pid'];

    echo '<form name="send_mail" action="send.php" method="post">';
    echo '  <table border="0" align="center" width="400" height="400">';
    echo '    <tr>';
    echo '      <td align="center" width="100">받는 사람</td>';
    echo '      <td><input type="text" name="email" size="30" value="'.$pid.'"></td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '      <td align="center">제목</td>';
    echo '      <td><input type="text" name="title" size="30"></td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '      <td align="center">내용</td>';
    echo '      <td><textarea name="content" cols="30" rows="10" style="resize:none;"></textarea></td>';
    echo '    </tr>';
    echo '    <tr>';
    echo '      <td align="left"><input type="button" onclick="check_send()" value="보내기"></td>';
    echo '      <td align="right"><input type="button" onclick="history.go(-1)" value="뒤로"></td>';
    echo '    </tr>';
    echo '  </table>';
    echo '</form>';
}
?>
  </body>
</html>
