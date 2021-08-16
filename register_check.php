<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>等下要吃啥勒</title>
  <link rel="stylesheet" href="log_style.css">
</head>
  <body>
    <header>
      <nav>
        <div id="links">
          <a class="button" href="Main.php">首頁</a>
          <a class="button" href="menu.html">菜單</a>
          <a class="button" href="log_in.php">新增</a>
          <a class="button" href="log_in.php">刪除</a>
          <a class="button" href="log_in.php">登入/註冊</a>
        </div>
      </nav>

    </header>
    <?php

	if(!empty($_POST)){
		$account = $_POST["account"];
		$pass = $_POST["password"];
    $name = $_POST["name"];
    $mail = $_POST["email"];

		$servername = "localhost";
		$username = "root";
		$password = "nex65100";
		$dbname = "whatshouldeat";
		$tablename = "會員";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
    $find_max_num_sql = "SELECT MAX(M_No) FROM 會員";
    $buffer = mysqli_query($conn, $find_max_num_sql);
    if(!$buffer)
    {
      echo("error:" .mysqli_error($conn));
    }
    $Number = mysqli_fetch_row($buffer)[0];
    $Number++;

		if(!$conn){
			die("connected failed: " .mysqli_connect_error());
		}
    else{
      echo "連接成功";
    }

	  $sql = "INSERT INTO $tablename(M_No, Name, Account, Password, Mail)
		        VALUES('$Number', '$name', '$account', '$pass', '$mail')";


		if(mysqli_query($conn, $sql)){
		        echo "<p class='mesp'>Record inserted successfully!!</p>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=log_in.php>';
		}
		else{
		        echo "<p class='mesp'Error:" .mysqli_error($conn). "</p>";
		}

     mysqli_close($conn);
   }
	 ?>

  </body>
 </html>
