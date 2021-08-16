<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>等下要吃啥勒</title>
     <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
     <link rel="stylesheet" type="text/css" href="css/OrderCheckstyle.css<?php print('?'.filemtime('OrderCheckstyle.css'));?>"/>
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
   </head>
   <body>
     <header id="table">
       <nav>
         <div id="links">
           <?php require 'log-in-process.php' ?>
         </div>
       </nav>

     </header>

     <section class = "cover">
       <div id="main">
         <h1>尋找高大附近美食</h1>
         <p>
           資料庫只有20間
         </p>
       </div>

       <form action="Search.php" method="post">
         <div class="box">
           <div class="container-1">
             <span class="icon"><i class="fa fa-search"></i></span>
             <input type="search" id="search" name = "input-item" placeholder="搜尋餐廳...." />
          </div>
         </div>
       </form>
     </section>
     <section>
       <form action="OrderProcess.php" method="post">
         <?php
         error_reporting(E_ALL ^ E_NOTICE); //隱藏notice訊息
         require 'DBconnect.php';
         $name = $_POST["orderRes"];
         $Res = "SELECT Food_Name,price FROM food WHERE Res_Name = '".$_POST['orderRes']."'";
         $result = mysqli_query($conn,$Res);
         $datetime = date ("Y/m/d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
         $shoplist = array();
         echo "<div class = 'orderList'>";
         echo "<h1 id = 'title'>新訂單</h1>";
         echo "<h1 id = 'title2'>──────────────</h1>";
         echo "<div class = 'detail'>";
         echo "<div class = 'orderName'><h1>訂購人姓名</h1>".$USERname."</div>";
         echo "<div class = 'orderNo'><h1>訂單編號</h1></div>";
         echo "<div class = 'orderTime'><h1>訂購時間</h1>".$datetime."</div>";
         echo "<div class = 'orderDetail'><h1>訂單內容</h1>";
         echo "<div class = 'orderbox'>";
         while($rs = mysqli_fetch_row($result))
         {
           $cost += ($_POST["$rs[0]"] * $rs[1]);
           if($_POST["$rs[0]"] != 0)
           {
             array_push($shoplist,$rs[0]);
             echo "<div id = 'food_name'>".$rs[0]."</div>";
             echo "<div id = 'food_num'>".$_POST["$rs[0]"]."個</div>";
             echo "<div id = 'food_price'>".$rs[1]*$_POST["$rs[0]"]."元</div>";
           }
         }
         $temp = serialize($shoplist);
         //$sql = "INSERT INTO orderlist (item,price,M_num,o_time) VALUES ('".$temp."',$cost,$USERid,'".$datetime."')";
         //mysqli_query($conn,$sql);
         echo "<div id = 'total_price'>總計 ".$cost." 元</div>";
         echo "</div>";
         echo "</div>";
         echo "</div>";
         echo "<h1 id = 'title2'>──────────────</h1>";
         echo "<div id = hidden-order>";
         echo "<input type = 'text' name = 'list' value = '".$temp."'></input>";
         echo "<input type = 'text' name = 'price' value = ".$cost."></input>";
         echo "<input type = 'text' name = 'M_num' value = ".$USERid."></input>";
         echo "<input type = 'text' name = 'date' value = '".$datetime."'></input>";
         echo "<input type = 'text' name = 'Rname' value = '".$_POST['orderRes']."'></input>";
         echo "</div>";
         echo "<input type='submit' name='submitButton' value='確認' />";
         echo "<input type='submit' name='deleButton' value='刪除' />";
         echo "</div>";
         //echo '<meta http-equiv=REFRESH CONTENT=10;url=Main.php>';
          ?>
       </form>
     </section>

     <footer>
     </footer>
   </body>
 </html>
