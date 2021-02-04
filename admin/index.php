<!DOCTYPE html>

<html class="no-js">

<!--
    * Jericho C Siahaya
    * 00000032932
-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Week 13</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_login.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
</head>

<body>
    <form action="login_proses.php" method="post" class="pure-form pure-form-stacked">
        <fieldset>

            <div class="box">
                <h1>Login</h1>
                <label for="email">Username:</label>
                <input id="email" type="text" name="uname" placeholder="Username">
            </div>

            <div class="box">
                <label for="password">Password:</label>
                <input id="password" type="password" name="upass" placeholder="Password">
            </div>

            <div class="box">
                <button type="submit" class="pure-button pure-button-primary">Sign in</button>
                <!-- <p>Belum punya akun? <a href="register.php">Register</a></p> -->
            </div>
        </fieldset>
    </form>
    <script src="" async defer></script>
</body>

</html>