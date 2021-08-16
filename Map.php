<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>等下要吃啥勒</title>
     <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
     <link rel="stylesheet" type="text/css" href="css/HOMEstyle.css<?php print('?'.filemtime('HOMEstyle.css'));?>"/>
     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
     <script async defer
       src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTb9uluOi3sUqCdcLMRp_HjNaR6OrurXw">
     </script>
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
       <script>
          if(navigator.geolocation) {

          // 使用者不提供權限，或是發生其它錯誤
          function error() {
            alert('無法取得你的位置');
          }

          // 使用者允許抓目前位置，回傳經緯度
          function success(position) {
            console.log(position.coords.latitude, position.coords.longitude);
          }

          // 跟使用者拿所在位置的權限
          navigator.geolocation.getCurrentPosition(success, error);

          } else {
            alert('Sorry, 你的裝置不支援地理位置功能。');
          }

      </script>
      <iframe
      width="600"
      height="450"
      frameborder="0"
      style="border:0"
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDTb9uluOi3sUqCdcLMRp_HjNaR6OrurXw&q=高雄市政府"
      allowfullscreen>
      </iframe>
      <iframe
    width="600"
    height="450"
    frameborder="0"
    style="border:0"
    src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDTb9uluOi3sUqCdcLMRp_HjNaR6OrurXw&origin=台北市政府&waypoints=台北101|國父紀念館&destination=台北小巨蛋">
  </iframe>
     </section>

     <footer>
     </footer>
   </body>
 </html>
