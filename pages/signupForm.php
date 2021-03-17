<?php
    session_start();
    $servername = "weatherwebapp-db-new.cikkod1lareu.us-east-1.rds.amazonaws.com";
    $username = "login/signup";
    $passwordDB = "Login/SingupUserPassword123!";
    $dbname = "WeatherWebApp";

    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['firstName'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $preferredMeasUnit = $_POST['preferredMeasUnit'];


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passwordDB);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO TUser (foreignRoleID, email, firstName, lastName, password, measurementUnit) values (2, '$email', '$firstName', '$lastName', '$password', '$preferredMeasUnit');";
            $conn->exec($sql);
            $_SESSION['measUnit'] = $preferredMeasUnit;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['role'] = 2;

            header('Location: dashboard.php');  //redirect to dashboard
        } catch(PDOException $e) {
            echo "<script>alert('This email is already in use. Please try again.')</script>";
        }
        $conn = null;
    }
?>



<div class="loginContainer" style="margin: 30px 0 0 135px">
    <h1 class="loginHeading">Create an Account</h1>
    <form action="" method="POST" style="display: inline">
        <div style="display: inline-block">
            <label class="inputLabel" for="signupFirstName">First Name</label>
            <br>
            <input name="firstName" placeholder="Max" class="loginTextfield" id="signupFirstName" type="text" style="margin: 10px 50px 40px 0; width: 250px" required>
        </div>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupLastName">Last Name</label>
            <br>
            <input name="lastName" placeholder="Mustermann" class="loginTextfield" id="signupLastName" type="text" style="margin: 10px 0 40px 0; width: 250px" required>
        </div>
        <br>
        <label class="inputLabel" for="signupEmail">Email</label>
        <br>
        <input onkeyup="validate()" name="email" placeholder="example@mail.net" class="loginTextfield" id="signupEmail" type="text" style="margin: 10px 0 40px 0; width: 560px" required>
        <br>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupPassword">Password</label>
            <br>
            <input name="password" class="loginTextfield" id="signupPassword" type="password" style="margin: 10px 50px 40px 0; width: 250px" required>
        </div>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupVerifyPassword">Verify Password</label>
            <br>
            <input onkeyup="checkIfPasswordsMatch()" class="loginTextfield" id="signupVerifyPassword" type="password" style="margin: 10px 0 40px 0; width: 250px" required>
        </div>
        <br>
        <label class="inputLabel">Preferred Measurement System</label>
        <br>
        <input style="margin-top: 20px" class="radioSignup" name="preferredMeasUnit" id="radioMetric" type="radio" value="metric" required>
        <label style="font-weight: 450; padding-top: 20px" class="inputLabel" for="radioMetric">Metric</label>
        <br>
        <input class="radioSignup" name="preferredMeasUnit" id="radioImperial" type="radio" value="imperial" required>
        <label style="font-weight: 450; padding-bottom: 10px" class="inputLabel" for="radioImperial">Imperial</label>
        <br>
        <button name="submit" id="loginButton" style="width: 220px; margin-top: 20px; display: inline-block" class="loginButton" type="submit">CREATE ACCOUNT</button>
        <p id="errorPassword" style="display: inline-block"></p>
    </form>

    <script type="text/javascript">
        let errorMessage = document.getElementById("errorPassword");
        let email = document.getElementById("signupEmail");
        let sendButton = document.getElementById("loginButton");

        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function validate() {
            errorMessage.innerHTML = "";

            if (!validateEmail(email.value)) {
                disableButton();
                errorMessage.innerHTML = "Invalid email!";
            }else {
                enableButton();
            }
            return false;
        }

        function checkIfPasswordsMatch(){
            let signupPassword = document.getElementById("signupPassword");
            let signupVerifyPassword = document.getElementById("signupVerifyPassword");

            if(signupPassword.value !== signupVerifyPassword.value){
                errorMessage.innerHTML = "Passwords don't match!";
                disableButton();
            }else if(signupPassword.value === signupVerifyPassword.value) {
                errorMessage.innerHTML = "";
                enableButton();
                validate();
            }
        }

        function disableButton(){
            sendButton.disabled = true;
            sendButton.style.backgroundColor = "#d2d2d2";
        }

        function enableButton(){
            sendButton.disabled = false;
            sendButton.style.backgroundColor = "#3ABA50";
            sendButton.onmouseleave = function () {sendButton.style.backgroundColor = "#3ABA50"};
            sendButton.onmouseenter = function () {sendButton.style.backgroundColor = "#29A744"};
        }

    </script>

</div>

