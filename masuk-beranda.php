<?php
include 'koneksi.php';
$u = $_POST['penggunaID'];
$p = $_POST['sandi'];
$c = $_POST['kategori'];
$sql = "SELECT * FROM pengguna WHERE penggunaID='$u' AND kategoriID='$c'";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
$x = $row['sandi'];
$y = $row['kategoriID'];
if (strcasecmp($x, $p) == 0 && !empty($u) && !empty($p)) {
    $_SESSION['penggunaID'] = $u;
    header('location:beranda.php');
} else {
    echo "<script type='text/javascript'>alert('Gagal untuk masuk')</script>";
    echo("<script>window.location = 'index.php';</script>");
}

// strcasecmp untuk membiarkan password huruf kapital atau tidak (case sensitive)
