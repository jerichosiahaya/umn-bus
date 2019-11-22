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

  div.pesan {
    margin-top: 250px;
  }
</style>
  <body>
      <div class="container">
      <div class="row">
      <div class="col-md col-sm-3 text-left mt-4">
          <h2>Tiket Kamu</h2>
          </div>
          <div class="col-md col-sm-3 mt-4 text-right">
      <p>	<button type="button" class="btn btn-info" onclick=location.href='beranda.php'>< Kembali ke beranda</button> <p>
      </div>
      <?php
        require 'db-init.php';
        $userID = $_SESSION['penggunaID'];
        $sql1 = "SELECT * FROM tiket JOIN rute ON tiket.ruteID = rute.ruteID WHERE penggunaID = '$userID' ORDER BY tglBerangkat DESC;";
        $result1 = $koneksi->query($sql1);
        $numrows = mysqli_num_rows($result1);
        if ($numrows==0) {
          echo "<div class='container text-center' style='margin-top: 150px;'>
          <div class= 'col-md-8 col-lg align-self-center'>
          <center>
              <h2>Kamu belum memesan tiket..</h2>
          </center>
          </div>
              </div>";
        }
          else {
          echo '<table class="table">
              <thead>
                  <tr>
                      <th>Bus ID</th>
                      <th>Rute ID</th>
                      <th>Tanggak Berangkat</th>
                      <th>Waktu Berangkat</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>Waktu Tiba</th>
                      <th>Nomor Kursi</th>
                      <th>Tiket Digital</th>
                  </tr>
              </thead>
              <tbody>';
                      while ($row = $result1->fetch_assoc()) {
                          echo '<tr>
  						        <td>' . $row["busID"] . '</td>
  						        <td>' . $row["ruteID"] . '</td>
  						        <td>' . $row["tglBerangkat"] . '</td>
  						        <td>' . $row["wktBerangkat"] . '</td>
  						        <td>' . $row["asal"] . '</td>
  						        <td>' . $row["tujuan"] . '</td>
  						        <td>' . $row["wktTiba"] . '</td>
  										<td>' . $row["noKursi"] . '</td>
                      <td><a href="tiket.php?seat=' . $row['noKursi'] . '&bis=' . $row['busID'] . '" class="btn btn-info" role="button">Lihat</a></td>
  						      </tr>';
                    }
                    }
                    ?>
              </tbody>
          </table>
      </div>
<script>
</script>
  </body>
