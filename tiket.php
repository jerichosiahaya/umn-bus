<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Tiketmu</title>
<?php
require 'koneksi.php';
require 'components/header.php';
?>
<style>
  body {
  /*  background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
  }
  </style>
</head>
<body>
    <?php
    require 'db-init.php';
    $userID = $_SESSION['penggunaID'];
    $bid = $_GET['bis'];
    $seat = $_GET['seat'];
    $sql_instance = "SELECT * FROM tiket JOIN rute ON tiket.ruteID = rute.ruteID WHERE penggunaID=" . $userID . " AND busID=" . $bid . " AND noKursi=" . $seat . ";";
    $result = $koneksi->query($sql_instance);
    $row = $result->fetch_assoc();
    $qr_pass = '<<RINCIAN TIKET>><Tanggal Berangkat - ' . $row['tglBerangkat'] . '><Rute ID - ' . $row['ruteID'] . '><Nomor Kursi - ' . $row['noKursi'] . '><Penumpang ID - ' . $row['penggunaID'] . '><<Semoga Selamat Sampai Tujuan!>>';
    echo '<center><div class="container">
          <div class="col-sm col-md-5">
					<div class="card bg-transparent border-dark text-white">
						<br><br>
						<center><h3 class="card-title">U-BUS DIGITAL TICKET</h3><br>
            <img src="qr-generator.php?id=' . $qr_pass . '" alt="TIKET">
					  <div class="card-body">
					    <center>
					    <h4 class="card-text">Tanggal Berangkat: ' . $row['tglBerangkat'] . '</h4>
							<h4 class="card-text">Rute ID: ' . $row['ruteID'] . ' </h4>
							<h4 class="card-text">Asal: <strong> ' . $row['asal'] . ' </strong>  jam <strong> ' . $row['wktBerangkat'] . ' </strong></h4>
							<h4 class="card-text">Tujuan: <strong> ' . $row['tujuan'] . ' </strong>  jam <strong> ' . $row['wktTiba'] . ' </strong></h4>
							<h4 class="card-text">Nomor Kursi: <strong> ' . $row['noKursi'] . ' </strong></h4>
							<h4 class="card-text">Pengguna ID: ' . $row['penggunaID'] . ' </h4>
							<br><br>
					  </div>
					</div>
				</div>
        </div>
        </center>'
    ?>
    <div class="col-md mt-4 text-center">
      <button type="button" class="btn btn-info" onclick=location.href='beranda.php'>< Kembali ke beranda</button>
    </div>
</body>
