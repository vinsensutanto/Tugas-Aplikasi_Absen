<?php
$conn = mysqli_connect("localhost","root","","absen");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows=[]; 
    while ($row= mysqli_fetch_assoc($result)){
        $rows[]=$row; 
    }
    return $rows; 
}

function register($POST){
    global $conn;
    $nama= strtolower(stripslashes($POST["nama"]));
    $jab= $POST["jab"];
    $shift= $POST["shift"];
    $email= $POST["email"];
    $lok= $POST["lok"];
    $password= mysqli_real_escape_string($conn,($POST["password"]));

$result= mysqli_query($conn,"SELECT email FROM data_user WHERE 
email = '$email'"); 
if (mysqli_fetch_assoc($result)){
    echo "<script> alert('email dah ada co') </script>";
    return false;
}

$password = password_hash($password, PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO data_user VALUES('','$nama','$jab','$shift','$email','$lok','$password')");

return mysqli_affected_rows($conn);
}

function cari($keyword){
    $querys = "SELECT * FROM data_absensi WHERE tanggal LIKE '%$keyword%'
    OR jmasuk LIKE '%$keyword%' OR jpulang LIKE '%$keyword%'
    ";

    return query($querys);
}

function ubah($data){
    global $conn;
    $id=$data["id"]; 
$nama= htmlspecialchars($data["nama"]);
$jabatan= htmlspecialchars($data["jab"]);
$shift= htmlspecialchars($data["shift"]);
$email = htmlspecialchars($data["email"]);
$lokasi= htmlspecialchars($data["lok"]);
$password = htmlspecialchars($data["password"]);
$password2 = htmlspecialchars($data["password2"]);

if($password2!==""){
    $password2 = password_hash($password2, PASSWORD_DEFAULT);
    $password = $password2;
    }

$query= "UPDATE data_user SET nama='$nama',jabatan='$jabatan',shift='$shift',email='$email',
lokasi='$lokasi', password='$password'
 WHERE id= $id
 ";
 mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}
?>
