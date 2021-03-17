<?php
    $servername = "weatherwebapp-db-new.cikkod1lareu.us-east-1.rds.amazonaws.com";
    $username = "stationAdministrator";
    $password = "StatioAdministrator123!";
    $dbname = "WeatherWebApp";

    if(isset($_GET['submit'])){
        if($_GET['submit'] == 'delUser'){
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM TUser WHERE foreignRoleID = 2";
            $conn->query($sql);
            $conn->close();
            echo "<script>alert('Records Deleted');</script>";
        }else if($_GET['submit'] == 'delMeas'){
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM TMeasurement";
            $conn->query($sql);
            $conn->close();
            echo "<script>alert('Records Deleted');</script>";
        }else if($_GET['submit'] == 'delProt'){
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM TProtocol";
            $conn->query($sql);
            $conn->close();
            echo "<script>alert('Records Deleted');</script>";
        }else if($_GET['submit'] == 'seeProt'){
            echo "<script>alert('adsfgdhfsrfaedgn');</script>";
        }
    }
?>

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
    <form action="" method="GET">
        <ul>
            <li>
                <button name="submit" id="button4" onmouseover="mouseEnter()" value="seeProt" class="adminButton">Check Protocol</button>
            </li>
            <li>
                <button name="submit" id="button1" onmouseover="mouseEnter()" value="delUser" class="adminButton">Delete all Users</button>
            </li>
            <li>
                <button name="submit" id="button2" onmouseover="mouseEnter()" value="delProt" class="adminButton">Clear Protocol</button>
            </li>
            <li>
                <button name="submit" id="button3" onmouseover="mouseEnter()" value="delMeas" class="adminButton">Delete all Measurements</button>
            </li>
        </ul>
    </form>


    <script type="text/javascript">
        function mouseEnter(){
            document.getElementById("button1").style.cursor = "pointer";
            document.getElementById("button2").style.cursor = "pointer";
            document.getElementById("button3").style.cursor = "pointer";
            document.getElementById("button4").style.cursor = "pointer";
        }
    </script>
</div>
<img id="scrollGif2" onmouseover="document.getElementById('scrollGif2').style.cursor = 'pointer';" onclick="if(window.pageYOffset === 0) window.scrollBy(0, 350);" src="../sources/Scroll.gif" style="height: 100px; width: 100px; margin-left: 650px" alt="scroll gif">
