<?php

session_start();
if(!isset($_COOKIE['username'])){
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="news_asset/css/style.css">
    <link rel="stylesheet" href="static/css/login.css">
</head>
<body>
  <div class="title">
    <p>
      <span>
        News
      </span>
    </p>
  </div>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=dej;charset=utf8','root','');

$recupArticles = $bdd->query('SELECT * FROM articles ORDER BY id DESC');
while($article = $recupArticles->fetch()){

?>
    
    <section class="cv-block info" style="padding-bottom: 40px;">
        <div class="container">
          <div class="work-experience group" id="work-experience">
            <!--<h2 class="text-center" style="margin-bottom: 30px;"><?php //echo $article['title']; ?></h2>-->
            <div class="item">
              <div class="row">
                <div class="col-md-6">
                  <h3><?php echo $article['title'] ?></h3>
                  <h4 class="organization"><?php echo $article['creator'] ?></h4>
                </div>
                <div class="col-md-6">
                  <time class="period"><?php echo $article['creation_date'] ?></time>
                </div>
              </div>
              <p class="text-muted"><?php echo $article['content']; ?></p>
            </div>
        </div>
    </section>
    </div>
    <?php
}
?>

<?php include 'includes/navbar.php'; ?>
</body>
</html>
