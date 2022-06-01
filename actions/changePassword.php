<?php 

require('config.php');

if(isset($_POST['new_password'])){

    $password = htmlspecialchars($_POST['new_password']);
                    
    $sql =  "update users SET password = '".hash('sha256', $password)."' WHERE username = '". $pusername ."' ";
    $res = mysqli_query($conn, $sql);
    if($res){
        ?><script>alert("Password successfully updated!")</script><?php
        header('Location: ../user.php');
    }
};
?>