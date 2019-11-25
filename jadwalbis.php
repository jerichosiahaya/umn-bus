<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Jadwal</title>
<?php
require 'koneksi.php';
require 'components/header.php';
$userID = $_SESSION['penggunaID'];
if(empty($_SESSION['penggunaID']) || $_SESSION['penggunaID'] == ''){
header("Location: index.php");
die();
}
?>
</head>
<style>
  body {
  /*  background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
    font-family: 'Josefin Sans', sans-serif;
  }
</style>
<body>
	<div class="container">
    <div class="row">
      <div class="col-md col-sm-3 mt-4 text-right">
      <p>	<button type="button" class="btn btn-info" onclick=location.href='beranda.php'>< Kembali ke beranda</button> <p>
      </div>
    </div>
	<div>
			<p><h4>Jadwal Bis Mingguan</h4><p>
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
							        <th>Asal</th>
							        <th>Tujuan</th>
                      <th>Waktu Keberangkatan</th>
							        <th>Waktu Tiba</th>
							      </tr>
							    </thead>
							    <tbody>';
					// output data per baris
					while ($row = $result->fetch_assoc()) {
						echo '<tr>
                    <td>' . $row["asal"] . '</td>
                    <td>' . $row["tujuan"] . '</td>
                    <td>' . $row["wktBerangkat"] . '</td>
                    <td>' . $row["wktTiba"] . '</td>';
					}
					echo '</tbody> </table> </div>';
				}
			}
			?>

		</div>
	</div>
</div>

</body>
