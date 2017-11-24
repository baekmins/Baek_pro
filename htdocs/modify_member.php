<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>정보 수정</title>
  </head>
  <body>
    <script>
      function modify_member() {
        if (!document.modify.pwd.value) {
          alert('변경하실 비밀번호를 입력하세요.');
          return document.modify.pwd.focus();
        }
        else if (!document.modify.pwd2.value) {
          alert('비밀번호를 한번 더 입력하세요.');
          return document.modify.pwd2.focus();
        }
        else if (document.modify.pwd.value != document.modify.pwd2.value) {
          alert('비밀번호를 확인하세요.');
          return document.modify.pwd2.focus();
        }
        else {
          modify.submit();
        }
      }
    </script>
<?php
  session_start();

if (!isset($_SESSION['id'])) {
  echo "<meta http-equiv='refresh' content='0; url=main.php'>";
}
else { echo "
    <form name='modify' method='post' action='modify.php'>
      <table align='center'>
        <tr>
          <th colspan='2'>회원정보 변경</th>
        </tr>
        <tr>
          <td>새로운 비밀번호</td>
          <td><input type='password' name='pwd'></td>
        </tr>
        <tr>
          <td>비밀번호 확인</td>
          <td><input type='password' name='pwd2'></td>
        </tr>
        <tr>
          <td align='left'><input type='button' onclick='modify_member()' value='변경'></td>
          <td align='right'><input type='button' onclick='history.go(-1)' value='뒤로'></td>
        </tr>
      </table>
    </form>
  </body>
</html>
";} ?>
