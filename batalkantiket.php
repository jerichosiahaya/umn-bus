  <?php
    require 'koneksi.php';
    require 'components/header.php';
    ?>

  <body>
  <!--    if (isset($_GET['alert'])) {
      echo '<div class=container>
          <div class="alert alert-success">
              <strong>Kamu telah membatalkan tiket...</strong>
          </div>
      </div>';
    } ?> -->

      <div class="container">
          <h2>Batalkan Tiket</h2>
          <table border="1">
              <thead>
                  <tr>
                      <th>BusID</th>
                      <th>Rute ID</th>
                      <th>tglBerangkat</th>
                      <th>wktBerangkat</th>
                      <th>Asal</th>
                      <th>Tujuan</th>
                      <th>wktTiba</th>
                      <th>noKursi</th>
                      <th>Batalkan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    require 'db-init.php';
                    $userID = $_SESSION['penggunaID'];
                    $sql = "SELECT kategoriID FROM pengguna WHERE penggunaID='$userID';";
                    $result = $koneksi->query($sql);
                    $row = $result->fetch_assoc();
                    $userType = $row['kategoriID'];
                    $sql1 = "SELECT * FROM tiket JOIN rute ON tiket.ruteID = rute.ruteID WHERE penggunaID = '$userID' ORDER BY tglBerangkat DESC;";
                    $result1 = $koneksi->query($sql1);
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
										<td><a href="batal-tiket.php?bis=' . $row["busID"] . '&seat=' . $row["noKursi"] . '" class="btn btn-danger" role="button">Batal</a></td>
						      </tr>';
                    }
                    ?>
              </tbody>
          </table>
      </div>
  </body>
