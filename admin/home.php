<?php
session_start();
if ($_SESSION['username'] != "ubus_admin") {
    header("Location: index.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEEK 11</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style_login.css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!--
        <form action="upload_proses.php" method="post" enctype="multipart/form-data">
        Judul:
        <input type="text" name="judul" /> <br>
        Pengumuman:
        <input type="text" name="teks" id=""> <br>
        Foto:
        <input type="file" name="foto"> <br>
        <button type="submit">UPLOAD</button>
        <script src="" async defer></script>
    </form>
-->

    <form action="upload_proses.php" method="post" class="pure-form pure-form-stacked" enctype="multipart/form-data">
        <fieldset class="pure-group">
            <input type="text" name="judul" class="pure-input-1-2" placeholder="Judul Pengumuman" />
            <textarea name="teks" class="pure-input-1-2" placeholder="Isi Pengumuman"></textarea>
            <input type="file" name="foto">
        </fieldset>
        <button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Kirim</button>

        <a href="logout.php">
            <p>Logout</p>
        </a>
    </form>

</body>

</html>