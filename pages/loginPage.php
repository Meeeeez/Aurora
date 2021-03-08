<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login_stylesheet.css">
    <title>Login</title>
</head>
<body>
    <div class="imageContainer">
        <img class="image" src="../sources/weatherLoginIllustration.jpeg" alt="login_illustration">
    </div>
    <div class="loginPage">
        <?php
            if(empty($_GET['page'])) {
                include("../pages/loginForm.php");
            }else if ($_GET['page'] = "signup") {
                include("../pages/signupForm.php");
            }
        ?>
    </div>
</body>
</html>