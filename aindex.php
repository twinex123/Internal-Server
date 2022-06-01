<?php
    session_start();
    if(!isset($_SESSION["keyword"])){
        header("Location: admin.php");
        exit(); 
    }else{
        setcookie('admin', 'yes', time()+ 3600*24*365, '/', null, false, true);
    }
?>
<!DOCTYPE html>
<html>
  <head>
  <head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/aindex.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
  </head>
  <body>
  <style>

    .job-li{
        color: green;
    }

  </style>

  <div class="content">
    <div class="content">
          <div class="title">
          <p>
          <span>
            Administration Page
            <button class="feed" style="font-size: 30px; color: black; border: none; background: #fff; margin-left: 30px;" title="Feed (Add article to website)" onclick="window.location.href='feed'"><i class="fa-solid fa-rss"></i></button>
            <a style="margin-left: 15px; text-decoration: underline; color: black; font-size: 15px;" title="Change Organization Name" href="changeOrganization.php">Change Name</a>
          </span>
            </p>
          </div>

          
      </div>
      
  </div>
  <?php
 
 $bdd = new PDO('mysql:host=localhost;dbname=dej;charset=utf8','root','');
  
 $users = $bdd->query('SELECT username FROM users ORDER BY id DESC');
 if(isset($_GET['s']) AND !empty($_GET['s'])) {
    $search = htmlspecialchars($_GET['s']);
    $users = $bdd->query('SELECT username FROM users WHERE username LIKE "%'.$search.'%" ORDER BY id DESC');
    
 }
 ?>
 <div class="cube-wrapper">
    <form method="GET" style="margin-left: 100px; margin-top: 50px;" action="">
        <input type="search" name="s" placeholder="Search..." style="width: 300px; height: 40px; border-radius: 15px; margin-top: -150px; border: none; box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);" autocomplete="off"/>
        <input type="submit" value="OK" style="width: 50px; height: 40px; border-radius: 15px; margin-top: -150px; border: none; box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);" class="btn-ok"/>
    </form>
    <?php if($users->rowCount() > 0) { ?>
        <ul>
            <?php while($a = $users->fetch()) { ?>
                <li style="
                    margin-left: 110px;
                    margin-right: 160px;
                    border-bottom: 1px solid black;
                    list-style-type: none;
                    padding: 10px 20px;
                    border: none;
                    background-color: #f1f1f1;
                    color: black;" class="user-result-li">
                            
                    <?php echo $a['username']; 

                    $job = $bdd->query("SELECT job FROM users WHERE username='".$a['username']."'");
                    while($c = $job->fetch()){ ?>
                        <p style="color: green; float: right;" class="job-li">
                            <?php echo $c['job']; ?>
                        </p> 
                    <?php } 
            ?>
                        
                </li>
            <?php } ?>  
        </ul>
    <?php } else { ?>
    Aucun résultat ...
    <?php } ?>
    </div>
 
    <script>
        btn = document.querySelector('.btn-ok');
        btn.addEventListener('click', function (){
            results = document.getElementByClassName('user-result-li');
            results.style.display = "block";
        })

        document.onload(window.location.href='#warning');
        
        
    </script>
    <div class="cube-wrapper2">
    <form method="GET" style="margin-left: 100px; margin-top: 50px;">
        <input type="date" name="d" placeholder="Search by date..." style="width: 300px; height: 40px; border-radius: 15px; margin-top: -150px; border: none; box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);" autocomplete="off"/>
        <input type="submit" value="OK" style="width: 50px; height: 40px; border-radius: 15px; margin-top: -150px; border: none; box-shadow: 10px 10px 54px -6px rgba(0,0,0,0.75);" class="btn-ok"/>
    </form>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=planning;charset=utf8','root','');
  
 if(isset($_GET['d']) AND !empty($_GET['d'])) {
    $search = htmlspecialchars($_GET['d']);
    $users = $bdd->query("SELECT `title` FROM `table_events` WHERE start='".$search."'");
 }
 if($users->rowCount() > 0) { ?>
    <ul>
    <?php while($b = $users->fetch()) { ?>
    <li style="
            margin-left: 110px;
            margin-right: 160px;
            border-bottom: 1px solid black;
            list-style-type: none;
            padding: 10px 20px;
            border: none;
            background-color: #f1f1f1;
            color: black;" class="user-result-li">
            <?php 
            $username = $b['title'];
            echo $username; ?>  
            <?php /*
                $job = $bdd->query("SELECT `job` FROM `users` WHERE username='".$b['title']."'");
                $jobDate = $bdd->query("SELECT `job` FROM `users` WHERE `username`='".$username."'");

                while($d = $jobDate->fetch()){
                    ?>
                    <p style="color: green; float: right;" class="job-li">
                        <?php echo $d['job']; ?>
                    </p> 
                    <?php
                } ?>
                */
            ?>
    </li>
    <?php } ?>
    </ul>
<?php } else { ?>
Aucun résultat ...
<?php } ?>

    </div>
  <?php include 'includes/navbar.php'?>
  <style>
      .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0; right: 0;
            bottom: 0; left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            /*background: rgba(77, 77, 77, .7);*/
            transition: all .4s;
        }
        .modal:target {
            visibility: visible;
            opacity: 1;
        }
        .modal_content {
            border-radius: 0px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: white;
            padding: 1.5em 2em;
            color: black;
            border: 1px solid black;
        }
        
        .modal_close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: black;
            text-decoration: none;
        }
  </style>
  <div id="warning" class="modal">
		<div class="modal_content">
		  <h1 style="text-align: center; color: #1d1b31;">Welcome Admin !</h1>
	  
		  <!--<p>Bonjour, nous vous informons que le site est basé sur la confiance; Voici donc quelques règles pour la bonne entente de tous et le maintien du site.
               <br><strong>- Ne pas envoyer de messages innapropriés et irrespectueux.</strong>
               <br><strong>- Ne pas insérer de faux identifiants, ainsi que travail, dans les champs prévus à cet effet.</strong>
            </p>-->
        <p><br>Here you can admin your site.
                <br><strong>- You can search disponibility of each users.
                <br>- You can change job or password of users.</strong><br>
            <br style="color: black;">
        </p>
          <button onclick="window.location.href='#'" style="background-color: #1d1b31; color: white; border: none; border-radius: 10px; padding: 20px 30px;">Ok</button>
	  
		  <a href="#" class="modal_close">&times;</a>
		</div>
</div>
<script src="https://kit.fontawesome.com/6b3b8a33b8.js" crossorigin="anonymous"></script>
</body>
</html>