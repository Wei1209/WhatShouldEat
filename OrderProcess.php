<?php
  require 'DBconnect.php';

  $orderlist = $_POST['list'];
  $price = (int)$_POST['price'];
  $id = (int)$_POST['M_num'];
  $time = $_POST['date'];
  $Rname = $_POST['Rname'];

  echo $_POST['list'];
  if(isset($_POST['submitButton'])){
    $sql = "INSERT INTO orderlist (item,price,M_num,o_time,R_Name) VALUES ('$orderlist',$price,$id,'$time','$Rname')";
    if(mysqli_query($conn,$sql))
      echo "111";
    else {
      echo "222";
    }
    echo '<meta http-equiv=REFRESH CONTENT=0.1;url=Main.php>';
  }
  if(isset($_POST['deleButton'])){
    echo '<meta http-equiv=REFRESH CONTENT=0.00001;url=Main.php>';
  }
 ?>
