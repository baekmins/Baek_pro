<?php
  session_start();

  if (!isset($_SESSION['id'])) {
    echo "로그인이 필요합니다.";
  }
  else {
    echo "안녕하세요.";
  }
?>
