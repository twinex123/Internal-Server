<?php 

require('../config.php');

session_start();

if(isset($_POST['job'])){

    $job = $_POST['job'];

    $sql =  "update users SET job = '".$job."' WHERE username = '". $_COOKIE['username'] ."' ";
    $res = mysqli_query($conn, $sql);

    if($res){
        ?><script>alert('Job successfully updated')</script><?php
        setcookie('job', $job, time() + 3600*24*365, '/', null, false, true);
        header('Location: ../user.php#job');
    }
}
    
?>