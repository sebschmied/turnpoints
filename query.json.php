<?php
/**
 * Created by PhpStorm.
 * User: sschmied
 * Date: 27.04.18
 * Time: 20:09
 */
header("Content-type: application/json");

require_once ('database.php');
$query="SELECT id, name, X(coordinates) as lon, Y(coordinates) as lat FROM turnpoints";
$result = mysqli_query($sql, $query);
$rows = array();
$i=0;
while($r = mysqli_fetch_assoc($result)) {
    $rows['turnpoints'][] = $r;
    $rows['turnpoints'][$i]['sha1'] = sha1($r['lat'].$r['lon']);
    $rows['turnpoints'][$i]['md5'] = md5($r['lat'].$r['lon']);
    $rows['turnpoints'][$i]['base64'] = base64_encode($r['lat'].$r['lon']);
    $i++;
}

print json_encode($rows);
