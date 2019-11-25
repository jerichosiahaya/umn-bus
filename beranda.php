<?php
ini_set('max_execution_time', 300);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Beranda</title>
<?php
require 'components/header.php';
require 'components/seatConfig.php';
require 'koneksi.php';
$userID = $_SESSION['penggunaID'];
if(empty($_SESSION['penggunaID']) || $_SESSION['penggunaID'] == ''){
header("Location: index.php");
die();
}
?>
<style>
  body {
    /* background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%;
    background-color: #086197; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
    font-family: 'Josefin Sans', sans-serif;
    color: white;
  }

  img {
    height: 60px;
    width: 60px;
  }

  img:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }



  .spasi {
    height: 50px;
    width: 100%;
  }

  .atas {
    padding-top: 50px;
    text-align:center;
    padding-bottom: 60px;
  }

  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     color: white;
     text-align: center;
  }

  </style>
</head>
<body>
  <div class="atas">
    <center>
      <img src="images/logo.png" class="img-fluid" style="width: 15%; transform: none;">
    </center>
  </div>
    <div class="container">
    <div class="row">
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="pesantiket.php">
    <img src="images/book.png" class="img-fluid" alt="Responsive image" onclick="location.href='pesantiket.php';">
    </a>
    <p><h4>Pesan Tiket</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="lihattiket.php">
    <img src="images/bus.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Lihat Tiket</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="batalkantiket.php">
    <img src="images/cancel.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Batalkan Tiket</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="jadwalbis.php">
    <img src="images/jadwal.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Jadwal Bis <br>Mingguan</h4>
    </div>
  </div>
</div>
<div class="spasi"></div>
  <!--  <input type="submit" value="Jadwal Bis Mingguan" onclick="location.href='jadwalbis.php';"> -->
  <!-- container baru -->
  <div class="container">
    <div class="row">
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="">
    <img src="images/profile.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Profil</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="">
    <img src="images/term.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Terms & Condition</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="">
    <img src="images/pengumuman.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Pengumuman</h4>
    </div>
    <div class="col-sm col-md-2 col-lg-3 mt-3 text-center">
    <a href="keluar.php">
    <img src="images/logout.png" class="img-fluid" alt="Responsive image">
    </a>
    <p><h4>Log Out</h4>
    </div>
</div>
<div class="footer">
  <p>© 2019 Database System | Kelompok 4</p>
</div>
</body>
</html>
