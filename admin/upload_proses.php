<?php
require '../koneksi.php';

$judul = $_POST['judul'];
$teks = $_POST['teks'];
$foto = $_FILES['foto'];

$ext = explode(".", $foto['name']);
$ext = end($ext);
$ext = strtolower($ext);

$ext_boleh = ['jpg', 'png', 'jpeg'];

if (in_array($ext, $ext_boleh)) {
    $sumber = $foto['tmp_name'];
    $tujuan = '../pengumuman/' . $foto['name'];
    move_uploaded_file($sumber, $tujuan);
    $query = "INSERT INTO pengumuman (judul, foto, teks) VALUES ('$judul', '$tujuan', '$teks')";
    $result = mysqli_query($koneksi, $query);
} else {
    echo "file tidak valid ";
}
echo $ext;
