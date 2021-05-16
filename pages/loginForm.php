<?php
session_start();
$servername = "10.10.30.2";
$username = "remoteUser";
$passwordDB = "remoteUser123!";
$dbname = "raynDB";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli($servername, $username, $passwordDB, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM TUser WHERE email='$email'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if ($result->num_rows > 0 && password_verify($password, $user['password']) || $result->num_rows > 0 && $user['password'] == md5($password)) {
        $sql = "SELECT * FROM TUser WHERE email='$email'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['role'] = $row['foreignRoleID'];
            $_SESSION['measUnit'] = $row['measurementUnit'];
            $userID = $row['userID'];

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwordDB);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO TProtocol (foreignUserID, foreignStationID) VALUES ('$userID', 1)";
            $conn->exec($sql);

            $conn = null;

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
        <input name="email" placeholder="example@mail.com" class="loginTextfield" id="loginName" type="text"
               style="margin: 10px 0 40px 0" required>
        <br>
        <label class="inputLabel" for="loginPassword">Password</label>
        <br>
        <input name="password" class="loginTextfield" id="loginPassword" type="password" style="margin: 10px 0 40px 0"
               required>
        <button name="submit" class="loginButton" type="submit">LOG IN</button>
    </form>
    <form action="index.php?page=signup" method="post" style="display: inline">
        <button type="submit" class="loginButton"
                style="border: 3px solid #3ABA50; background-color: white; color: #3ABA50; font-weight: 600"
                onmouseleave="this.style.color='#3ABA50'; this.style.borderColor='#3ABA50'"
                onmouseover="this.style.color='#29a744'; this.style.borderColor='#29a744'">SIGN UP
        </button>
    </form>
</div>