<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="static/css/register.css">
<script src="https://kit.fontawesome.com/6b3b8a33b8.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>



<div class="content">
        <div class="title">
        <p>
        <span>
          Register
        </span>
      </p>
        </div>
        <div class="cube-wrapper">
            <div class="cube">
                <div id="container">
                                        
                
                    <form class="box" action="actions/register.php" method="post" enctype="multipart/form-data">
                        <h1 style="text-align: center; margin-top: 15px;">Register</h1>
                        <br><br>
                        <input type="text" class="input-form" name="username" placeholder="Firstname / Name" required autocomplete='off'/>
                        <br><br>
                        <input type="text" class="input-form" name="email" placeholder="Email" required autocomplete='off'/>
                        <br><br>
                        <input type="password" class="input-form" name="password" placeholder="Password" required autocomplete='off'/>
                        <!--<br><br>
                        <input type="file" name="avatar" value="Upload an avatar">-->
                        <br><br>
                        <input type="submit" name="submit" value="Register" class="btn-submit" />
                        <br><br>
                        <p class="box-register" style='text-align: center;'>Already registered? <a href="login.php" style='text-decoration: none'>Connect</a>
                        <br></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/navbar.php' ?>
</body>
</html>
