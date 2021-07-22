<?php
session_start();

require 'function.php';

if(isset($_COOKIE['id']) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key =$_COOKIE["key"];
    
    $result = mysqli_query($conn,"SELECT * FROM data_user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
   
    if($key === $row["password"]){
        $_SESSION['id']= $row["id"];
        $_SESSION['login'] =true;
    }
}

if(isset($_POST["register"])){
    echo "<script>
        document.location.href = 'register.php';
        </script>";
}
if(isset($_SESSION["login"])){
    header('location:index.php');
    exit;
}


    if(isset($_POST["login"])){

        $email=$_POST["email"];
        $password=$_POST["password"];

        $err="";
        if($email == ""&& $password=="" ){
            header("Location:login.php?error=Isi Password dan Email anda Terlebih dulu");
        exit;
        } else {
            header("Location:login.php?error=Email atau Password Anda Salah");
        }
        
        $result = mysqli_query($conn,"SELECT * FROM data_user WHERE email='$email'");
        
        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password,$row["password"])) {
            
                if(isset($_POST['remember'])){
                    setcookie('tebakiniapa',$row["id"], time() + 36000); 
                    setcookie('tebakiniapa2', $row["password"], time() + 36000);   
                }
        $_SESSION['id']= $row["id"];
            $_SESSION["login"] = true;
            exit;
            }
        }

    }
?>


<!DOCTYPE html>
<html>
<title> Login Page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style1.css">
<body>

<div class="container">
<p> Silahkan login disini </p>
<P> <?php 
        if(isset($_GET["error"])){
        $err=$_GET["error"];
        echo $err;
        }
         ?> </p>
      <form class="container" action="" method="POST">
        <div class="section">
          <label><b>Email</b></label>
          <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;margin-bottom:16px;"
          type="email" placeholder="Enter Email" name="email" required>
          <label><b>Password</b></label>
          <input style="padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%;
          border:1px solid #ccc;"
           type="password" placeholder="Enter Password" name="password" required>
          <input style="margin-top:16px;margin-bottom:16px;" type="checkbox" checked="checked" name="remember"> Remember me
          
          <button onclick="document.location.href = 'register.php';" 
          style="margin-bottom:10px;display:block;color:white;background-color:blue">Register</button>
           
          <div class="container" style="color:#000;background-color:#f1f1f1;border-top:16px;
          padding-top:16px;padding-bottom:16px">
          <button class="block section"style="color:white;background-color:green;padding:8px 16px;" 
          type="submit" name ="login">Login</button>
          
        </div>
    </div>
  </div>
</div>
    </form>
</body>
</html>
