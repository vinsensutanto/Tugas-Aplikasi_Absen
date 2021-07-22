<?php
/*session_start();
if(!isset($_SESSION["login"])){
    header('location:login.php'); exit;
}*/

require 'function.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> DATA ABSEN </title>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>

    <h1> Daftar Absen </h1>
    <table id="tabel-data">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam pulang</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $dtabsen = mysqli_query($conn,"select * from data_absensi");
        while($row = mysqli_fetch_array($dtabsen))
        {
            echo "<tr>
            <td>".$row['tanggal']."</td>
            <td>".$row['jmasuk']."</td>
            <td>".$row['jpulang']."</td>
            <td>".$row['kehadiran']."</td>
            <td>".$row['keterangan']."</td>
        </tr>";
        }
    ?>
    </tbody>

    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</table>
</body>
</html>