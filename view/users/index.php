<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <form action="">
            <h2 class="title-login">soiot system</h2>
            <div class="input-error">
                <input type="text" class="input-login" id="user-name" autofocus placeholder="username">
                <label for="" class="error" id="user-name_error"></label>
            </div>
            <div class="input-error">
                <input type="password" class="input-login" id="password" placeholder="password">
                <label for="" class="error" id="password_error"></label>
            </div>
            <div class="btn">
                <button type="submit" class="btn-login" id="login"><a href="./index.php?url=dashboard">Login</a></button>
                <a href="">or create new account</a>
            </div>
        </form>
    </div>
    <!-- <script src="../js/index.js"></script> -->
</body>

</html>