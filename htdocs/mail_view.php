<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>메일</title>
  </head>
  <body>
<?php
  session_start();
  include "connect.php";

if (!isset($_SESSION['id'])) {
  echo "<meta http-equiv='refresh' content='0; url=main.php'>";
}
else {
  $uid = $_GET['uid'];
  $uid2 = $_GET['uid2'];

  echo "<script type='text/javascript'>";
  echo "function delmail() {";
  echo "  window.location.replace('del_mail.php?uid=".$uid."')";
  echo "}";
  echo "</script>";

  if (!isset($uid2)) {
    $sql = "select * from board where uid = '$uid'";
    $result = mysql_query($sql);

    echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type='button' onclick='delmail()' value='삭제'>";
      while ($row = mysql_fetch_array($result)) {
        echo "<script>";
        echo "function remail() {";
        echo "  window.location.replace('send_mail.php?pid=".$row['pid']."')";
        echo "}";
        echo "</script>";
        echo "<table border='0' align='center'>";
        echo "<tr>";
        echo "<td width='200' height='50'>".$row['title']."</td>";
        echo "<td width='200' align='right'>".$row['wdate']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>보낸 사람</td>";
        echo "<td>".$row['pid']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td height='50'>받는 사람</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2'>".$row['content']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='left'><input type='button' onclick='remail()' value='답장'></td>";
        echo "<td align='right'><input type='button' onclick='history.go(-1)' value='뒤로'></td>";
        echo "</tr>";
        echo "</table>";
      }
  }
  else {
    $sql = "select * from del_board where uid = '$uid2'";
    $result = mysql_query($sql);

      while ($row = mysql_fetch_array($result)) {
        echo "<script>";
        echo "function recovery() {";
        echo "  window.location.replace('recovery.php?uid=".$row['uid']."')";
        echo "}";
        echo "function delmail() {";
        echo "  window.location.replace('del.php?uid=".$row['uid']."')";
        echo "}";
        echo "</script>";
        echo "<table border='0' align='center'>";
        echo "<tr>";
        echo "<td width='200' height='50'>".$row['title']."</td>";
        echo "<td width='200' align='right'>".$row['wdate']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>보낸 사람</td>";
        echo "<td>".$row['pid']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td height='50'>받는 사람</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='2'>".$row['content']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td align='left'><input type='button' onclick='recovery()' value='복구'></td>";
        echo "<td align='right'><input type='button' onclick='delmail()' value='삭제'></td>";
        echo "</tr>";
        echo "</table>";
      }
  }
}
?>
  </body>
</html>
