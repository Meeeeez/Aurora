<div class="greeting">
    <h1 class="heading-greeting" id="heading-greeting"></h1>
    <script>
        let name = '<?php echo $_SESSION['firstName'] ?>';
        document.getElementById("heading-greeting").innerHTML = "Hello " + name + "!";
    </script>
    <h3 class="prompt-greeting">Check out todays measurements</h3>
    <img id="scrollGif" onmouseover="changeCursor()" onclick="scrollDown()" src="../sources/Scroll.gif" style="height: 100px; width: 100px; margin-left: 650px" alt="scroll gif">
    <script type="text/javascript">
        var scrolledUnderPoint = false;

        window.addEventListener("scroll", function (){
            if(scrolledUnderPoint === false && window.pageYOffset >= 240){
                scrolledUnderPoint = true;
            }

            if(scrolledUnderPoint && window.pageYOffset <= 240){
                window.scrollTo(0, 240);
            }
        });

        function changeCursor(){
            document.getElementById("scrollGif").style.cursor = "pointer";
        }

        function scrollDown(){
            window.scrollBy(0, 239);
        }
    </script>
</div>