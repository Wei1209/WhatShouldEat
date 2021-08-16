<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>等下要吃啥勒</title>
     <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
     <link rel="stylesheet" type="text/css" href="css/Orderstyle.css<?php print('?'.filemtime('Orderstyle.css'));?>"/>
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
     <section class= "mainContent">
       <h1 class = "large">查詢訂單</h1>
       <h1 class = "large">────────</h1>
       <?php  //未完成訂單
         require 'DBconnect.php';
         if(isset($_SESSION['name']) && $_SESSION['name'])
         {
           echo "<div><h1 class = mini>未送達訂單</h1></div>";
          echo "<div class = order-box id = unfin>";
          $sql = "SELECT Order_no, item, price, o_time, R_Name FROM orderlist WHERE M_num = ".$_SESSION['userid']."";
          if($result = mysqli_query($conn,$sql))
          {
            while ($rs = mysqli_fetch_row($result)) {

              $o_time = $rs[3];
              $n_time = date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
              $d_time = (strtotime($n_time) - strtotime($o_time))/ (60);

              if($d_time < 1)
              {
                $list = array();
                $list = unserialize($rs[1]);
                echo "<div class = 'detail'>";
                echo "<div class = 'orderNo'><h1>訂單編號</h1>#".$rs[0]."</div>";
                echo "<div class = 'orderTime'><h1>訂購時間</h1>".$rs[3]."</div>";
                echo "<div class = 'orderDetail'><h1>訂單內容</h1>";
                echo "<div class = 'orderbox'>";
                foreach ($list as $key => $value) {
                  echo "<div>$list[$key]</div>";
                }
                echo "</div>";
                echo "<div id = 'total_price'>總計 ".$rs[2]." 元</div>";
                echo "</div>";
                echo "</div>";
              }
            }
          }
          else {
            echo "<div class = 'detail'>";
            echo "<h1>目前沒有訂單</h1>";
            echo "</div>";
          }
          echo "</div>";
         }
         else
         {
           echo "請登入來查詢你的訂單<br>";
           echo "將在5秒後導入登入頁面";
           echo '<meta http-equiv=REFRESH CONTENT=5;url=log_in.php>';
         }
        ?>
        <?php  //已完成訂單
          require 'DBconnect.php';
          if(isset($_SESSION['name']) && $_SESSION['name'])
          {
            echo "<div><h1 class = mini>未評分訂單</h1></div>";
           echo "<div class = order-box id =fin>";
           $sql = "SELECT Order_no, item, price, o_time, R_Name, Notify FROM orderlist WHERE M_num = ".$_SESSION['userid']."";
           if($result = mysqli_query($conn,$sql))
           {
             while ($rs = mysqli_fetch_row($result)) {

               $o_time = $rs[3];
               $n_time = date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;
               $d_time = (strtotime($n_time) - strtotime($o_time))/ (60);

               if($d_time > 1)
               {
                 if(!$rs[5])
                 {
                   $to = $_SESSION['mail'];
                   $subject = "訂單通知";
                   $message = "".$_SESSION['name']." 先生/小姐 您的訂單 #".$rs[0]."，已送達。";
                   $headers = "From: notify@wse.com.tw";

                   mail("$to","$subject","$message","$headers");

                   $isnotify = "UPDATE orderlist SET Notify = 1 WHERE Order_no = '".$rs[0]."'";
                   mysqli_query($conn,$isnotify);
                    //echo "1111";
                 }
                 $list = array();
                 $list = unserialize($rs[1]);
                 echo "<div class = 'detail'>";
                 echo "<div class = 'orderNo'><h1>訂單編號</h1>#".$rs[0]."</div>";
                 echo "<div class = 'orderTime'><h1>訂購時間</h1>".$rs[3]."</div>";
                 echo "<div class = 'orderDetail'><h1>訂單內容</h1>";
                 echo "<div class = 'orderbox'>";
                 foreach ($list as $key => $value) {
                   echo "<div>$list[$key]</div>";
                 }
                 echo "</div>";
                 echo "<div id = 'total_price'>總計 ".$rs[2]." 元</div>";
                 echo "</div>";
                 echo "<div class = score>";
                 echo "請完成以下的評分喔(分數為0到5分)~
                      <form action='order_score.php' method='post'>
        		            服務: <input class='in_data' type='text' name='Ser_sc'><br>
        		            環境: <input class='in_data' type='next' name='En_sc'><br>
                        食物: <input class='in_data' type='text' name='Food_sc'><br>
                        <input class='hidden' type='text' name='O_id' value= $rs[0]>
                        <input class='hidden' type='text' name='rname' value= $rs[4]>
        		              <input class='log_button' type='submit'  value='送出'>
        		          </form>";
                 echo "</div>";
                 echo "</div>";
               }
             }
           }
           else {
             echo "<div class = 'detail'>";
             echo "<h1>目前沒有訂單</h1>";
             echo "</div>";
           }
           echo "</div>";
          }
          else
          {
            echo "請登入來查詢你的訂單<br>";
            echo "將在5秒後導入登入頁面";
            echo '<meta http-equiv=REFRESH CONTENT=5;url=log_in.php>';
          }
         ?>
     </section>

     <footer>
     </footer>
   </body>
 </html>
