<?php

if(!isset($_COOKIE['username'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/user.css">
    <link rel="stylesheet" href="static/css/style.css">
    <script src="https://kit.fontawesome.com/6b3b8a33b8.js" crossorigin="anonymous"></script>
    <title>User</title>
</head>
<body>
    <style>
    .cube-wrapper4 {
        width: 350px;
        height: 140px;
        top: 440px;
        left:150px;
        position: absolute;
        box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);
        border-radius: 15px;
    }
    .cube-wrapper5 {
        width: 350px;
        height: 140px;
        top: 440px;
        left:550px;
        position: absolute;
        box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);
        border-radius: 15px;
    }

    #delInfos{
        margin-top: 20px;
    }
    
    </style>
<div id="job" class="modal">
<div class="modal_content">
  <h1>Job successfully updated!</h1>

  <p>You can now close this window. </p>

  <a href="#" class="modal_close" style="font-size: 20px;">&times;</a>
</div>
</div>
    <div class="content">
        <div class="title">
        <p>
        <span>
          User
        </span>
        </p>
        </div>
        <div class="navigation">
            <div class="userBx">
                <div class="imgBx">
                    <img src="static/img/default_user-2.jfif" alt="">
                </div>
                <p class="username"><?php 
                echo $_COOKIE['username'] ?></p>
                <!--<p class="lang" style="margin-left: 10px;" onclick="changeLanguage()"><i class="fa-solid fa-globe"></i></p>-->
            </div>
            
            <div class="menuToggle"></div>
        </div>
        <script>
            let menuToggle = document.querySelector('.menuToggle');
            let navigation = document.querySelector('.navigation');
            menuToggle.onclick = function(){
                navigation.classList.toggle('active')
            }
        </script>
        <div class="cube-wrapper">
            <div class="cube">
                <h4 style="margin-top: 20px; margin-left: 20px;">Job</h4>
                <br>
                <form method="post" action="actions/changeJob.php">
                    
                    <p style="margin-left: 20px;">Enter your job name here : </p>
                    <br>
                    <input type="text" name="job" placeholder="Job" autocomplete="off" required class="job-input">
                    <br><br>
                    <input type="submit" name="submit" value="Submit" class="btn-submit" />
                </form>
                
            </div>
        </div>
        <div class="cube-wrapper2">
            <div class="cube">
                <h4 style="margin-top: 20px; margin-left: 20px;">Password</h4>
                <br>
                <form method="post" action="actions/changePassword.php">
                    
                    <p style="margin-left: 20px;">Enter your new password here : </p>
                    <br>
                    <input type="text" name="new_password" placeholder="New password" autocomplete="off" required class="job-input">
                    <br><br>
                    <input type="submit" name="submit_ps" value="Submit" class="btn-submit" />
                </form>    
            </div>
            
        </div>
    </div>
    <div class="cube-wrapper3">
            <div class="cube">
                <h4 style="margin-top: 20px; margin-left: 20px;">Delete your account</h4>
                <br>
                <form method="post" action="actions/deleteAccount.php">
                    <br>
                    <input type="submit" name="submit" value="Delete" class="btn-submit" />
                </form>
                
            </div>
        </div>

    <div class="cube-wrapper4">
        <div class="cube">

            <h4 style="margin-top: 20px; margin-left: 20px;">Delete my confidentials informations</h4>

            <form action="actions/deleteInfos.php" method="post">
                <input type="submit" name="submit" value="Delete" class="btn-submit" id="delInfos" />
            </form>
        </div>
    </div>
    <div class="cube-wrapper5">
        <div class="cube">

            <h4 style="margin-top: 20px; margin-left: 20px;">Search problems on my account</h4>

            <form action="actions/searchProblems.php" method="post">
                <input type="submit" name="submit" value="Search" class="btn-submit" id="delInfos" />
            </form>
        </div>
    </div>
    <?php include 'includes/navbar.php'?>
    <script>
        delInfos = document.getElementById('delInfos');
        delInfos.addEventListener('click', function(){
            window.location.href='actions/deleteInfos.php';
        })

    </script>
</body>
</html>