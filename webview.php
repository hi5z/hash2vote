<?

$jsonurl = "http://otter.topsy.com/search.json?q=%23$hash2vote&window=auto&apikey=09C43A9B270A470B8EB8F2946A9369F3";
$json = file_get_contents($jsonurl, 0, null, null);
$json_output = json_decode($json, true);

echo $json_output;
