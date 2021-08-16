<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>等下要吃啥勒</title>
    <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
    <link rel="stylesheet" type="text/css" href="ccs/CMstyle.css<?php print('?'.filemtime('CMstyle.css'));?>"/>
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
          哈哈哈哈哈哈哈哈哈哈哈哈
        </p>
      </div>
      <form action="Search.php" method="post">
        <div class="box">
          <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="search" name = "input-item" placeholder="Search..." />
        </div>
      </form>

    </section>

    <section>
      </div>
      <div id="details">
        <div class="change">
          <h1>新增餐廳</h1>
          <div class="addframe">
            <div class="frameName">
              <option>餐廳名稱</option>
              <option>餐廳地址</option>
              <option>餐廳電話</option>
            </div>
            <div class="frame">
              <form action="ContentManage.php" method="post">
                <input type="text" name="newName" value="測試">
                <input type="text" name="newAddress">
                <input type="text" name="newPhone">
                <input type="submit" value="新增">
              </form>
            </div>
          </div>
        </div>
        <?php
        ini_set("error_reporting","E_ALL & ~E_NOTICE"); //隱藏警告訊息
        require 'DBconnect.php';
        if($_POST["newName"] != NULL)
        {
          $sql = "INSERT INTO restaurant (Name,Address,Photo,Phone) VALUES ('".$_POST["newName"]."','".$_POST["newAddress"]."',NULL,'".$_POST["newPhone"]."')";
        }
        mysqli_query($conn,$sql);
         ?>
        <div class="change" >
          <h1>新增菜單</h1>
          <div class="addframe">
            <div class="frameName">
              <option>餐廳名稱</option>
              <option>食物名稱</option>
              <option>價格</option>
            </div>
            <div class="frame">
              <form action="ContentManage.php" method="post">
                <select name="R_Name">
                  <?php //列出餐廳
                    require 'DBconnect.php';
                    $target = "SELECT Name FROM restaurant";
                    $find = mysqli_query($conn, $target);
                    while($Rname = mysqli_fetch_row($find ) )
                    {
                       echo "<option value = '".$Rname[0]."'>".$Rname[0]."</option>";
                    }
                   ?>
                </select>
                <input type="text" name="newFood">
                <input type="text" name="newPrice">
                <input type="submit" value="新增">
              </form>
            </div>
          </div>
        </div>
        <?php
          require 'DBconnect.php';
          $sql = "INSERT INTO food (Food_Name,Res_Name,Price,Description) VALUES ('".$_POST["newFood"]."','".$_POST["R_Name"]."','".$_POST["newPrice"]."',NULL)";
          mysqli_query($conn,$sql);
         ?>
        <div class="change">
          <h1>刪除餐廳</h1>
          <div class="addframe">
            <div class="frameName">
              <option>餐廳名稱</option>
            </div>
            <div class="frame">
              <form action="ContentManage.php" method="post">
                <select name="deleR_Name">
                  <?php //列出餐廳
                    require 'DBconnect.php';
                    $target = "SELECT Name FROM restaurant";
                    $find = mysqli_query($conn, $target);
                    while($Rname = mysqli_fetch_row($find ) )
                    {
                       echo "<option value = '".$Rname[0]."'>".$Rname[0]."</option>";
                    }
                   ?>
                </select>
                <input type="submit" value="刪除">
              </form>
            </div>
          </div>
        </div>
        <?php
          require 'DBconnect.php';
          $sql = "DELETE FROM restaurant WHERE Name = '".$_POST["deleR_Name"]."'";
          mysqli_query($conn,$sql);
         ?>
        <div class="change">
          <h1>刪除菜單</h1>
          <div class="addframe">
            <div class="frameName">
              <option>餐廳名稱</option>
              <option>菜單</option>
            </div>
            <div class="frame">
              <form action="ContentManage.php" method="post">
                <select name="seleR_Name">
                  <?php //列出餐廳
                    require 'DBconnect.php';
                    $target = "SELECT Name FROM restaurant";
                    $find = mysqli_query($conn, $target);
                    while($Rname = mysqli_fetch_row($find ) )
                    {
                       echo "<option value = '".$Rname[0]."'>".$Rname[0]."</option>";
                    }
                   ?>
                </select>
                <input type="submit" value="查詢">
                <select name="seleF_Name" class="list_menu">
                  <?php //列出菜單
                    $target = "SELECT Food_Name FROM food WHERE Res_Name = '".$_POST["seleR_Name"]."'";
                    $find = mysqli_query($conn, $target);
                    while($Fname = mysqli_fetch_row($find))
                    {
                       echo "<option value = '".$Fname[0]."'>".$Fname[0]."</option>";
                    }
                   ?>
                </select>
                <input type="submit" value="刪除">
              </form>
              <?php
                require 'DBconnect.php';
                $sql = "DELETE FROM food WHERE Food_Name = '".$_POST["seleF_Name"]."'";
                mysqli_query($conn,$sql);
               ?>
            </div>
          </div>
        </div>
        <div class="change">
          <h1>更新資料</h1>
          <div class="addframe">
            <div class="frameName">
              <option>餐廳名稱</option>
              <option>餐廳地址</option>
              <option>餐廳電話</option>
            </div>
            <div class="frame">
              <form action="ContentManage.php" method="post">
                <select name="seleR_Name">
                  <?php //列出餐廳
                    $target = "SELECT Name FROM restaurant";
                    $find = mysqli_query($conn, $target);
                    while($Rname = mysqli_fetch_row($find ) )
                    {
                       echo "<option value = '".$Rname[0]."'>".$Rname[0]."</option>";
                    }
                   ?>
                </select>
                <input type="text" name="updName">
                <input type="text" name="updAddress">
                <input type="text" name="updPhone">
                <input type="submit" value="更新">
                <?php
                $flag = 0;
                if($_POST["updName"] != NULL)
                {
                  $updname = "UPDATE restaurant SET Name ='".$_POST["updName"]."' WHERE Name = '".$_POST["seleR_Name"]."'";
                  if(mysqli_query($conn,$updname))
                  {
                    $flag = 1;
                  }
                }
                if($_POST["updAddress"] != NULL)
                {
                  if($flag != 1)
                  {
                    $updadd = "UPDATE restaurant SET Address ='".$_POST["updAddress"]."' WHERE Name = '".$_POST["seleR_Name"]."'";
                  }
                  else {
                    $updadd = "UPDATE restaurant SET Address ='".$_POST["updAddress"]."' WHERE Name = '".$_POST["updName"]."'";
                  }
                  mysqli_query($conn,$updadd);
                }
                if($_POST["updPhone"] != NULL)
                {
                  if($flag != 1)
                  {
                    $updphone = "UPDATE restaurant SET Email ='".$_POST["updPhone"]."' WHERE Name = '".$_POST["seleR_Name"]."'";
                  }
                  else {
                    $updphone = "UPDATE restaurant SET Email ='".$_POST["updPhone"]."' WHERE Name = '".$_POST["updName"]."'";
                  }
                  mysqli_query($conn,$updphone);


                }
                $flag = 0;
                 ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
    </footer>
  </body>
</html>
