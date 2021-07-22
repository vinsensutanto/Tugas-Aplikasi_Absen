<?php
require 'function.php';

if(isset($_POST["reg"])){
    
    if(register($_POST)>0){
        echo "<script>alert('user baru berhasil ditambahkan!');
        document.location.href = 'login.php';
        </script>";
        
    } else {
        echo mysqli_error($conn);
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Register Page </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <h1> Register </h1>
    <p> Silahkan mengisi data pendaftaran akun dengan valid </p>

    <form action="" method="POST">
    <label><b>Nama Lengkap</b></label>
    <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="text" placeholder="Enter Username" name="nama" required>
          <label><b>Email</b></label>
    <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="email" placeholder="Enter Email" name="email" required>
          <label><b>Jabatan</b></label>
        <select name="jab" id="Jab" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" required>
        <option value="" disabled selected hidden>--PILIH--</option>
          <option value="guru">Guru</option>
          <option value="kajur">Kajur</option>
          <option value="kepsek">Kepala Sekolah</option>
          <option value="wakepsek">Wakil Kepala Sekolah</option>
        </select>

        <label><b>Shift</b></label>
        <select name="shift" id="sif" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" required>
        <option value="" disabled selected hidden>--PILIH--</option>
          <option value="ftime">Full Time</option>
          <option value="shiftpagi">Shift Pagi</option>
        </select>
        
        <label><b>Lokasi</b></label>
        <select name="lok" id="Lok" style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;" required>
        <option value="" disabled selected hidden>--PILIH--</option>
          <option value="sd">SD</option>
          <option value="smp">SMP</option>
          <option value="smk">SMK</option>
          <option value="sma">SMA</option>
        </select>

        <label><b>Password</b></label>
        <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="password" placeholder="Enter Password" name="password" required>

          <button onclick="document.location.href = 'login.php';" 
          style="margin-bottom:10px;display:block;color:white;background-color:green">Login</button>

        <div class="container" style="color:#000;background-color:#f1f1f1;border-top:16px;
          padding-top:16px;padding-bottom:16px">
        <button class="block section"style="color:white;background-color:blue;padding:8px 16px;" 
          type="submit" name ="reg">Register</button>
    </form>

    </body>
</html>