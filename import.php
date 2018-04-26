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
$sql = new mysqli("localhost", "root", "iosfh83d", "tpex");
print_r($_FILES);
move_uploaded_file($_FILES['datei']['tmp_name'], '/tmp/cup');

$filename = '/tmp/cup';
$contents = file($filename);

foreach($contents as $line) {
    $data = explode(',', $line);
    print_r($data);
    $lat = substr($data['3'], 0, -1);
    $lat=trim($lat, '0');
    $lon = substr($data['4'], 0, -1);
    $lon=trim($lon, '0');
    $alt = substr($data['5'], 0, -1);
    $name= trim($data[10], '"');
    $name = substr($name, 0, -2);
    $insertquery='INSERT INTO turnpoints (coordinates, altitude, name) VALUES (point('.$lat.', '.$lon.'), '.$alt.', "'.$name.'")';

    echo $insertquery;

    mysqli_query($sql, $insertquery);

    echo mysqli_error($sql);
}


?></pre>

</body>

</html>