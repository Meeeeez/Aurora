<div class="loginContainer" style="margin-left: 160px">
    <h1 class="loginHeading">Log in to your Account</h1>
    <form method="post" style="display: inline">        <!-- an datenbank schicken -->
        <label class="inputLabel" for="loginName">Email</label>
        <br>
        <input class="loginTextfield" id="loginName" type="text" style="margin: 10px 0 40px 0" required>
        <br>
        <label class="inputLabel" for="loginPassword">Password</label>
        <br>
        <input class="loginTextfield" id="loginPassword" type="password" style="margin: 10px 0 40px 0" required>
        <input class="loginButton" type="submit" value="LOG IN">
    </form>
    <form action="loginPage.php?page=signup" method="post" style="display: inline">
        <button type="submit" class="loginButton" style="border: 3px solid #3ABA50; background-color: white; color: #3ABA50; font-weight: 600" onmouseleave="this.style.color='#3ABA50'; this.style.borderColor='#3ABA50'" onmouseover="this.style.color='#29a744'; this.style.borderColor='#29a744'">SIGN UP</button>
    </form>
    <a style="color: #3ABA50; margin-left: 0" onmouseenter="this.style.color = '#29A744'" onmouseleave="this.style.color = '#3ABA50'" class="inputLabel" href="dashboard.php">Guest Login</a>
</div>
