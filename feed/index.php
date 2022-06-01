<?php
session_start();
if(!isset($_COOKIE["admin"])){
    header("Location: ../admin.php");
    exit(); 
}
$bdd = new PDO('mysql:host=localhost;dbname=dej;', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$bddPlanning = new PDO('mysql:host=localhost;dbname=planning', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if(isset($_POST['send'])){
    if(!empty($_POST['title']) AND !empty($_POST['content'])){

        $title = htmlspecialchars($_POST['title']);
        $content = nl2br(htmlspecialchars($_POST['content']));

        $insertArticle = $bdd->prepare("INSERT INTO articles(title, content, creator, creation_date) VALUES(?, ?, ?, NOW())");
        $insertArticle->execute(array($title, $content, $_COOKIE['username']));

        if(isset($_POST['showalert']) AND !empty($_POST['alert'])){
            require_once "../planning/database.php";

            $title = $_POST['title'];
            $start = $_POST['alert']." 00:00:00";
            $end = $_POST['alert']." 00:00:01";
            
            $sqlInsert = "INSERT INTO table_events (title,start,end, color, announce) VALUES ('".$title."','".$start."','".$end ."', 'red', 1)";
            
            $result = mysqli_query($conn, $sqlInsert);
            
            if (! $result) {
                $result = mysqli_error($conn);
            }
            
            //echo $last_id = mysqli_insert_id($conn);
            
            
        }
        
        ?><script>alert('Article Published')</script><?php
    }else{
        ?><script>alert('All fields must be completed')</script><?php
    } 
}

if(isset($_POST['send_delete'])){
    if(!empty($_POST['title_delete'])){

        ?><script>confirm("Are you sure? ")</script><?php

        $title_delete = htmlspecialchars($_POST['title_delete']);
        $deleteArticle = $bdd->query("DELETE FROM `articles` WHERE `articles`.`title` = '".$title_delete."' ");

        ?><script>alert("Article <?php echo $title_delete ?> deleted...")</script><?php

    }else{
        ?><script>alert("All fields must be completed")</script><?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed | Internal Server</title>
    <link rel="stylesheet" href="../static/css/login.css">
    
</head>
<body>
    <style>
        .input-required{
            color: red;
        }
        .published{
            color: green;
        }
        .btn-submit:hover{
            border-radius: 20px;
        }
    </style>
<div class="title">
        <p>
        <span>
          Feed
        </span>
        <p style="">
        <!--You do not need to log in to access the schedule because there is a double-check-->
        </p>
      </p>
</div>
    <div class="cube-wrapper6">
        <div class="cube">

            <h4 style="margin-top: 20px; margin-left: 20px;">Publish</h4>
            <p style="margin-left: 20px;">Publish an article to the website</p><br>
            <form action="" method="POST" charset="UTF-8" accept-charset="UTF-8">
                <input type="text" name="title" placeholder="Article title" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px;">
                <!--<br>
                <input type="text" placeholder="Tag" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px; margin-top: 10px;">
                --><br>
                <textarea name="content" cols="60" rows="8" placeholder="Article content" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px; margin-top: 10px;"></textarea>
                <br>
                <p style="margin-left: 20px;">Show on planning</p><input type="checkbox" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px;" onclick="showAlert()" name="showalert">
                <br>
                <input type="date" name="alert" placeholder="Alert date" id="alert" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px; display: none; transform: transition 1s ease;">
                <br>

                <input type="submit" value="Publish" name="send" style="padding: 15px 30px; border: 1px solid black; background: #fff; border-radius: 15px; margin-left: 20px;" class="btn-submit">
            
                <script>
                    
                    function showAlert(){
                        alert = document.getElementById("alert");
                        alert.style.display = "block";

                        waitClick()
                    }
                </script>
            </form>
        </div>
    </div>
    <div class="cube-wrapper7">
        <div class="cube">

            <h4 style="margin-top: 20px; margin-left: 20px;">Delete an article</h4>
            <p style="margin-left: 20px;">Publish an article to the website</p><br>
            <form action="" method="POST" charset="UTF-8" accept-charset="UTF-8">
                <input type="text" name="title_delete" placeholder="Enter the article title" style="margin-left: 20px; border-radius: 15px; border: 1px solid black; padding: 20px 30px;" autocomplete="off">
                <br><br>
                <input type="submit" value="Delete" name="send_delete" style="padding: 15px 30px; border: 1px solid black; background: #fff; border-radius: 15px; margin-left: 20px;" class="btn-submit">
            </form>
        </div>
    </div>

    <?php include 'navbar.php'; ?>
</body>
</html>