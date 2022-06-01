<?php
require('../config.php');
session_start();
if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query) or die(mysql_error());
  $rows = mysqli_num_rows($result);
  if($rows==1){
    $_SESSION['username'] = $username;
    if(isset($_POST['stayconnected'])){
      setcookie('username', $username, time()+3600*24*365, '/', null, false, true);
      setcookie('announce', '1', time() + 3600*24*365, '/', null, false, true);
      setcookie('stayconnected', 'yes', time()+3600*24*365, '/', null, false, true);
      header("Location: ../index.php");
    }else{
      setcookie('username', $username, time()+3600*24*365, '/', null, false, true);
      setcookie('announce', '1', time() + 3600*24*365, '/', null, false, true);
      header("Location: ../index.php");
    }
  }else{
    ?><script>alert('Username or password incorrect')</script><?php
    header('Location: ../login.php');
  }
}
?>