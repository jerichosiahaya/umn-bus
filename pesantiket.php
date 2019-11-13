<?php
require 'koneksi.php';
require 'components/header.php';
?>

<body>
	<div class="container">
		<h2>Silahkan Pilih Rute</h2>
		<!--
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#today">Hari ini</a></li>
			<li><a data-toggle="tab" href="#tomorrow">Besok</a></li>
		</ul>
		-->
		<div id="today">
			<h4>Jadwal Bis Hari Ini:</h4>
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
					echo '<table height:800px; display:block;" border="1">
							    <thead>
							      <tr>
							        <th>Bis ID</th>
							        <th>Rute ID</th>
							        <th>Jumlah Kursi</th>
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
                    <td>' . $row["busID"] . '</td>
                    <td>' . $row["ruteID"] . '</td>
                    <td>' . $row["jumlah_kursi"] . '</td>
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
					echo '</tbody> </table>';
				}
			}
			?>
		</div>
		<div id="tomorrow">
			<h4>Jadwal Bis Besok:</h4>
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
					echo '<table height:800px; display:block;" border="1">
					<thead>
					  <tr>
						<th>Bis ID</th>
						<th>Rute ID</th>
						<th>Jumlah Kursi</th>
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
						<td>' . $row["busID"] . '</td>
						<td>' . $row["ruteID"] . '</td>
						<td>' . $row["jumlah_kursi"] . '</td>
						<td>' . $row["wktBerangkat"] . '</td>
						<td>' . $row["asal"] . '</td>
						<td>' . $row["tujuan"] . '</td>
						<td>' . $row["wktTiba"] . '</td>
										<td><a href="simpan-tiket.php?bis=' . $row["busID"] . '" class="btn btn-success" role="button">Pesan</a></td>
						      </tr>';
					}
					echo '</tbody> </table>';
				}
			}
			?>
		</div>
		<p>
		<input type="submit" value="Beranda" onclick="location.href='beranda.php';">
</body>