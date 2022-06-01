<?php
if(!isset($_COOKIE['admin'])){
    header('Location: admin.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Admin | Internal Server</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/login.css">
 
</head>
<body>
<div class="content">
          <div class="title">
          <p>
          <span>
            Confirmation Administration Login
          </span>
          
        </p>
        <p>
            Enter the keyword to confirm that you're an administrator
        </p>
          </div>
          <div class="cube-wrapper">
              <div class="cube">
                  <div id="container">
  
                          <form action="actions/confirmAdmin.php" method="post" name="login">
                          
                          <h1 style="text-align: center; margin-top: 15px;">Login</h1>
                          <br>
                          <label><b class="input-title">
                              Keyword
                          </b></label>
                          <br>
                          <input type="text" placeholder="Enter keyword" name="keyword" class="input-form" required autocomplete="off">
                          <br><br>
                          <input type="submit" id='submit' value='Login' class='btn-submit'>
                          <br><br>
                          <p class="box-register" style='text-align: center;'>Forgot keyword? <a href="mailto:twinex.twinex@gmail.com" style='text-decoration:none;'>Send a message</a></p>
                          <?php
                          if(isset($_GET['error'])){
                              $err = $_GET['error'];
                              if($err==1 || $err==2)
                                  echo "<p style='color:red'>Incorrect keyword</p>";
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
