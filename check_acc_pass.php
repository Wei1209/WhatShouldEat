<?php
$servername = "localhost";
$username = "root";
$password = "nex65100";
$dbname = "whatshouldeat";
$tablename = "會員";

$_SESSION['link'] = mysqli_connect($servername, $username, $password, $dbname);

if(!$_SESSION['link']){
  die("connected failed: " .mysqli_connect_error());
}
else{

}

function check_has_account($account)
{
  $result = null;

  $sql = "SELECT * FROM 會員 WHERE Account = '$account'";
  $query = mysqli_query($_SESSION['link'], $sql);

  if ($query)
  {
    if (mysqli_num_rows($query) >= 1)
    {
      $result = true;
    }
    mysqli_free_result($query);
  }
  else
  {
    echo "{$sql} connected failed：" . mysqli_error($_SESSION['link']);
  }

  return $result;
}

$check = check_has_account($_POST['n']);

if($check)
{
	echo 'yes';
}
else
{
	echo 'no';
}
?>
