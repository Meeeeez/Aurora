<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard_stylesheet.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
</head>
<body>
    <div class="station-info" onload="updateTime()">
        <h1 class="station-location">VILLNÖSS</h1>
        <p class="station-location-further">Bressanone, Italy</p>
        <a class="station-coordinates-time" href="https://www.google.com/maps/search/46.642,+11.675">46.64, 11.67</a>
        <p class="station-local-time-label">Local Time: </p>
        <p class="station-coordinates-time" id="time"></p>
        <script src="../js/get_localTime.js"></script>
    </div>
    <!--<div class="measSystem-active-info">
            <div class="active-badge">ACTIVE</div>
        </div>
        -->
    <div class="divider"></div>
    <div class="dashboard-meas">
        <h3 class="dashboard-meas-heading">Latest Observation</h3>
        <p class="dashboard-meas-latest-data" id="latestData">Updated lalalalla ago</p>
        <div class="donutCharts">
            <div class="chart-container" style="margin-left: -3px;">
                <canvas id="tempChart" height="130"></canvas>
                <script src="../js/tempChart.js"></script>
                <p class="text" style="margin: 12px 0 0 92px">TEMPERATURE</p>
            </div>

            <div class="chart-container" style="margin-left: -97px;">
                <canvas id="presChart" height="130"></canvas>
                <script src="../js/presChart.js"></script>
                <p class="text" style="margin: 12px 0 0 119px">PRESSURE</p>
            </div>

            <div class="chart-container" style="margin-left: -100px;">
                <canvas id="humChart" height="130"></canvas>
                <script src="../js/humChart.js"></script>
                <p class="text" style="margin: 12px 0 0 118px">HUMIDITY</p>
            </div>
        </div>
    </div>
</body>
</html>