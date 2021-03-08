<div class="loginContainer" style="margin: 30px 0 0 135px">
    <h1 class="loginHeading">Create an Account</h1>
    <form method="post" style="display: inline">
        <div style="display: inline-block">
            <label class="inputLabel" for="signupFirstName">First Name</label>
            <br>
            <input class="loginTextfield" id="signupFirstName" type="text" style="margin: 10px 50px 40px 0; width: 250px">
        </div>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupLastName">Last Name</label>
            <br>
            <input class="loginTextfield" id="signupLastName" type="text" style="margin: 10px 0 40px 0; width: 250px">
        </div>
        <br>
        <label class="inputLabel" for="signupEmail">Email</label>
        <br>
        <input class="loginTextfield" id="signupEmail" type="text" style="margin: 10px 0 40px 0; width: 250px">
        <br>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupPassword">Password</label>
            <br>
            <input class="loginTextfield" id="signupPassword" type="password" style="margin: 10px 50px 40px 0; width: 250px">
        </div>
        <div style="display: inline-block">
            <label class="inputLabel" for="signupVerifyPassword">Verify Password</label>
            <br>
            <input class="loginTextfield" id="signupVerifyPassword" type="password" style="margin: 10px 0 40px 0; width: 250px">
        </div>
        <br>
        <label class="inputLabel">Preferred Unit of Measurement</label>
        <br>
        <input style="margin-top: 20px" class="radioSignup" name="preferredMeasUnit" id="radioMetric" type="radio" value="metric">
        <label style="font-weight: 450; padding-top: 20px" class="inputLabel" for="radioMetric">Metric</label>
        <br>
        <input class="radioSignup" name="preferredMeasUnit" id="radioImperial" type="radio" value="imperial">
        <label style="font-weight: 450; padding-bottom: 10px" class="inputLabel" for="radioImperial">Imperial</label>
        <br>
        <input style="width: 220px; margin-top: 20px" class="loginButton" type="submit" value="CREATE ACCOUNT">
    </form>
</div>

