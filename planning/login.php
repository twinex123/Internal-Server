<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<style>
        .title{
            margin-left: 150px;
            margin-top: 30px;
        }
        .cube-wrapper {
            width: 500px;
            height: 390px;
            top: 150px;
            left: 150px;
            position: absolute;
            box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);
            border-radius: 15px;
        }
        
        p span {
            display: inline-block;
            position: relative;
            overflow: hidden;
            font-size: 40px;
        }
        p span::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform: translateX(-100%);
        }
            p:nth-child(1) {
                font-weight: 300;
                animation: txt-appearance 0s 0.5s forwards;
            }
            
            p:nth-child(1) span::after {
                background: #1d1b31;
                animation: slide-in 0.75s ease-out forwards,
                slide-out 0.75s 0.5s ease-out forwards;
            }
            

            @keyframes slide-in {
                100% {
                    transform: translateX(0%);
                }
            }
            @keyframes slide-out {
                100% {
                    transform: translateX(100%)
                }
            }
            @keyframes txt-appearance {
                100% {
                    color: #222;
                }
            }
            .input-form{
                border-radius: 10px;
                border: none;
                background-color: #f1f1f1;
                padding: 20px 50px;
                align-items: center;
                margin-left: 130px;
            }
            .input-title{
                margin-left: 130px;
                margin-top: 20px;
            }
            .btn-submit{
                margin-left: 190px;
                border: 1px solid black;
                color: black;
                background-color: #f1f1f1;
                padding: 15px 40px;
                border-radius: 10px;
            }
    </style>
<?php
require('../config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  header("Location: index.php");
}

?>
<div class="content">
        <div class="title">
        <p>
        <span>
          Login
        </span>
      </p>
        </div>
        <div class="cube-wrapper">
            <div class="cube">
                <div id="container">

                        <form action="" method="post" name="login">
                        
                        <h1 style="text-align: center; margin-top: 15px;">Login</h1>
                        <br>
                        <label><b class="input-title">Username</b></label>
                        <br>
                        <input type="text" placeholder="Enter username" name="username" class="input-form" required autocomplete="off">
                        <br><br>
                        <input type="submit" id='submit' value='Login' class='btn-submit'>
                        <br><br>
                        <p class="box-register" style='text-align: center;'>Not registered? <a href="register.php" style='text-decoration:none;'>Register</a></p>
                        <?php
                        if(isset($_GET['error'])){
                            $err = $_GET['error'];
                            if($err==1 || $err==2)
                                echo "<p style='color:red'>Username or password incorrect</p>";
                        }
                        ?>
                    </form>

                    <?php if (! empty($message)) { ?>
                        <p class="errorMessage"><?php echo $message; ?></p>
                    <?php } ?>
                </div>
            </div>
        
        </div>
    
</div>
<?php include('navbar.php'); ?>
</body>
</html>
