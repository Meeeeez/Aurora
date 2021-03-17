<style>
    .adminPanel {
        background-color: white;
    }

    .adminButton {
        border: none;
        text-decoration: underline;
        color: dodgerblue;
        background-color: white;
    }
</style>
<div class="adminPanel">
    <h1 style="margin: 0">Admin Panel</h1>
    <h2 style="margin: 10px 0 5px 0" id="adminGreeting"></h2>
    <script>
        let adminGreeting = document.getElementById("adminGreeting");
        let adminName = '<?php echo $_SESSION['firstName'] ?>'
        adminGreeting.innerHTML = "Hello " + adminName + "! What do you want to do?";
    </script>
    <ul>
        <li>
            <button id="button1" onmouseover="mouseEnter()" onclick="deleteUsers()" class="adminButton">Delete all Users</button>
        </li>
        <li>
            <button id="button2" onmouseover="mouseEnter()" onclick="clearProtocol()" class="adminButton">Clear Protocol</button>
        </li>
        <li>
            <button id="button3" onmouseover="mouseEnter()" onclick="deleteMeasurements()" class="adminButton">Delete all Measurements</button>
        </li>
    </ul>

    <script type="text/javascript">
        function mouseEnter(){
            document.getElementById("button1").style.cursor = "pointer";
            document.getElementById("button2").style.cursor = "pointer";
            document.getElementById("button3").style.cursor = "pointer";
        }
    </script>
</div>
<img id="scrollGif" onmouseover="changeCursor()" onclick="scrollDown()" src="../sources/Scroll.gif" style="height: 100px; width: 100px; margin-left: 650px" alt="scroll gif">
<script type="text/javascript">
    function scrollDown(){
        if(window.pageYOffset === 0){
            window.scrollBy(0, 320);
        }
    }

    function changeCursor(){
        document.getElementById("scrollGif").style.cursor = "pointer";
    }
</script>
