<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Profil</title>
<?php
require 'components/header.php';
require 'koneksi.php';
$userID = $_SESSION['penggunaID'];
if(empty($_SESSION['penggunaID']) || $_SESSION['penggunaID'] == ''){
header("Location: index.php");
die();
}
?>
<style>
  body {
    padding-top:120px;
  /*  background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
    color: white;
  }
</style>
</head>
<body>
  <?php
	require 'components/db-ts.php';
	$userID = $_SESSION['penggunaID'];
  $sql="SELECT kategoriID FROM pengguna WHERE penggunaID='$userID';";
  $result = $koneksi->query($sql);
  $row=$result->fetch_assoc();
  $userType=$row['kategoriID'];
  if($userType== 1){
	$sql_instance="SELECT * FROM dosen WHERE penggunaID=".$userID.";";
	$result = $koneksi->query($sql_instance);
	$row = $result->fetch_assoc();
	echo '<center><div class="container">
            <div class="col-sm col-md-5">
            <div class="card bg-dark">
              <div class="card-header"><h3>Profil Kamu</h3></div>
					    <div class="card-header"><h3>Profil Kamu</h3></div>
              <h4 class="card-body text-justify"><center>NID: '.$row['penggunaID'].'</center></h4>
					    <h4 class="card-body text-justify"><center>Nama: '.$row['nama'].'</center></h4>
							<h4 class="card-body text-justify"><center>Prodi: '.$row['prodi'].'</center></h4>
							<h4 class="card-body text-justify"><center>No Telp:'.$row['noTelp'].'</center></h4>
					  </div>
					</div>
          </div>
				</div>';
  }
  elseif($userType== 2){
	$sql_instance="SELECT * FROM mahasiswa WHERE penggunaID=".$userID.";";
	$result = $koneksi->query($sql_instance);
	$row = $result->fetch_assoc();
	echo '<center><div class="container">
          <div class="col-sm col-md-5">
					<div class="card bg-dark">
					    <div class="card-header"><h3>Profil Kamu</h3></div>
              <h4 class="card-body text-justify"><center>NIM: '.$row['penggunaID'].'</center></h4>
					    <h4 class="card-body text-justify"><center>Nama: '.$row['nama'].'</center></h4>
							<h4 class="card-body text-justify"><center>Prodi: '.$row['prodi'].'</center></h4>
              <h4 class="card-body text-justify"><center>Angkatan: '.$row['angkatan'].'</center></h4>
							<h4 class="card-body text-justify"><center>No Telp: '.$row['noTelp'].'</center></h4>
					    </div>
					    </div>
          </div>
				</div>';
  }

  elseif($userType== 3){
	$sql_instance="SELECT * FROM staff WHERE penggunaID=".$userID.";";
	$result = $koneksi->query($sql_instance);
	$row = $result->fetch_assoc();
	echo '<center><div class="container">
            <div class="col-sm col-md-5">
            <div class="card bg-dark">
              <div class="card-header"><h3>Profil Kamu</h3></div>
					    <div class="card-header"><h3>Your BusKaro Profile</h3></div>
              <h4 class="card-body text-justify"><center>Nomor ID: '.$row['penggunaID'].'</center></h4>
              <h4 class="card-body text-justify"><center>Nama: '.$row['nama'].'</center></h4>
              <h4 class="card-body text-justify"><center>No Telp: '.$row['noTelp'].'</center></h4>
					  </div>
					  </div>
          </div>
				</div>';
  }
	?>
</body>
</html>
