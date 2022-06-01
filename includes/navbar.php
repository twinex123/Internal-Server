<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Home | DEJ </title>
    <link rel="stylesheet" href="static/css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6b3b8a33b8.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=dej;charset=utf8','root','');

$nameO = $bdd->query('SELECT name FROM organization');

?>
  <div class="sidebar" style="height: 100%;">
    <div class="logo-details">
        <div class="logo_name"><?php
        while($name = $nameO->fetch()){
          ?>
          <h1 style="font-size: 25px;"><?php echo $name['name']; ?></h1>
          <?php
      }
        ?></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li>

      <li>
       <a href="index.php">
         <i class='bx bx-home' ></i>
         <span class="links_name">Home</span>
       </a>
       <span class="tooltip">Home</span>
     </li>
     <li>
       <a href="news.php">
         <i class='bx bx-news' ></i>
         <span class="links_name">News</span>
       </a>
       <span class="tooltip">News</span>
     </li>
      <li>
       <a href="user.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">User</span>
       </a>
       <span class="tooltip">User</span>
     </li>
     <li>
       <a href="planning/index.php">    
         <i class='fa-solid fa-calendar' ></i>
         <span class="links_name">Planning</span>
       </a>
       <span class="tooltip">Planning</span>
     </li>
     
     <li>
       <a href="admin.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Administration page</span>
       </a>
       <span class="tooltip">Administration page</span>
     </li>
     
     
     <!--<li>
       <a href="credits.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Credits</span>
       </a>
       <span class="tooltip">Credits</span>
     </li>-->
     <li class="profile">
         <div class="profile-details">
           <div class="name_job">
             <div class="name">
             <?php 
               if(isset($_COOKIE["username"])){
                  echo $_COOKIE['username'];
                }
              ?>
             </div>
             <div class="job">
               <?php
              if(isset($_COOKIE["job"])){
                echo $_COOKIE['job'];
              }else{
                echo "No job defined";
              } ?>  

             </div>
           </div>
         </div>
         <div onclick="logOut()"><i class='bx bx-log-out' id="log_out" ></i></div>
     </li>
    </ul>
  </div>
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  searchBtn.addEventListener("click", ()=>{ 
    sidebar.classList.toggle("open");
    menuBtnChange(); 
  });

  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  }

  function logOut(){
    alert("If you log out your will not stay connected", 'Warning');
    window.location.href='logout.php';
  }
  </script>
</body>
</html>
