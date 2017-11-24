<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>메일함</title>
  </head>
  <body>
<?php
  session_start();
  include "connect.php";

if (!isset($_SESSION['id'])) {
  echo "<meta http-equiv='refresh' content='0; url=main.php'>";
}
else {
  $email = $_SESSION['id'];
  $sel = $_REQUEST['sel'];
  $search = $_REQUEST['search'];

    $sql = "select * from board where email = '$email'";
    $result = mysql_query($sql);
    $rows = mysql_num_rows($result);

    $page = ($_GET['page'])?$_GET['page']:1;
    $list = ($_GET['list'])?$_GET['list']:3;
    $block_list = 3;
    $block = ceil($page / $block_list);
    $s_page = (($block - 1) * $block_list) + 1;
    $e_page = $s_page + $block_list - 1;

    $point = ($page - 1) * $list;

      if ($rows == 0) {
        echo "받은 메일이 없습니다.";
      }
      else {
        if (!$search) {
          $total_page = ceil($rows / $list);
          $total_block = ceil($total_page / $block_list);

          $sql2 = "select * from board where email = '$email' order by uid desc limit $point, $list";
          $result2 = mysql_query($sql2);

          echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;받은 메일 : ".$rows;
          echo "<br>";
          echo "<br>";
          echo "<center>";
          echo "<form method='post' action='".$PHP_SELF."'>";
          echo "<select name='sel'>";
          echo "<option value='title'>제목";
          echo "<option value='pid'>보낸 사람";
          echo "</select>";
          echo "&emsp;";
          echo "<input type='text' name='search' size='30' value='".$search."'>";
          echo "&emsp;";
          echo "<input type='submit' value='검색'>";
          echo "</form>";
          echo "</center>";
        }
        else {
          if ($sel == "title") {
            $sql2 = "select * from board where email = '$email' and title like '%$search%' order by uid desc limit $point, $list";
            $result2 = mysql_query($sql2);
            $sql3 = "select * from board where email = '$email' and title like '%$search%'";
            $result3 = mysql_query($sql3);
            $rows = mysql_num_rows($result3);

            $total_page = ceil($rows / $list);
            $total_block = ceil($total_page / $block_list);

            echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;받은 메일 : ".$rows;
            echo "<br>";
            echo "<br>";
            echo "<center>";
            echo "<form method='post' action='".$PHP_SELF."'>";
            echo "<select name='sel'>";
            echo "<option value='title' selected>제목";
            echo "<option value='pid'>보낸 사람";
            echo "</select>";
            echo "&emsp;";
            echo "<input type='text' name='search' size='30' value='".$search."'>";
            echo "&emsp;";
            echo "<input type='submit' value='검색'>";
            echo "</form>";
            echo "</center>";
          }
          else {
            $sql2 = "select * from board where email = '$email' and pid like '%$search%' order by uid desc limit $point, $list";
            $result2 = mysql_query($sql2);
            $sql3 = "select * from board where email = '$email' and pid like '%$search%'";
            $result3 = mysql_query($sql3);
            $rows = mysql_num_rows($result3);

            $total_page = ceil($rows / $list);
            $total_block = ceil($total_page / $block_list);

            echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;받은 메일 : ".$rows;
            echo "<br>";
            echo "<br>";
            echo "<center>";
            echo "<form method='post' action='".$PHP_SELF."'>";
            echo "<select name='sel'>";
            echo "<option value='title'>제목";
            echo "<option value='pid' selected>보낸 사람";
            echo "</select>";
            echo "&emsp;";
            echo "<input type='text' name='search' size='30' value='".$search."'>";
            echo "&emsp;";
            echo "<input type='submit' value='검색'>";
            echo "</form>";
            echo "</center>";
          }
        }
        echo "<br>";
        echo "<table border='1', align='center' width='400'>";
        echo "<tr>";
        echo "<th>보낸 사람</th>";
        echo "<th>제목</th>";
        echo "<th>시간</th>";
        echo "</tr>";
          while ($row = mysql_fetch_array($result2)) {
            echo "<tr>";
            echo "<td align='center' width='100'>".$row['pid']."</td>";
            echo "<td><a href='mail_view.php?uid=".$row['uid']."'>".$row['title']."</a></td>";
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
              echo "<a href='mail_list.php?page=&sel=".$sel."&search=".$search."'><< </a>";
            }
            if ($block <= 1) {
              echo "< ";
            }
            else {
              echo "<a href='mail_list.php?page=".($s_page-1)."&sel=".$sel."&search=".$search."'>< </a>";
            }
            for ($i = $s_page; $i <= $e_page; $i++) {
              if ($page == $i) {
                echo "[".$i."]";
              }
              else {
                echo "<a href='mail_list.php?page=".$i."&sel=".$sel."&search=".$search."'>[".$i."]</a>";
              }
            }
            if ($block >= $total_block) {
              echo " >";
            }
            else {
              echo "<a href='mail_list.php?page=".($e_page+1)."&sel=".$sel."&search=".$search."'> ></a>";
            }
            if ($page >= $total_page) {
              echo " >>";
            }
            else {
              echo "<a href='mail_list.php?page=".$total_page."&sel=".$sel."&search=".$search."'> >></a>";
            }
        echo "</center>";
      }
      echo "<br>";
}
?>
  </body>
</html>
