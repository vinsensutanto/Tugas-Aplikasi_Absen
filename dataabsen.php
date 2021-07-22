<?php 
require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM data_absensi WHERE tanggal LIKE '%$keyword%'
    OR jmasuk LIKE '%$keyword%' OR jpulang LIKE '%$keyword%'
    ";
$data_absen = query($query);
?>
<table border="1" cellpadding="10" cellspacing="0">
    <tr> 
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
<?php foreach($data_absen as $row): ?>
    <tr> 
    <td><?= $row["no"] ?></td>
        <td><?= $row["tanggal"] ?></td>
        <td><?= $row["jmasuk"] ?></td>
        <td><?= $row["jpulang"] ?></td>
        <td><?= $row["kehadiran"] ?></td>
    <td><a href="ubah.php?id=<?= $row["keterangan"]?>" onclick="return confirm('Yakin?');">AKSI</a> 
    </tr>
<?php endforeach; ?> 
</table>