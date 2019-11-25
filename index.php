<!DOCTYPE HTML>
<html>
<head>
    <title>U-Bus | Masuk</title>
<?php
require 'components/header.php'
?>
<style>
  body {
    padding-top:120px;
  /*  background-image: url("http://www.banggaberubah.com/assets/article_image/original/UMN_1.png");
    background-color: #cccccc;
    background-size: 100%; */
    background: rgb(43,159,220);
    background: radial-gradient(circle, rgba(43,159,220,1) 0%, rgba(0,179,237,1) 93%, rgba(0,212,255,1) 100%);
  }
  div.center {
    margin: 0 auto;
  }

  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     color: white;
     text-align: center;
  }

  img {
    width: 25%;
  }

</style>
</head>
<body>
    <?php
    require 'koneksi.php';
    ?>
    <div class="container mt-5 text-center center">
      <a href="index.php">
      <center><img src="images/logo.png" class="img-fluid"></center>
    </a><p><p>
      <form action="masuk-beranda.php" method="post">
          <div class="col-xs-10 col-md-3 center">
            <label for="selectionType" style="color:white;">Masuk Sebagai</label>
            <select class="form-control input-small" name="kategori" id="selectionType">
                <option value="2">Mahasiswa</option>
                <option value="1">Dosen</option>
                <option value="3">Staff</option>
            </select>
          </div>
            <div class="col-sm-3 mt-3 center">
              <input type="text" class="form-control" name="penggunaID" placeholder="Masukkan NIM" required="" id="inputBox">
          </div>
          <div class="col-sm-3 mt-3 center">
              <input type="password" class="form-control" name="sandi" placeholder="Password" required="">
          </div>
          <div class="col-sm-3 mt-3 center">
              <button type="submit" class="btn btn-success">Masuk</button>
          </div>
        </form>
    </div>
    <div class="footer">
      <p>© 2019 Database System | Kelompok 4</p>
    </div>
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
</body>
</html>
