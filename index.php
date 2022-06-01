<?php
  session_start();
 if(!isset($_COOKIE['username'])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/index.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  </head>
  <body>

  <div class="content">
    <div class="content">
          <div class="title">
          <p>
          <span>
            Home
          </span>
        </p>
          </div>
          

            ?>
          <div class="cube-wrapper">
              <div class="cube">
                  <h4 style="margin-top: 20px; margin-left: 20px;">Login</h4>
                  <p style="margin-left: 20px;">Login to acces to member, messages and more</p><br>
                  <a href="login.php" style="text-decoration: none; color: #1d1b31; margin-top: 100px; margin-left: 70px;"><strong>Login</strong></a>
              </div>
          </div>
          <div class="cube-wrapper2">
              <div class="cube">
                  <h4 style="margin-top: 20px; margin-left: 20px;">Register</h4>
                  <p style="margin-left: 20px;">If you're not registered, plese register to connect your account</p><br>
                  <a href="register.php" style="text-decoration: none; color: #1d1b31; margin-top: 100px; margin-left: 70px;"><strong>Register</strong></a>
              </div>
          </div>
          <div class="cube-wrapper3">
              <div class="cube">
                  <h4 style="margin-top: 20px; margin-left: 20px;">Quick Links</h4>
                 <ul style="margin-left: 20px; margin-top: 10px;">
                 <style>
                     .qcli{
                         margin-left: 40px;
                     }
                 </style>
                     <li class="qcli">
                         <a href="planning/index.php">Planning</a>
                     </li>
                     <li class="qcli">
                         <a href="user.php">User Page</a>
                     </li>
                     <li class="qcli">
                         <a href="admin.php">Administration Page</a>
                     </li>
                     <li class="qcli">
                         <a href="user.php">User Page</a>
                     </li>
                 </ul>
              </div>
          </div>
      </div>
      <style>
          .main-img{
              margin-left: 650px;
              margin-top: 100px;
              border: none;
              border-radius: 15px;
          }
          .img{
              border-radius: 15px;
          }
      </style>
      <div class="main-img">
          <img src="https://www.legalstart.fr/hubfs/factsheet/assets/definition_startup.jpg" alt="" class="img" style="margin-top: calc(-70px); height: 105%;">
      </div>
      
  </div>
  
 
    <script>
        btn = document.querySelector('.btn-ok');
        btn.addEventListener('click', function (){
            results = document.getElementByClassName('user-result-li');
            results.style.display = "block";
        })

        document.onload(window.location.href='#warning');
        
        
    </script>
  <?php include 'includes/navbar.php'?>
  <style>
      .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0; right: 0;
            bottom: 0; left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            /*background: rgba(77, 77, 77, .7);*/
            transition: all .4s;
        }
        .modal:target {
            visibility: visible;
            opacity: 1;
        }
        .modal_content {
            border-radius: 0px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: white;
            padding: 1.5em 2em;
            color: black;
            border: 1px solid black;
        }
        
        .modal_close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: black;
            text-decoration: none;
        }
  </style>
  <div id="warning" class="modal">
		<div class="modal_content">
		  <h1 style="text-align: center; color: #1d1b31;">Welcome !</h1>
	  
		  <!--<p>Bonjour, nous vous informons que le site est basé sur la confiance; Voici donc quelques règles pour la bonne entente de tous et le maintien du site.
               <br><strong>- Ne pas envoyer de messages innapropriés et irrespectueux.</strong>
               <br><strong>- Ne pas insérer de faux identifiants, ainsi que travail, dans les champs prévus à cet effet.</strong>
            </p>-->
        <p><br>Hello, we inform you that the site is based on trust; Here are some rules for the good agreement of all and the maintenance of the site.
                <br><strong>- Do not send inappropriate and disrespectful messages.
                <br>- Do not insert false identifiers, as well as job, in the fields provided for this purpose.</strong><br>
            <br style="color: black;">
        </p>
          <button onclick="window.location.href='#'" style="background-color: #1d1b31; color: white; border: none; border-radius: 10px; padding: 20px 30px;">I have read the rules and I want to continue</button>
	  
		  <a href="#" class="modal_close">&times;</a>
		</div>
</div>
</body>
</html>