<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>等下要吃啥勒</title>
     <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
     <link rel="stylesheet" type="text/css" href="css/HOMEstyle.css<?php print('?'.filemtime('HOMEstyle.css'));?>"/>
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
       <!--主要內容-->
     </section>

     <footer>
     </footer>
   </body>
 </html>
