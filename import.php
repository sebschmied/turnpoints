<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Paragliding Turnpoints database</title>
    <meta name="description" content="Paragliding Turnpoints Database">
    <meta name="author" content="Sebastian Schmied">




</head>

<body>
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript"></script>

<form action="import.php" method="post" enctype="multipart/form-data">
    <input type="file" name="datei"><br>
    <input type="submit" value="Hochladen">
</form>
<pre>
<?php
require_once ('database.php');
require_once ('math.php');
unlink('/var/tmp/cup');
move_uploaded_file($_FILES['datei']['tmp_name'], '/var/tmp/cup');

$filename = '/var/tmp/cup';
$contents = file($filename);

foreach($contents as $line) {
    $data = explode(',', $line);
    //4845.884N,
    //00816.756E
    $lat = substr($data['3'], 0, 8);
    $lat = SeeYoutoDD($lat);

    $lon = substr($data['4'], 0, 9);
    $lon = SeeYoutoDD($lon);

    $alt = substr($data['5'], 0, -1);
    $name= trim($data[10], '"');
    $name = substr($name, 0, -2);
    $insertquery='INSERT INTO turnpoints (coordinates, altitude, name) VALUES (point('.$lon.', '.$lat.'), '.$alt.', "'.$name.'")';

    echo $insertquery;
    mysqli_query($sql, $insertquery);
    echo "<br><br>";

}


?></pre>

</body>

</html>