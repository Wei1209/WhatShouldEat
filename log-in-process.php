<?php
session_start();

  echo("<a class='button' href='Main.php'>首頁</a>
        <a class='button' href='Order.php'>訂單</a>
        <a class='button' href='RandomPick.php'>隨機挑選</a>");

  if(isset($_SESSION['name']) && $_SESSION['name'] && isset($_SESSION['userid']) && $_SESSION['userid'] &&isset($_SESSION['mail']) && $_SESSION['mail'])
  {
    $USERname = $_SESSION['name'];
    $USERid = $_SESSION['userid'];
    $USERmail = $_SESSION['mail'];
    if($USERid == 10)
    {
      echo "<a class='button' href='ContentManage.php'>後台</a>";
    }
    echo("哈囉! $USERname");
    echo("<a href='log_out.php'>登出</a>");
  }
  else
  {
    echo("<a id = 'log-out-button' class='button' href='log_in.php'>登入/註冊</a>");
  }
?>
