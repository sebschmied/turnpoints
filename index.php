<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Paragliding Turnpoints database</title>
    <meta name="description" content="Paragliding Turnpoints Database">
    <meta name="author" content="Sebastian Schmied">
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript"></script>
<script src="js/worldmap.js"></script>
<script type="text/javascript">

<?php
$sql = new mysqli("localhost", "turnpoints", "dummy", "tpex");
$query="SELECT id, name, X(coordinates) as lon, Y(coordinates) as lat FROM turnpoints";
$query2 = "SELECT name FROM turnpoints";
$result = mysqli_query($sql, $query);
while ($row = mysqli_fetch_assoc($result))
{
    
    echo "id: " .  $row['id'] . "<br />";
    echo "name: " .  $row['name'] . "<br />";
    echo "lon: " .   $row['lon']  . "<br />";
    echo "lat: " .   $row['lat']  . "<br />";
    echo "hash:" .   strtoupper(substr(sha1($row['id']), 0, 5)) . "<br />";

}
?>

</script>


<div id="worldmap">GOOGLE!!!</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1CqtckRTi90FYDLfUjuUIydnPzoJzmiI&amp;callback=initMap"></script>

</body>