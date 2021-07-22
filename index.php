<?php
session_start();

require 'function.php';
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}
    $id = $_SESSION['id'];

$result = mysqli_query($conn,"SELECT * FROM data_user WHERE id=$id");
$row = mysqli_fetch_assoc($result);

date_default_timezone_set("Asia/Jakarta");
$jam = date('H:i');
if ($jam > '06:00' && $jam < '10:00') {
    $salam = 'Pagi';
} elseif ($jam >= '10:00' && $jam < '15:00') {
    $salam = 'Siang';
} elseif ($jam < '18:00') {
    $salam = 'Sore';
} else {
    $salam = 'Malam';
}

echo"Selamat ".$salam ." ".$row["nama"];

?>
<html>
    <head>
    </head>
    <body>
    <a href="profil.php?id=<?= $id ?>"> Profil </a>
<a href="logout.php"> Logout? </a>
    </body>
</html>