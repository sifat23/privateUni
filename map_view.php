<?php
include 'header.php';
include 'connection.php';

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

//locate the IP
$geoplugin->locate();
$geoplugin->city;
$geoplugin->countryName;
$geoplugin->latitude;
$geoplugin->longitude;
$geoplugin->region;
$geoplugin->countryCode;


?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 25.729380, lng: -80.354200},
            zoom: 8
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyuDv-G1OYLxuSN_-679GnQpXujsbVxLE&callback=initMap"
        type="text/javascript">
</script>
</body>
</html>