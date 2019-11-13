  <?php
    require 'koneksi.php';
    require 'components/header.php';
    ?>

  <body>
      <div class="container">
          <h2>Tiket Kamu</h2>
          <table border="1">
              <thead>
                  <tr>
                      <th>Bus ID</th>
                      <th>Route ID</th>
                      <th>Journey Date</th>
                      <th>Departure Time</th>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>Arrival Time</th>
                      <th>Seat Number</th>
                      <th>Digital Ticket</th>
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
                    <td><a href="tiket.php?seat=' . $row['noKursi'] . '&bis=' . $row['busID'] . '" class="btn btn-info" role="button">Lihat</a></td>
						      </tr>';
                    }
                    ?>
              </tbody>
          </table>
      </div>
      <p>
      <input type="submit" value="Beranda" onclick="location.href='beranda.php';">
      <input type="submit" value="Batalkan Tiket" onclick="location.href='batalkantiket.php';">
  </body>