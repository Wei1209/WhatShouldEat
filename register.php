<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>等下要吃啥勒</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/Style.css<?php print('?'.filemtime('Style.css'));?>"/>
  <link rel="stylesheet" type="text/css" href="css/log_style.css<?php print('?'.filemtime('log_style.css'));?>"/>
</head>
  <body>
    <header>
      <nav>
        <div id="links">
          <?php require 'log-in-process.php' ?>
        </div>
      </nav>

    </header>
    <section>
        <div id="LogTable">
  	      <form action="register_check.php" method="post">
  		    帳號: <input class="in_data" id="account" type="text" name="account"><br>
  		    密碼: <input class="in_data" id="password" type="text" name="password"><br>
          姓名: <input class="in_data" id="name" type="text" name="name"><br>
          E-Mail: <input class="in_data" id="phonenum" type="text" name="email"><br>
  		    <input class="log_button" type="submit" value="註冊">
  		  </form>
  	  </div>
  	</section>

    <footer>
    </footer>

    <!--檢查帳號重複...-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
     $(document).on("ready", function()
     {
       $("#account").on("blur", function()
       {
         var user_account = $(this).val();

         if(user_account != '')
         {
           $.ajax({
             type : "POST",
             url : "check_acc_pass.php",
             data : {
               'n' : $(this).val()
             },
             dataType : 'html'
           }).done(function(data){
             console.log(data);
             if(data == "yes")
             {
               alert("帳號有重複，不可以註冊");
             }
           }).fail(function(jqXHR, textStatus, errorThrown) {
             alert("有錯誤產生，請看 console log");
             console.log(jqXHR.responseText);
           });
         }
         else
         {
           $("#account").parent().removeClass("has-success").removeClass("has-error");
         }
       });
     });
    </script>

  </body>
 </html>
