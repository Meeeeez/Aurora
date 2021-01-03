<!--
     TODO: updated lalalala ago
     TODO: active file auslesen / wenn der sensor länger als der mess intervall nicht gelesen hat ist er inaktiv
     TODO: metric/imperial systems
 -->

<?php
$measFile = fopen("Z:/measurements.txt", "r") or die("Unable to open file!");
$data = fread($measFile,filesize("Z:/measurements.txt"));
$data = explode("\n", $data);
fclose($measFile);
$i = 0;
?>

<script type="text/javascript">
    let arr_length = '<?php echo count($data)?>' - 1;
    let data_arr = [], data_jsonDecoded = [];
    let i = 0;

    while (i < arr_length){
        data_arr[i] = '<?php echo $data[$i]?>';
        data_jsonDecoded[i] = JSON.parse(data_arr[i]);
        i++;
    }

</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="1500">
    <title>Dashboard</title>
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
    <p class="station-location-further">Bressanone, Italy</p>
    <a class="station-coordinates-time">46.64, 11.67</a>
    <p class="station-local-time-label">Local Time: </p>
    <p class="station-coordinates-time" id="time"></p>
    <script type="text/javascript" src="../js/get_localTime.js"></script>
</div>
<!--<div class="measSystem-active-info">
        <div class="active-badge">ACTIVE</div>
    </div>
    -->
<div class="divider"></div>
<div class="dashboard-meas">
    <h3 class="dashboard-meas-heading">Latest Observation</h3>

    <p class="dashboard-meas-latest-data" id="latestData"></p>
    <script type="text/javascript" src="../js/lastUpdated.js"></script>

    <div class="donutCharts">
        <div class="chart-container" style="margin-left: -3px;">
            <canvas id="tempChart" height="130"></canvas>
            <script type="text/javascript" src="../js/tempChart.js"></script>
            <p class="text" style="margin: 12px 0 0 92px">TEMPERATURE</p>
        </div>

        <div class="chart-container" style="margin-left: -97px;">
            <canvas id="presChart" height="130"></canvas>
            <script type="text/javascript" src="../js/presChart.js"></script>
            <p class="text" style="margin: 12px 0 0 119px">PRESSURE</p>
        </div>

        <div class="chart-container" style="margin-left: -100px;">
            <canvas id="humChart" height="130"></canvas>
            <script type="text/javascript" src="../js/humChart.js"></script>
            <p class="text" style="margin: 12px 0 0 118px">HUMIDITY</p>
        </div>
    </div>
</div>
<div id="stationMap" class="map"></div>
<script type="text/javascript" src="../js/map.js"></script>
</body>
</html>