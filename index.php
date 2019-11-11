<?php
require 'components/header.php'
?>

<body>
    <?php
    require 'koneksi.php';
    ?>
    <div>
        <form action="masuk-beranda.php" method="post">
            <p> Masuk Sebagai </p>
            <select name="kategori" id="selectionType">
                <option value="2">Mahasiswa</option>
                <option value="1">Dosen</option>
                <option value="3">Staff</option>
            </select>
            <p>
                <input type="number" name="penggunaID" placeholder="Masukkan NIM" required="" id="inputBox">
                <script type="text/javascript">
                    var placeholderText = {
                        "Mahasiswa": "Masukkan NIM",
                        "Dosen": "Masukkan NID",
                        "Staff": "Masukkan Nomor ID"
                    };
                    $("#selectionType").on("change", function() {
                        var selection = document.getElementById("selectionType");
                        var inputBox = document.getElementById("inputBox");
                        var selectedVal = $('#selectionType').find(':selected').text();
                        if (placeholderText[selectedVal] !== undefined) {
                            inputBox.placeholder = placeholderText[selectedVal];
                        }
                    });
                </script>
                <input type="password" name="sandi" placeholder="Password" required="">
                <p>
                    <input type="submit" value="Masuk">
        </form>
    </div>
</body>

</html>