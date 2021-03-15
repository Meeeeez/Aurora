<?php
    session_start();
    $servername = "weatherwebapp-db-new.cikkod1lareu.us-east-1.rds.amazonaws.com";
    $username = "login/signup";
    $passwordDB = "Login/SingupUserPassword123!";
    $dbname = "WeatherWebApp";

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $conn = new mysqli($servername, $username, $passwordDB, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM TUser WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_SESSION['username'] = $row['firstName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['measUnit'] = $row['measurementUnit'];
                header("Location: dashboard.php");
            }
        } else {
            echo "<script>alert('Incorrect Email or Password')</script>";
        }
    }
?>


<div class="loginContainer" style="margin-left: 160px">
    <h1 class="loginHeading">Log in to your Account</h1>
    <form action="" method="POST" style="display: inline">        <!-- an datenbank schicken -->
        <label class="inputLabel" for="loginName">Email</label>
        <br>
        <input name="email" placeholder="example@mail.com" class="loginTextfield" id="loginName" type="text" style="margin: 10px 0 40px 0" required>
        <br>
        <label class="inputLabel" for="loginPassword">Password</label>
        <br>
        <input name="password" class="loginTextfield" id="loginPassword" type="password" style="margin: 10px 0 40px 0" required>
        <button name="submit" class="loginButton" type="submit">LOG IN</button>
    </form>
    <form action="loginPage.php?page=signup" method="post" style="display: inline">
        <button type="submit" class="loginButton" style="border: 3px solid #3ABA50; background-color: white; color: #3ABA50; font-weight: 600" onmouseleave="this.style.color='#3ABA50'; this.style.borderColor='#3ABA50'" onmouseover="this.style.color='#29a744'; this.style.borderColor='#29a744'">SIGN UP</button>
    </form>
    <a style="color: #3ABA50; margin-left: 0" onmouseenter="this.style.color = '#29A744'" onmouseleave="this.style.color = '#3ABA50'" class="inputLabel" href="dashboard.php">Guest Login</a>
</div>
