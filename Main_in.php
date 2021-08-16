<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>等下要吃啥勒</title>
    <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
    <link rel="stylesheet" type="text/css" href="css/HOMEstyle.css<?php print('?'.filemtime('HOMEstyle.css'));?>"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <script src = "MainJS2.js" defer></script>
  </head>
  <body>
    <header id="table">
      <nav>
        <div id="links">
          <?php require 'log-in-process.php' ?>
        </div>
      </nav>

    </header>

    <?php
    require 'DBconnect.php';

    session_start();
    if(!empty($_POST))
    {
      $user_acc = $_POST["account"];
      $user_pas = $_POST["password"];
      $sql = "SELECT Name,M_No,Mail FROM 會員 WHERE Account = '$user_acc' AND Password = '$user_pas'";

      $name_tuple = mysqli_query($conn, $sql);

      if(mysqli_num_rows($name_tuple) == 0)
      {
        echo ("帳號或密碼錯誤，請再輸入一次!");
        echo '<meta http-equiv=REFRESH CONTENT=1.5;url=log_in.php>';
      }
      else
      {
        $tuple_buffer = mysqli_fetch_row($name_tuple);
        $_SESSION['name'] = $tuple_buffer[0];
        $_SESSION['userid'] = $tuple_buffer[1];
        $_SESSION['mail'] = $tuple_buffer[2];
        echo '<meta http-equiv=REFRESH CONTENT=0;url=Main.php>';
      }
    }

    ?>
  </body>
</html>
