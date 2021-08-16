<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>等下要吃啥勒</title>
    <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
    <link rel="stylesheet" type="text/css" href="css/HOMEstyle.css<?php print('?'.filemtime('SEARCHstyle.css'));?>"/>
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

    <section class = "cover">
      <div id="main">
        <h1>尋找高大附近美食</h1>
        <p>
          哈哈哈哈哈哈哈哈哈哈哈哈
        </p>
      </div>

      <form action="Search.php" method="post">
        <div class="box">
          <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="search" name = "input-item" placeholder="搜尋餐廳...." />
        </div>
      </form>

    </section>

    <section>
      </div>
      <div id="details">
        <?php
          require 'DBconnect.php';
          $target = "SELECT Name,PHOTO,COALESCE((Service_Score), 0),COALESCE((Envi_Score), 0),COALESCE((Food_Score), 0)
                   FROM restaurant LEFT JOIN 評價
                  ON Name = R_Name
                  WHERE Name  LIKE '%".$_POST["input-item"]."%'";
          $find = mysqli_query($conn, $target);
          if(!$find)
          {
            echo ("ERROR:".mysqli_error($conn));
            exit();
          }
          if(mysqli_num_rows($find) == 0)
          {
            echo "<div><h1>找不到這間餐廳....</h1></div>";
          }
          else {

            while($rs = mysqli_fetch_row($find) )
            {
              $avg_score = ($rs[2] + $rs[3] + $rs[4]) / 3;
              $avg_score_percent = $avg_score * 20;
              echo "<div id = res_pic class = ".$rs[0]."><img src = '".$rs[1]."'></img><h1>".$rs[0]."</h1>";
              echo "<div id = gray_star>
                <div id = yellow_star style = 'width: $avg_score_percent%'></div>
              </div> </div>";
               /*if($rs[0] == null)
               {
                 echo "<div><h1>找不到這間餐廳....</h1></div>";
               }
               else {
                 $avg_score = ($rs[2] + $rs[3] + $rs[4]) / 3;
                 $avg_score_percent = $avg_score * 20;
                 echo "<div id = res_pic class = ".$rs[0]."><img src = '".$rs[1]."'></img><h1>".$rs[0]."</h1>";
                 echo "<div id = gray_star>
                   <div id = yellow_star style = 'width: $avg_score_percent%'></div>
                 </div> </div>";
               }*/
            }
          }
         ?>
      </div>

      <div id="show" class="hidden">
        <a class="myButton" id = "s_id">X</a>
        <div class="show-container">
          <div class="photo">
            <?php
              $pic = "SELECT PHOTO,Name FROM restaurant";
              $result = mysqli_query($conn,$pic);
              while($rs = mysqli_fetch_row($result))
              {
                echo "<div id = '".$rs[1]."' class = 'hidden-res'>
                <h1>".$rs[1]."</h1>
                <img src = '".$rs[0]."'></img>
                </div>";
              }
             ?>
          </div>
          <div class="menu">
            <h1>菜單 MENU</h1>
            <?php
              $res = "SELECT Name FROM restaurant";
              $result2 = mysqli_query($conn,$res);
              echo"<div class = 'menu-detail'>";
              while($rs1 = mysqli_fetch_row($result2))
              {
                echo "<form action='OrderCheck.php' method='post'>";
                $menu = "SELECT Food_Name,Price FROM food WHERE Res_Name = '".$rs1[0]."'";
                $result = mysqli_query($conn,$menu);
                echo "<div id = '".$rs1[0]."2' class = 'hidden-menu'>";
                echo "<input class='noshow' type = 'text' name = 'orderRes' value = '".$rs1[0]."'>";
                while ($rs = mysqli_fetch_row($result)) {
                  echo "<div>".$rs[0]."</div>";
                  echo "<div>".$rs[1]."元</div>";
                  if(isset($_SESSION['name']) && $_SESSION['name'])
                  {
                    echo "<select name = '".$rs[0]."'>
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>";
                  }
                }
                if(isset($_SESSION['name']) && $_SESSION['name'])
                {
                  echo "<input type = 'submit' value = '訂購'>";
                }
                else {
                  echo "<div>下單前請先登入</div>";
                }
                echo "</div>";
                echo "</form>";
              }
              echo"</div>";
             ?>
          </div>
        </div>
      </div>
    </section>

    <footer>
    </footer>
  </body>
</html>
