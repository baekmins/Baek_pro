<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>로그인 창</title>
  </head>
  <body>
    <script type="text/javascript">
      function CheckId() {
        var id = document.regi_form.id.value;
        location.replace("checkid.php?id="+id);
      }
      function Reset() {
        location.replace("login_form.php");
      }
    </script>
  <?php
    $cid = $_REQUEST["cid"];
    $id = $_REQUEST["id"];
    $chid = $_REQUEST["chid"];

  echo '<form name="regi_form" action="register.php" method="post">';
  echo '<table align = "center" border="0">';
  echo '  <tr>';
  echo '    <th colspan="2">회원가입</th>';
  echo '  </tr>';
  echo '  <tr>';
  echo '    <td>아이디(이메일)</td>';

  if ($cid == 0 && $chid == 0) {
    echo '    <td><input type="text" name="id" size="15" value='.$id.'></td>';
    echo '  </tr>';
    echo '  <tr>';
    echo '<td colspan="2" align = "center"><input type="button" value="중복 확인" onclick="CheckId()"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '  <td>비밀번호</td>';
    echo '  <td><input type="password" name="pwd" size = "15"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '  <td colspan="2" align = "center"><input type="button" value="취소" onclick="Reset()"></td>';
    echo '</tr>';
  }
  else {
    echo '    <td><input type="text" name="id" size="15" value='.$id.' readonly="readonly"></td>';
    echo '  </tr>';
    echo '  <tr>';
    echo '<td colspan="2" align = "center">확인 완료!';
    echo '</tr>';
    echo '<tr>';
    echo '  <td>비밀번호</td>';
    echo '  <td><input type="password" name="pwd" size = "15"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '  <td align = "center"><input type="submit" name="register" value="가입"></td>';
    echo '  <td align = "center"><input type="button" value="취소" onclick="Reset()"></td>';
    echo '</tr>';
  }
?>
</table>
</form>
</body>
</html>
