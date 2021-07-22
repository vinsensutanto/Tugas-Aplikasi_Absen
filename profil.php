<?php
session_start();
if(!isset($_SESSION["login"])){
    header('location:login.php'); exit;
}

require 'function.php';

$id=$_GET["id"];

$dtabsen= query("SELECT * FROM data_user WHERE id =$id")[0];

if (isset($_POST["simpan"])) { 


     if(ubah($_POST) > 0){
          echo "<script>
alert('Data berhasil diubah');
document.location.href='profil.php?id=$id';
          </script>
          ";
          
     } else {echo "<script>
          alert('Data tidak diubah');
          document.location.href='profil.php?id=$id';
                    </script>;";
}
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Profil Page </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    img {
    border-radius: 50%;
    }
</style>
<link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <h1> Profil </h1>
    <input type="file" name="gambar" id="gambar" value="img/<?=$dtabsen["gambar"];?>">
    <img src="img/nophoto.jpeg" alt="user photo" style="width:100px;height:100px">
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $dtabsen["id"]; ?>">
    <label><b>Nama Lengkap</b></label>
    <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="text" placeholder="Enter Username" name="nama" value="<?= $dtabsen["nama"]; ?>" required>
          <label><b>Jabatan</b></label>
        <select name="jab" id="Jab" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" value="<?= $dtabsen["jabatan"]; ?>" required>
          <option value="guru">Guru</option>
          <option value="kajur">Kajur</option>
          <option value="kepsek">Kepala Sekolah</option>
          <option value="wakepsek">Wakil Kepala Sekolah</option>
        </select>

        <label><b>Shift</b></label>
        <select name="shift" id="sif" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" value="<?= $dtabsen["shift"]; ?>" required>
          <option value="ftime">Full Time</option>
          <option value="shiftpagi">Shift Pagi</option>
        </select>
        
        <label><b>Lokasi</b></label>
        <select name="lok" id="Lok" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" value="<?= $dtabsen["lokasi"]; ?>" required>
          <option value="sd">SD</option>
          <option value="smp">SMP</option>
          <option value="smk">SMK</option>
          <option value="sma">SMA</option>
        </select>

        <h1> Update Password </h1>
        <label><b>Password Baru</b></label>
        <input type="hidden" name="password" value="<?= $dtabsen["password"]; ?>">
        <label><b>Email</b></label>
    <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="email" placeholder="Enter Email" name="email" value="<?= $dtabsen["email"]; ?>" readonly>
          <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="password" placeholder="Enter New Password" name="password2">

        <div class="container" style="color:#000;background-color:#f1f1f1;border-top:16px;
          padding-top:16px;padding-bottom:16px">
        <button class="block section"style="color:white;background-color:blue;padding:8px 16px;" 
          type="submit" name ="simpan">Simpan</button>
    </form>

    </body>
</html>