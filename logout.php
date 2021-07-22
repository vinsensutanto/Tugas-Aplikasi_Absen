<?php
session_start();
session_destroy();


setcookie('tebakiniapa','',time()-36000);
setcookie('tebakiniapa2','',time()-36000);
header("location:login.php");

?>