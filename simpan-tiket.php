<?php
require 'koneksi.php';
require 'components/header.php';
?>

<body>
    <?php
    require 'db-init.php';
    $userID = $_SESSION['penggunaID'];
    $bid = $_GET['bis'];
    $sql_instance = "SELECT * FROM tiket WHERE penggunaID=" . $userID . " AND (tglBerangkat = CURDATE() OR tglBerangkat = CURDATE() + INTERVAL 1 DAY);";
    $result = $koneksi->query($sql_instance);
    if ($result->num_rows < 6) {
        $sql_instance = "SELECT * FROM tiket WHERE busID=" . $bid . " AND penggunaID IS NULL;";
        $result = $koneksi->query($sql_instance);
        echo $koneksi->error;
        $row = $result->fetch_assoc();
        $sql_start = "SET AUTOCOMMIT = OFF; START TRANSACTION;";
        $result = $koneksi->query($sql_start);
        $sql_entry = "UPDATE tiket SET penggunaID = " . $userID . " WHERE busID=" . $bid . " AND noKursi=" . $row['noKursi'] . ";";
        $sql_seat = "UPDATE bus SET jumlah_kursi = jumlah_kursi - 1 WHERE busID=" . $bid . ";";
        if (($koneksi->query($sql_entry) == TRUE) && ($koneksi->query($sql_seat) == TRUE)) {
            $sql_commit = "COMMIT;";
            $result = $koneksi->query($sql_commit);
            $redurl = "tiket.php?seat=" . $row['noKursi'] . "&bis=" . $row['busID'];
            redirect($redurl);
        } else {
            echo $koneksi->error;
            $sql_rollback = "ROLLBACK;";
            $result = $koneksi->query($sql_rollback);
            echo 'Sorry, there was a problem :(';
            Fail();
        }
    } else {
        $redurl = "pesantiket.php?alert=0";
        redirect($redurl);
        Limit();
    }
    function redirect($url)
    {
        ob_start();
        header('Location: ' . $url);
        ob_end_flush();
        die();
    }
    function Fail()
    {
        echo 'Sorry, there was a problem :(';
    }
    function Limit()
    {
        echo 'Sorry, you have exceeded the daily ticket limit!';
    }
    ?>
</body>