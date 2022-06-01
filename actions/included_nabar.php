<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Home | DEJ </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/6b3b8a33b8.js" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Internal Server</div>
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
               if(!isset($_SESSION["username"])){
                  echo "Not in homepage";
                }else{
                  echo $_SESSION['username'];
                }
              ?>
             </div>
             <div class="job">
               <?php 

               if(isset($_SESSION['username'])){
                require('config.php');

                //$reponse = $conn->query('SELECT * FROM users');
                //$data = $reponse->mysqli_fecth_array();
                $sql = "SELECT job FROM users WHERE username = '".$_SESSION['username']."'";
                $res = mysqli_query($conn, $sql);

                if($res){
                  while ($row = $res->fetch_assoc()) {
                    echo $row['job']."<br>";
                  }
                }else{
                  echo "Error during request";
                }
                
               }

                 
                ?>
                
              </div>
           </div>
         </div>
         <div onclick="window.location.href='logout.php'"><i class='bx bx-log-out' id="log_out" ></i></div>
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
  </script>
</body>
</html>
