<?php
if(!isset($_COOKIE['admin'])){
    header('Location: admin.php');
}

require 'config.php';

if(isset($_POST['send'])){
    if(isset($_POST['name']) AND !empty($_POST['name'])){

        $name = htmlspecialchars($_POST['name']);

        $sql =  "UPDATE organization SET name = '".$name."'";
        $res = mysqli_query($conn, $sql);
        if($res){
            ?><script>alert("Organization name successfully updated!")</script><?php
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Name | Internal Server</title>
    <link rel="stylesheet" href="static/css/login.css">
</head>
<body>
    <div class="content">
        <div class="title">
            <p>
                <span>
                    Name
                </span>
            </p>
        </div>
        <div class="cube-wrapper">
            <div class="cube">
                <div id="container">
                    <form action="" method="POST">
                        <h1 style="text-align: center; margin-top: 15px;">Change organization name</h1>
                        <br>
                        <input type="text" placeholder="Enter organization name" class="input-form" name="name">
                        <br><br>
                        <input type="submit" class="btn-submit" value="Change" name="send">
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <?php include 'includes/navbar.php'; ?>
</body>
</html>