<?php

setcookie('job', '', time()-10, '/');

?><script>alert('Problems resolved')</script><?php
header('Location: ../user.php')
?>