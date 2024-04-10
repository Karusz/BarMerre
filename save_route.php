<?php
    // Include the database connection configuration
    require "config.php";
    session_start();
    $allrouteLanLng = $_POST['allrouteLanLng'];
    $name = $_POST['name'];
    $text = $_POST['text'];

    $split_allroute = explode(",",$allrouteLanLng);

    $routelatlng;
    $lat;
    $lng;
    $barsids = "";
    foreach ($split_allroute as $key => $value) {
        $latLng = $value;
        $routelatlng = explode(";",$latLng);
        for ($i=0; $i < count($routelatlng)-1; $i++) { 
            $lat = $routelatlng[$i];
            $lng = $routelatlng[$i+1];
            $lekerd = "SELECT * FROM bars WHERE lat = '$lat' AND lng = '$lng'";
            $talalt = $conn->query($lekerd);
            $bar = $talalt->fetch_assoc();

            $barsids .= $bar['id'].",";
        }

    }
    $barsids = rtrim($barsids, ',');

    $conn->query("INSERT INTO routes VALUES(id, $_SESSION[userid],'$name','$barsids','$text')");

?>