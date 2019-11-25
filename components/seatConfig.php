<?php
ini_set('max_execution_time', 300);
?>
<?php
require 'db-ts.php';
// untuk menghapus jadwal bus pada tabel bus yang tgl berangkatnya kurang dari hari ini
$sql = "DELETE FROM bus WHERE tglBerangkat < CURDATE()";
$result = $koneksi->query($sql);
echo $koneksi->error;

//
$sql_instance = "SELECT * FROM bus WHERE tglBerangkat = CURDATE() ORDER BY wktBerangkat ASC;";
$result = $koneksi->query($sql_instance);
$row = $result->fetch_assoc();
if ($result->num_rows == 0) {
    $sql_instance = "SELECT * FROM rute ORDER BY wktBerangkat ASC;";
    $result = $koneksi->query($sql_instance);
    $ind = 0;
    while ($row = $result->fetch_assoc()) {
        if ($result->num_rows > 0) {
            $result2 = $koneksi->query("INSERT INTO bus VALUES
	        				(DAYOFWEEK(CURDATE())+'" . $ind . "','" . $row["ruteID"] . "','" . $row["kapasitas"] . "',CURDATE(),'" . $row["wktBerangkat"] . "');");
            $ind = $ind + 1;
            echo $koneksi->error;
        } else break;
    }
}

$sql_instance = "SELECT * FROM bus WHERE tglBerangkat = CURDATE() + INTERVAL 1 DAY ORDER BY wktBerangkat ASC;";
$result = $koneksi->query($sql_instance);
$row = $result->fetch_assoc();
if ($result->num_rows == 0) {
    $sql_instance = "SELECT * FROM rute ORDER BY wktBerangkat ASC;";
    $result = $koneksi->query($sql_instance);
    $ind = 0;
    while ($row = $result->fetch_assoc()) {
        if ($result->num_rows > 0) {
            $result2 = $koneksi->query("INSERT INTO bus VALUES
	        				(DAYOFWEEK(CURDATE() + INTERVAL 1 DAY)*10+'" . $ind . "','" . $row["ruteID"] . "','" . $row["kapasitas"] . "',CURDATE() + INTERVAL 1 DAY,'" . $row["wktBerangkat"] . "');");
            $ind = $ind + 1;
            echo $koneksi->error;
        } else break;
    }
}

$sql = "DELETE FROM tiket WHERE tglBerangkat < CURDATE() - INTERVAL 2 DAY";
$result = $koneksi->query($sql);
echo $koneksi->error;

$sql = "SELECT * FROM tiket WHERE tglBerangkat = CURDATE()";
$result = $koneksi->query($sql);
echo $koneksi->error;
if ($result->num_rows == 0) {
    $sql1 = "SELECT busID, ruteID, jumlah_kursi FROM bus WHERE tglBerangkat = CURDATE()";
    $result1 = $koneksi->query($sql1);
    echo $koneksi->error;
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            for ($i = 1; $i <= $row["jumlah_kursi"]; $i++) {
                $sql2 = "INSERT INTO tiket VALUES (" . $row["busID"] . "," . $row["ruteID"] . "," . $i . ",NULL,CURDATE());";
                $result2 = $koneksi->query($sql2);
                echo $koneksi->error;
            }
        }
    }
}

$sql = "SELECT * FROM tiket WHERE tglBerangkat = CURDATE() + INTERVAL 1 DAY";
$result = $koneksi->query($sql);
echo $koneksi->error;
if ($result->num_rows == 0) {
    $sql1 = "SELECT busID, ruteID, jumlah_kursi FROM bus WHERE tglBerangkat = CURDATE() + INTERVAL 1 DAY";
    $result1 = $koneksi->query($sql1);
    echo $koneksi->error;
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            for ($i = 1; $i <= $row["jumlah_kursi"]; $i++) {
                $sql2 = "INSERT INTO tiket VALUES (" . $row["busID"] . "," . $row["ruteID"] . "," . $i . ",NULL,CURDATE() + INTERVAL 1 DAY);";
                $result2 = $koneksi->query($sql2);
                echo $koneksi->error;
            }
        }
    }
}
