<?php
  require 'koneksi.php';
  require 'components/header.php';
  ?>

<body>
    <?php
    /* hanya untuk konfigurasi batalkan tiket di page tiket */
      require 'db-init.php';
      $userID = $_SESSION['penggunaID'];
      $bid = $_GET['bis'];
      $seat = $_GET['seat'];
      $sql_start = "SET AUTOCOMMIT = OFF; START TRANSACTION;";
      $result = $koneksi->query($sql_start);
      $sql_instance = "UPDATE tiket SET penggunaID = NULL WHERE penggunaID=" . $userID . " AND busID=" . $bid . " AND noKursi=" . $seat . ";";
      $sql_seat = "UPDATE bus SET jumlah_kursi = jumlah_kursi + 1 WHERE busID=" . $bid . ";";
      if (($koneksi->query($sql_instance) == TRUE) && ($koneksi->query($sql_seat) == TRUE)) {
          $sql_commit = "COMMIT;";
          $result = $koneksi->query($sql_commit);
          #echo 'Berhasi';
          header('Location: pesantiket.php');
      } else {
          echo $koneksi->error;
          $sql_rollback = "ROLLBACK;";
          $result = $koneksi->query($sql_rollback);
          echo ':(';
      }
      ?>
</body>
