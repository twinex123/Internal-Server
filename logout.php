<?php

  session_start();
  
  if(session_destroy())
  {
    setcookie("username", '', time()-10, '/');
    setcookie("admin", '', time()-10, '/');
    setcookie('stayconnected', '', time()-10, '/');
    header("Location: login.php");
  }

?>