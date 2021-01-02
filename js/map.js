let map = L.map('stationMap').setView([46.642,11.678], 15);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/satellite-v9',
    accessToken: ''
}).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributor',
    //other attributes.
}).addTo(map);

let circle = L.circle([46.642,11.678], {
    color: "#E40C2B",
    fillColor: '#E40C2B',
    fillOpacity: 0.5,
    radius: 350,
}).addTo(map);
circle.bindPopup("The weather station is somewhere here");