<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="static/css/admin.css">
</head>
<body>

<?php

if(isset($_COOKIE['admin'])){
  header('Location: confirmAdmin.php');
}

require('config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $keyword = stripslashes($_REQUEST['keyword']);
  $keyword = mysqli_real_escape_string($conn, $keyword);
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."' and admin='".$keyword."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $username;
      $_SESSION['keyword'] = $keyword;
      header("Location: aindex.php");
  }else{
    ?><script>alert("You're not an administrator")</script><?php
  }
}
?>
<div class="content">
        <div class="title">
        <p>
        <span>
          Administration Login
        </span>
        
      </p>
      <p>
          Connect with specific account to be an administrator
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
                        <label><b class="input-title">Password</b></label>
                        <br>
                        <input type="password" placeholder="Enter password" name="password" class="input-form" required autocomplete="off">
                        <br><br>
                        <label><b class="input-title">
                            Keyword
                        </b></label>
                        <br>
                        <input type="text" placeholder="Enter keyword" name="keyword" class="input-form" required autocomplete="off">
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
<?php include('includes/navbar.php'); ?>
</body>
</html>
