<!--
     TODO: - mehr charts
           - zwischen wetterstationen wechseln (vlt a homepage)
 -->

<?php
    session_start();

    $conn2 = new mysqli("weatherwebapp-db-new.cikkod1lareu.us-east-1.rds.amazonaws.com", "user", "UserPassword123!", "WeatherWebApp");

    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
    }
    $sql = "SELECT * FROM TMeasurement ORDER BY measurementID DESC LIMIT 1;";
    $result = $conn2->query($sql);
    $conn2->close();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $temperatureMeas = $row["temperature"];
            $humidityMeas = $row["humidity"];
            $pressureMeas = $row["pressure"];
            $dateMeas = $row["dateTime"];
        }
    } else {
        echo "<script>alert('Error: No Data in Database')</script>";
    }

    if(isset($_SESSION['measUnit'])){
        if($_SESSION['measUnit'] == "imperial"){
            $temperatureMeas = ($temperatureMeas * 9/5) + 32;
            $pressureMeas = round($pressureMeas * 0.0295301, 2);

            $upperLimitPresChart = 32 - $pressureMeas;
            $upperLimitTempChart = 134 - $temperatureMeas;
            $tempString = $temperatureMeas . "°F";
            $pressString = $pressureMeas . "in";
        }elseif ($_SESSION['measUnit'] == "metric"){
            $upperLimitPresChart = 1183 - $pressureMeas;
            $upperLimitTempChart = 57 - $temperatureMeas;
            $tempString = $temperatureMeas . "°C";
            $pressString = $pressureMeas . "mb";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../sources/favicon.png"/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="1500">
    <title>Dashboard - Villnöss</title>
    <link rel="stylesheet" href="../css/dashboard_stylesheet.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/> <!-- leaflet karten integration -->
    <script type="text/javascript" src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>   <!-- chart.js diagramme -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>    <!-- moment.js für zeitunterschied -->
</head>
<body>
<div class="station-info">
    <h1 class="station-location">VILLNÖSS</h1>
    <p class="station-location-further">Bolzano, Italy</p>
    <a class="station-coordinates-time">46.64, 11.67</a>
    <p class="station-local-time-label">Local Time: </p>
    <p class="station-coordinates-time" id="time"></p>
    <div class="active-badge" id="activityBadge"></div>
    <script type="text/javascript" src="../js/get_localTime.js"></script>
</div>

<div class="divider"></div>
<div class="dashboard-meas">
    <h3 class="dashboard-meas-heading">Latest Observation</h3>

    <p class="dashboard-meas-latest-data" id="latestData"></p>
    <script type="text/javascript">
        formatDate()

        function formatDate() {
            let dateMeas = "<?php echo $dateMeas ?>";
            let date = new Date();
            let time;
            let hours = date.getHours().toString();
            let min = date.getMinutes().toString();
            let sec = date.getSeconds().toString();

            /* Zeug für tage unterschied
            let day = date.getDate().toString();
            let month = date.getMonth().toString();
            let year = date.getFullYear().toString();

            month = (parseInt(month) + 1).toString();
            month = formatDateWithZero(month);

            day = (parseInt(day) + 1).toString();
            day = formatDateWithZero(day);
            //date = day + "/" + month + "/" + year;
            //date = date + " " + time;
            */
            hours = ("0" + hours).slice(-2);
            min = ("0" + min).slice(-2);
            sec = ("0" + sec).slice(-2);

            time = hours + ":" + min + ":" + sec;
            let timeMEAS = dateMeas.split(" ");
            document.getElementById("latestData").innerHTML = timeDiffCalc(time, timeMEAS[1]);
        }

        function timeDiffCalc(now, then) {
            let a = moment(now, "HH:mm:ss");
            let b = moment(then, "H:mm:ss");
            let diffSec = a.diff(b, 'seconds');
            let diffMin = a.diff(b, 'minutes');

            if(diffMin.toString() === "0"){
                return "Updated " + diffSec + " seconds ago";
            }else if(parseInt(diffMin.toString()) > 60 || parseInt(diffMin.toString()) < 0) {
                return "Updated more than an hour ago";
            }else {
                return "Updated " + diffMin + " minutes ago";
            }
        }

    </script>
    <script type="text/javascript" src="../js/stationActivity.js"></script>

    <div class="donutCharts">
        <div class="chart-container" style="margin-left: -3px;">
            <canvas id="tempChart" height="130"></canvas>
            <script type="text/javascript">
                let temperatureMeas = "<?php echo $temperatureMeas ?>";
                let ctxTemp = document.getElementById('tempChart');
                let tempString = '<?php echo $tempString ?>';
                let upperLimitTemp = '<?php echo $upperLimitTempChart ?>';

                let tempChart = new Chart(ctxTemp, {
                    type: 'doughnut',
                    data: {
                        labels: ['Temp', ''],
                        datasets: [{
                            label: '# of Votes',
                            data: [temperatureMeas, upperLimitTemp],
                            backgroundColor: [
                                'rgb(60, 188, 195)',
                                'rgb(235, 237, 239)',
                            ],
                            borderColor: [
                                'rgb(60, 188, 195)',
                                'rgb(235, 237, 239)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        elements: {
                            center: {
                                text: tempString,
                                color: '#3cbcc3', // Default is #000000
                                fontStyle: 'Calibri', // Default is Arial
                                sidePadding: 20, // Default is 20 (as a percentage)
                                minFontSize: 20, // Default is 20 (in px), set to false and text will not wrap.
                                lineHeight: 25 // Default is 25 (in px), used for when text wraps
                            },
                        },
                        responsive: true,
                        maintainAspectRatio: true,
                        cutoutPercentage: 65
                    }
                });

                Chart.pluginService.register({
                    beforeDraw: function(chart) {
                        if (chart.config.options.elements.center) {
                            // Get ctx from string
                            var ctx = chart.chart.ctx;

                            // Get options from the center object in options
                            var centerConfig = chart.config.options.elements.center;
                            var fontStyle = centerConfig.fontStyle || 'Arial';
                            var txt = centerConfig.text;
                            var color = centerConfig.color || '#000';
                            var maxFontSize = centerConfig.maxFontSize || 75;
                            var sidePadding = centerConfig.sidePadding || 20;
                            var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
                            // Start with a base font of 30px
                            ctx.font = "30px " + fontStyle;

                            // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
                            var stringWidth = ctx.measureText(txt).width;
                            var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

                            // Find out how much the font can grow in width.
                            var widthRatio = elementWidth / stringWidth;
                            var newFontSize = Math.floor(30 * widthRatio);
                            var elementHeight = (chart.innerRadius * 2);

                            // Pick a new font size so it will not be larger than the height of label.
                            var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
                            var minFontSize = centerConfig.minFontSize;
                            var lineHeight = centerConfig.lineHeight || 25;
                            var wrapText = false;

                            if (minFontSize === undefined) {
                                minFontSize = 20;
                            }

                            if (minFontSize && fontSizeToUse < minFontSize) {
                                fontSizeToUse = minFontSize;
                                wrapText = true;
                            }

                            // Set font settings to draw it correctly.
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
                            var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
                            ctx.font = fontSizeToUse + "px " + fontStyle;
                            ctx.fillStyle = color;

                            if (!wrapText) {
                                ctx.fillText(txt, centerX, centerY);
                                return;
                            }

                            var words = txt.split(' ');
                            var line = '';
                            var lines = [];

                            // Break words up into multiple lines if necessary
                            for (var n = 0; n < words.length; n++) {
                                var testLine = line + words[n] + ' ';
                                var metrics = ctx.measureText(testLine);
                                var testWidth = metrics.width;
                                if (testWidth > elementWidth && n > 0) {
                                    lines.push(line);
                                    line = words[n] + ' ';
                                } else {
                                    line = testLine;
                                }
                            }

                            // Move the center up depending on line height and number of lines
                            centerY -= (lines.length / 2) * lineHeight;

                            for (n = 0; n < lines.length; n++) {
                                ctx.fillText(lines[n], centerX, centerY);
                                centerY += lineHeight;
                            }
                            //Draw text in center
                            ctx.fillText(line, centerX, centerY);
                        }
                    }
                });
            </script>
            <p class="text" style="margin: 12px 0 0 92px; color: #262626">TEMPERATURE</p>
        </div>

        <div class="chart-container" style="margin-left: -97px;">
            <canvas id="presChart" height="130"></canvas>
            <script type="text/javascript">
                let pressureMeas = "<?php echo $pressureMeas ?>";
                let pressureLimit = "<?php echo $upperLimitPresChart ?>";
                let pressureString = '<?php echo $pressString ?>'
                let ctxPres = document.getElementById('presChart');

                let presChart = new Chart(ctxPres, {
                    type: 'doughnut',
                    data: {
                        labels: ['Press', ''],
                        datasets: [{
                            label: '# of Votes',
                            data: [pressureMeas, pressureLimit],
                            backgroundColor: [
                                'rgb(235,166,63)',
                                'rgb(235, 237, 239)',
                            ],
                            borderColor: [
                                'rgb(235,166,63)',
                                'rgb(235, 237, 239)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        elements: {
                            center: {
                                text: pressureString,
                                color: '#EBA63F', // Default is #000000
                                fontStyle: 'Calibri', // Default is Arial
                                sidePadding: 20, // Default is 20 (as a percentage)
                                minFontSize: 20, // Default is 20 (in px), set to false and text will not wrap.
                                lineHeight: 25 // Default is 25 (in px), used for when text wraps
                            },
                        },
                        responsive: true,
                        maintainAspectRatio: true,
                        cutoutPercentage: 65
                    }
                });

            </script>
            <p class="text" style="margin: 12px 0 0 119px; color: #262626">PRESSURE</p>
        </div>

        <div class="chart-container" style="margin-left: -100px;">
            <canvas id="humChart" height="130"></canvas>
            <script type="text/javascript">
                let humidityMeas = "<?php echo $humidityMeas ?>";
                let ctxHum = document.getElementById('humChart');

                let presHum = new Chart(ctxHum, {
                    type: 'doughnut',
                    data: {
                        labels: ['Hum', ''],
                        datasets: [{
                            label: '',
                            data: [humidityMeas, 100],
                            backgroundColor: [
                                'rgb(67,137,69)',
                                'rgb(235, 237, 239)',
                            ],
                            borderColor: [
                                'rgb(67,137,69)',
                                'rgb(235, 237, 239)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        elements: {
                            center: {
                                text: humidityMeas + '%',
                                color: '#438945', // Default is #000000
                                fontStyle: 'Calibri', // Default is Arial
                                sidePadding: 20, // Default is 20 (as a percentage)
                                minFontSize: 20, // Default is 20 (in px), set to false and text will not wrap.
                                lineHeight: 25 // Default is 25 (in px), used for when text wraps
                            },
                        },
                        responsive: true,
                        maintainAspectRatio: true,
                        cutoutPercentage: 65
                    }
                });
            </script>
            <p class="text" style="margin: 12px 0 0 118px; color: #262626">HUMIDITY</p>
        </div>
    </div>
</div>
<div id="stationMap" class="map"></div>
<script type="text/javascript" src="../js/map.js"></script>
<!--
 <div class="dashboard-meas" style="width: 1365px; height: 320px">
    <canvas id="lineChart" height="80" width="350"></canvas>
    <script type="text/javascript" src="../js/lineChart.js"></script>
</div>
 -->

</body>
</html>