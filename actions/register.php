<html>
    <head>
        <link rel="stylesheet" href="../static/css/style.css">
    </head>
<style>
        .title{
            margin-left: 150px;
            margin-top: 30px;
        }
        .cube-wrapper {
            width: 550px;
            height: 480px;
            top: 150px;
            left: 150px;
            position: absolute;
            box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);
            border-radius: 15px;
        }
        .cube-wrapper2{
            width: 550px;
            height: 200px;
            top: 35%;
            left: 35%;
            position: absolute;
            box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);
            border-radius: 15px;
        }
        
        p span {
            display: inline-block;
            position: relative;
            overflow: hidden;
            font-size: 40px;
        }
        p span::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            transform: translateX(-100%);
        }
            p:nth-child(1) {
                font-weight: 300;
                animation: txt-appearance 0s 0.5s forwards;
            }
            
            p:nth-child(1) span::after {
                background: #1d1b31;
                animation: slide-in 0.75s ease-out forwards,
                slide-out 0.75s 0.5s ease-out forwards;
            }
   
</style>
</html>
<?php
require('../config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
    ?><script>confirm("By registering, you approve the use of cookies allowing the best functioning of the site and greater accessibility")</script><?php
    /*if(isset($_FILES['avatar'])){
        $avatar = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $errors = array();

        if(!empty($avatar_tmp)){
            $image = explode('.', $avatar);
            $image_ext = end($image);

            if(in_array(strtolower($image_ext, array('png', 'gif', 'jpeg', 'jpg')) === false{
                $errors = "Invalid format (gif, png, jpg, jpeg are valid)"
            }


        }

        if(empty($errors)){
            
        }else{
            foreach($errors as $error){
                echo $error;
            }
        }
    }*/
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $query = "INSERT into `users` (username, email, password, job, admin)
              VALUES ('$username', '$email', '".hash('sha256', $password)."', 'None', 'No')";
    $res = mysqli_query($conn, $query);
    if($res){
       //include 'included_navbar.php';
       setcookie('username', $username, time() + 3600*24*365, '/', null, false, true);
       setcookie('stayconnected', 'yes', time() + 3600*24*365, '/', null, false, true);
       echo "<div class='cube-wrapper2'><h1 style='margin-left: 50px; margin-top: 50px;'>🎉 Successfully registered 🎉<br><h2 style='margin-left: 180px;'>Click <a href='../login.php'>here</a> to login</h2></div>";
    }
}else{
    ?><script>alert("Error: All fields must be completed")</script><?php
}

?>