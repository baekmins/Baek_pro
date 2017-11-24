<?php
  session_start();

  if (!isset($_SESSION['id'])) {
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '  <head>';
    echo '    <meta charset="utf-8">';
    echo '    <title>로그인 창</title>';
    echo '  </head>';
    echo '  <body>';
    echo '    <form action="login.php" method="post">';
    echo '      <table align="center" border="0">';
    echo '        <tr>';
    echo '          <th colspan="2">E-mail</th>';
    echo '        </tr>';
    echo '        <tr>';
    echo '          <td><input type="text" name="id" size="15" value="아이디"></td>';
    echo '          <td rowspan="2" align="center"><input type="submit" name="login" value="로그인"></td>';
    echo '        </tr>';
    echo '        <tr>';
    echo '          <td><input type="password" name="pwd" size="15" value="비밀번호"></td>';
    echo '        </tr>';
    echo '        <tr>';
    echo '          <td colspan="2"><a href="register_form.php">회원가입</a></td>';
    echo '        </tr>';
    echo '      </table>';
    echo '    </form>';
    echo '  </body>';
    echo '</html>';
  }
  else {
    echo "<script>";
    echo "function del_member() {";
    echo " window.location.replace('del_member.php')";
    echo "}";
    echo "</script>";
    echo "사용자 : ".$_SESSION['id']."님 <input type='button' onclick='del_member' value='탈퇴'>";
    echo "<br>";
    echo "<br>";
    echo "<a href='modify_member.php' target='left'>정보 수정</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='send_mail.php' target='left'>메일 쓰기</a>";
    echo "<br>";
    echo "<br>";
    echo '<a href="mail_list.php" target="left">내 메일함</a>';
    echo "<br>";
    echo "<br>";
    echo '<a href="del_mail.php" target="left">휴지통</a>';
    echo "<br>";
    echo "<br>";
    echo "<a href='logout.php'>로그아웃</a>";
  }
?>
<script>
  parent.left.location.reload();
</script>
