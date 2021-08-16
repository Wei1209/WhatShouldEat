<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>等下要吃啥勒</title>
    <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
    <link rel="stylesheet" type="text/css" href="css/log_style.css<?php print('?'.filemtime('log_style.css'));?>"/>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav>
        <div id="links">
          <?php require 'log-in-process.php' ?>
        </div>
      </nav>

    </header>

	<section>
      <div id="LogTable">
			<p>還沒有<a class="register" href="register.php">註冊</a>嗎</p>
	      <form action="Main_in.php" method="post">
		    帳號: <input class="in_data" type="text" name="account"><br>
		    密碼: <input class="in_data" type="text" name="password"><br>
		    <input class="log_button" type="submit"  value="登入">
		  </form>
	  </div>
	</section>
    <footer>
    </footer>
  </body>
</html>
