<?php
  require 'DBconnect.php';

  $Ser_sc = $_POST["Ser_sc"];
  $En_sc = $_POST["En_sc"];
  $Food_sc = $_POST["Food_sc"];
  $O_id = $_POST["O_id"];
  $rname = $_POST["rname"];

  $score_in = "INSERT INTO 評價(R_name, Service_Score, Envi_Score, Food_Score)
               VALUES('$rname', $Ser_sc, $En_sc, $Food_sc)";

  if(mysqli_query($conn, $score_in)){
          $delete_order = "DELETE FROM orderlist WHERE Order_no = $O_id";
          mysqli_query($conn, $delete_order);

          echo "<p class='mesp'>Record inserted successfully!!</p>";
          echo '<meta http-equiv=REFRESH CONTENT=0;url=Order.php>';
  }
  else{
          echo "<p class='mesp'Error:" .mysqli_error($conn). "</p>";
  }
?>
