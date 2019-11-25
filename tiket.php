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
    font-family: 'Josefin Sans', sans-serif;
    color: white;
  }

  div.spasi {
    padding-bottom: 20px;
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
						<br>
						<center><h3 class="card-title">U-BUS DIGITAL TICKET</h3>
            <img src="qr-generator.php?id=' . $qr_pass . '" alt="TIKET">
					  <div class="card-body">
					    <center>
              <h4 class="card-text">Rute ID: ' . $row['ruteID'] . ' </h4>
					    <h4 class="card-text">Tanggal Berangkat: ' . $row['tglBerangkat'] . '</h4>
							<h4 class="card-text">Asal: ' . $row['asal'] . ' </h4>
              <h4 class="card-text">Waktu Berangkat: <strong> ' . $row['wktBerangkat'] . ' </strong> </h4>
							<h4 class="card-text">Tujuan: <strong> ' . $row['tujuan'] . ' </h4>
              <h4 class="card-text">Waktu Tiba: <strong> ' . $row['wktTiba'] . ' </h4>
							<h4 class="card-text">Nomor Kursi: <strong> ' . $row['noKursi'] . ' </strong></h4>
							<h4 class="card-text">Pengguna ID: ' . $row['penggunaID'] . ' </h4>
              <br>
					  </div>
					</div>
				</div>
        </div>
        </center>'
    ?>
    <div class="col-md col-sm mt-4 text-center spasi">
      <button type="button" class="btn btn-light" onclick=location.href='beranda.php'>< Kembali ke beranda </button>
      <?php
        require 'db-init.php';
        $userID = $_SESSION['penggunaID'];
        $sql1 = "SELECT * FROM tiket JOIN rute ON tiket.ruteID = rute.ruteID WHERE penggunaID=" . $userID . " AND busID=" . $bid . " AND noKursi=" . $seat . ";";
        $result1 = $koneksi->query($sql1);
        while ($row = $result1->fetch_assoc()) {
            echo '<a href="batal-tiket-satu.php?bis=' . $row["busID"] . '&seat=' . $row["noKursi"] . '" class="btn btn-danger" role="button">Batalkan Tiket</a>';}
            ?>

    </div>
</body>
