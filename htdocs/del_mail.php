<?php
  session_start();
  include "connect.php";

if (!isset($_SESSION['id'])) {
  echo "<meta http-equiv='refresh' content='0; url=main.php'>";
}
else {
  $id = $_SESSION['id'];
  $uid = $_GET['uid'];
  $page = ($_GET['page'])?$_GET['page']:1;
  $list = ($_GET['list'])?$_GET['list']:3;
  $block_list = 3;
  $block = ceil($page / $block_list);
  $s_page = (($block - 1) * $block_list) + 1;
  $e_page = $s_page + $block_list - 1;

  $point = ($page - 1) * $list;

  $sql = "select * from board where uid = '$uid'";
  $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
      $email = $row['email'];
      $title = $row['title'];
      $content = $row['content'];
      $wdate = $row['wdate'];
      $pid = $row['pid'];
    }
    $sql2 = "insert into del_board value('$uid','$email','$title','$content','$wdate','$pid')";
    $result2 = mysql_query($sql2);

    $sql3 = "delete from board where uid = '$uid'";
    $result3 = mysql_query($sql3);

    $sql4 = "select * from del_board where email = '$id' order by uid desc limit $point, $list";
    $result4 = mysql_query($sql4);

    $sql5 = "select * from del_board where email = '$id'";
    $result5 = mysql_query($sql5);
    $rows = mysql_num_rows($result5);

    if ($rows == 0) {
      echo "휴지통이 비었습니다.";
    }
    else {
      $total_page = ceil($rows / $list);
      $total_block = ceil($total_page / $block_list);

      echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;버린 메일 : ".$rows;
      echo "<br>";
      echo "<br>";
      echo "<table border='1', align='center' width='400'>";
      echo "<tr>";
      echo "<th>보낸 사람</th>";
      echo "<th>제목</th>";
      echo "<th>시간</th>";
      echo "</tr>";
        while ($row = mysql_fetch_array($result4)) {
          echo "<tr>";
          echo "<td align='center' width='100'>".$row['pid']."</td>";
          echo "<td><a href='mail_view.php?uid2=".$row['uid']."'>".$row['title']."</a></td>";
          echo "<td align='center' width='100'>".$row['wdate']."</td>";
          echo "</tr>";
        }
      echo "</table>";
      echo "<br>";
      echo "<center>";
          if ($e_page > $total_page) {
            $e_page = $total_page;
          }
          if ($page <= 1) {
            echo "<< ";
          }
          else {
            echo "<a href='del_mail.php?page='><< </a>";
          }
          if ($block <= 1) {
            echo "< ";
          }
          else {
            echo "<a href='del_mail.php?page=".($s_page-1)."'>< </a>";
          }
          for ($i = $s_page; $i <= $e_page; $i++) {
            if ($page == $i) {
              echo "[".$i."]";
            }
            else {
              echo "<a href='del_mail.php?page=".$i."'>[".$i."]</a>";
            }
          }
          if ($block >= $total_block) {
            echo " >";
          }
          else {
            echo "<a href='del_mail.php?page=".($e_page+1)."'> ></a>";
          }
          if ($page >= $total_page) {
            echo " >>";
          }
          else {
            echo "<a href='del_mail.php?page=".$total_page."'> >></a>";
          }
      echo "</center>";
    }
  }
?>
