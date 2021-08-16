<!DOCTYPE html>
<html>
	<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "nex65100";
		$dbname = "whatshouldeat";

		$conn = mysqli_connect($servername,$username,$password,$dbname);
		mysqli_query($conn, "SET NAMES 'utf-8'");
		if(!$conn)
		{
			die("Connection failed:".mysqli_connect_error());
		}
	?>
	</body>
</html>
