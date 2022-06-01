<?php 

if(isset($_COOKIE['username'])){
    $sql =  "DELETE FROM `users` WHERE `username` = '".$_COOKIE['username']."'";
    $res = mysqli_query($conn, $sql);
    if($res){
        ?><script>
            alert('Account deleted');
            setTimeout(() => {
                window.location.href='login.php';
            }, 1000);
            </script><?php
                        }
                    ?>
}
