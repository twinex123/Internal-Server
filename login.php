<?php
session_start();
if(isset($_COOKIE['stayconnected'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="static/css/login.css">
</head>
<body>

<style>

.form-control {
  margin-left: 180px;
  font-family: system-ui, sans-serif;
  font-size: 1rem;
  font-weight: bold;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
}

.form-control + .form-control {
  margin-top: 1em;
}

.form-control--disabled {
  color: var(--form-control-disabled);
  cursor: not-allowed;
}

input[type="checkbox"] {
  /* Add if not using autoprefixer */
  -webkit-appearance: none;
  /* Remove most all native input styles */
  appearance: none;
  /* For iOS < 15 */
  background-color: var(--form-background);
  /* Not removed via appearance */
  margin: 0;

  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border: 0.15em solid currentColor;
  border-radius: 0.15em;
  transform: translateY(-0.075em);

  display: grid;
  place-content: center;
}

input[type="checkbox"]::before {
  content: "";
  width: 0.65em;
  height: 0.65em;
  clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
  transform: scale(0);
  transform-origin: bottom left;
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em var(--form-control-color);
  /* Windows High Contrast Mode */
  background-color: CanvasText;
}

input[type="checkbox"]:checked::before {
  transform: scale(1);
}

input[type="checkbox"]:focus {
  outline: max(2px, 0.15em) solid currentColor;
  outline-offset: max(2px, 0.15em);
}

input[type="checkbox"]:disabled {
  --form-control-color: var(--form-control-disabled);

  color: var(--form-control-disabled);
  cursor: not-allowed;
}
</style>

<div class="content">
        <div class="title">
        <p>
        <span>
          Login
        </span>
        <p style="">
        <!--You do not need to log in to access the schedule because there is a double-check-->
        </p>
      </p>
        </div>
        <div class="cube-wrapper">
            <div class="cube">
                <div id="container">

                      <form action="actions/login.php" method="post" name="login">
                        
                        <h1 style="text-align: center; margin-top: 15px;">Login</h1>
                        <br>
                        <label><b class="input-title">Firstname / Name</b></label>
                        <br>
                        <input type="text" placeholder="Enter username" name="username" class="input-form" required autocomplete="off">
                        <br><br>
                        <label><b class="input-title">Password</b></label>
                        <br>
                        <input type="password" placeholder="Enter password" name="password" class="input-form" required autocomplete="off">
                        <br><br>
                        <label class="form-control">
                          <input type="checkbox" name="stayconnected" />
                          Remember me
                        </label>
                        <br><br>
                        <input type="submit" id='submit' value='Login' class='btn-submit' style="margin-top: -20px;">
                        <br><br>
                        <p class="box-register" style='text-align: center; margin-top: -10px:'>Not registered? <a href="register.php" style='text-decoration:none;'>Register</a></p>
                        
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

</script>
</body>
</html>
