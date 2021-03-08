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
        <div class="loginContainer">
            <h1 class="loginPrompt">Login to your Account</h1>
            <form method="post">
                <label class="inputLabel" for="loginName">Email</label><br><input class="loginTextfield" id="loginName" type="text" style="margin: 10px 0 40px 0"> <br>
                <label class="inputLabel" for="loginPassword">Password</label><br><input class="loginTextfield" id="loginPassword" type="password" style="margin: 10px 0 40px 0">
                <div>
                    <input class="loginButton" type="submit" value="LOG IN">
                    <button class="loginButton" style="border: 3px solid #3ABA50; background-color: white; color: #3ABA50; font-weight: 600" onmouseleave="this.style.color='#3ABA50'; this.style.borderColor='#3ABA50'" onmouseover="this.style.color='#29a744'; this.style.borderColor='#29a744'">SIGN UP</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>