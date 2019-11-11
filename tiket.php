<?php
require 'koneksi.php';
require 'components/header.php';
?>

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
    echo '<center><div class="container-fluid">
					<div class="card bg-info text-white" style="width:30%">
						<br><br>
						<center><img src="qr-generator.php?id=' . $qr_pass . '" alt="TIKET"><center>
					  <div class="card-body">
					    <center><h3 class="card-title">U-BUS DIGITAL TICKET</h3>
					    <h4 class="card-text">Tanggal Berangkat: ' . $row['tglBerangkat'] . '</h4>
							<h4 class="card-text">Rute ID: ' . $row['ruteID'] . ' </h4>
							<h4 class="card-text">Asal: <strong> ' . $row['asal'] . ' </strong>  jam <strong> ' . $row['wktBerangkat'] . ' </strong></h4>
							<h4 class="card-text">Tujuan: <strong> ' . $row['tujuan'] . ' </strong>  jam <strong> ' . $row['wktTiba'] . ' </strong></h4>
							<h4 class="card-text">Nomor Kursi: <strong> ' . $row['noKursi'] . ' </strong></h4>
							<h4 class="card-text">Pengguna ID: ' . $row['penggunaID'] . ' </h4>
							<br><br>
					  </div>
					</div>
				</div></center>'

    ?>
</body>
