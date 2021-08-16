<?php
  session_start();

  session_destroy();

  echo "登出成功! 即將跳轉回首頁。";
  echo '<meta http-equiv=REFRESH CONTENT=1.5;url=Main.php>';
?>
