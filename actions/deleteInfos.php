<?php 

setcookie('username', '', time()-3600, '/');
setcookie('job', '', time()-3600, '/');
setcookie('stayconnected', '', time()-3600, '/');

header('../user.php');

?>