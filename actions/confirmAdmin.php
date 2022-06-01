<?php
require '../config.php';
session_start();

if (isset($_POST['keyword'])){
    
    $keyword = stripslashes($_REQUEST['keyword']);
    $keyword = mysqli_real_escape_string($conn, $keyword);
    
    $query = "SELECT * FROM `users` WHERE admin='".$keyword."'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
        $_SESSION['keyword'] = $keyword;
        header("Location: ../aindex.php");
    }else{
      ?><script>alert("False Keyword")</script><?php
      header('Location: ../admin.php');
    }
  }

?>