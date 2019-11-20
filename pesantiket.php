<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Pesan Tiket</title>
<?php
require 'koneksi.php';
require 'components/header.php';
?>
</head>
<style>
  body {
  /*  background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
  }

  div.top {
    margin-top: 10px;
  }

</style>
<body>
	<div class="container">
    <div class="row">
      <div class="col-md col-sm-3 text-left mt-4">
		<h2>Silahkan Pilih Rute</h2>
      </div>
      <div class="col-md col-sm-3 mt-4 text-right">
      <p>	<button type="button" class="btn btn-info" onclick=location.href='beranda.php'>< Kembali ke beranda</button> <p>
      </div>
    </div>
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" class="nav-link active" href="#today">Hari ini</a>
				</li>
				<li>
					<a data-toggle="tab" class="nav-link" href="#tomorrow">Besok</a>
				</li>
			</ul>
	<div class="tab-content">
		<div id="today" class="tab-pane fade show active">
			<p><h4>Jadwal Bis Hari Ini:</h4><p>
			<?php
			createTable();
			function createTable()
			{
				require 'components/db-ts.php';
				$u = $_SESSION['penggunaID'];
				$sql = "SELECT kategoriID FROM pengguna WHERE penggunaID='$u';";
				$result = $koneksi->query($sql);
				$row = $result->fetch_assoc();
				$userType = $row['kategoriID'];
				$sql_instance = "SELECT * FROM bus JOIN rute ON rute.ruteID=bus.ruteID WHERE tglBerangkat = CURDATE() ORDER BY bus.wktBerangkat ASC;";
				$result = $koneksi->query($sql_instance);
				if (!$result) {
					trigger_error('Invalid query: ' . $koneksi->error);
				}
				if ($result->num_rows > 0) {
					echo '<div class="table-responsive-sm">
                <table class="table">
							    <thead>
							      <tr>
							        <th>Jumlah Kursi</th>
											<th>Tanggal Berangkat</th>
							        <th>Waktu Keberangkatan</th>
							        <th>Asal</th>
							        <th>Tujuan</th>
							        <th>Waktu Tiba</th>
							        <th>Pesan Tiket</th>
							      </tr>
							    </thead>
							    <tbody>';
					// output data per baris
					while ($row = $result->fetch_assoc()) {
						echo '<tr>
                    <th>' . $row["jumlah_kursi"] . '</td>
										<td>' . $row["tglBerangkat"] . '</td>
                    <td>' . $row["wktBerangkat"] . '</td>
                    <td>' . $row["asal"] . '</td>
                    <td>' . $row["tujuan"] . '</td>
                    <td>' . $row["wktTiba"] . '</td>';
						if ($row['jumlah_kursi'] > 15) {
							echo '<td><a href="simpan-tiket.php?bis=' . $row["busID"] . '" class="btn btn-success" role="button">Pesan</a></td>
                  </tr>';
						} elseif ($row['jumlah_kursi'] > 0) {
							echo '<td><a href="simpan-tiket.php?bis=' . $row["busID"] . '" class="btn btn-warning" role="button">Pesan</a></td>
                  </tr>';
						} else {
							echo '<td><a href="simpan-tiket.php?bis=' . $row["busID"] . '" class="btn btn-danger disabled" role="button">Habis</a></td>
                  </tr>';
						}
					}
					echo '</tbody> </table> </div>';
				}
			}
			?>
		</div>
		<div id="tomorrow" class="tab-pane fade">
			<p><h4>Jadwal Bis Besok:</h4><p>
			<?php
			createTable1();
			function createTable1()
			{
				require 'components/db-ts.php';
				$u = $_SESSION['penggunaID'];
				$sql = "SELECT kategoriID FROM pengguna WHERE penggunaID='$u';";
				$result = $koneksi->query($sql);
				$row = $result->fetch_assoc();
				$userType = $row['kategoriID'];
				$sql_instance = "SELECT * FROM bus JOIN rute ON rute.ruteID=bus.ruteID WHERE tglBerangkat = CURDATE() + INTERVAL 1 DAY ORDER BY bus.wktBerangkat ASC;";
				$result = $koneksi->query($sql_instance);
				if (!$result) {
					trigger_error('Invalid query: ' . $koneksi->error);
				}
				if ($result->num_rows > 0) {
					echo '<div class="table-responsive-sm">
                <table class="table">
					<thead>
					  <tr>
						<th>Jumlah Kursi</th>
						<th>Tanggal Berangkat</th>
						<th>Waktu Keberangkatan</th>
						<th>Asal</th>
						<th>Tujuan</th>
						<th>Waktu Tiba</th>
						<th>Pesan Tiket</th>
					  </tr>
					</thead>
					<tbody>';
					// data per baris
					while ($row = $result->fetch_assoc()) {
						echo '<tr>
						<th>' . $row["jumlah_kursi"] . '</td>
						<td>' . $row["tglBerangkat"] . '</td>
						<td>' . $row["wktBerangkat"] . '</td>
						<td>' . $row["asal"] . '</td>
						<td>' . $row["tujuan"] . '</td>
						<td>' . $row["wktTiba"] . '</td>
										<td><a href="simpan-tiket.php?bis=' . $row["busID"] . '" class="btn btn-success" role="button">Pesan</a></td>
						      </tr>';
					}
					echo '</tbody> </table> </div>';
				}
			}
			?>
		</div>
	</div>
</div>

</body>
