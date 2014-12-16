<?
$mysql_host = "hpage00.mysql.ukraine.com.ua";
$mysql_database = "hpage00_h2v";
$mysql_user = "hpage00_h2v";
$mysql_password = "uu34ynrs";


$link = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password") or die("Could not connect : " . mysql_error());

mysql_query('SET CHARSET UTF8');
mysql_query('SET NAMES UTF8');
mysql_select_db("$mysql_database") or die("Could not select database");

$res = mysql_query("SELECT COUNT(*) FROM voting");
$row = mysql_fetch_row($res);
$total = $row[0]; // ����� �������


for ($i = 1; $i <= $total; $i++) {
    $query = mysql_query("SELECT * FROM voting WHERE id=$i");
    while ($row = mysql_fetch_array($query)) {
        $hash1 = $row['hash1'];
        $hash2 = $row['hash2'];

        $jsonurl = "http://otter.topsy.com/searchcount.json?q=%23$hash1&type=tweet&apikey=09C43A9B270A470B8EB8F2946A9369F3";
        $json = file_get_contents($jsonurl, 0, null, null);
        $json_output = json_decode($json, true);

        $jsonurl2 = "http://otter.topsy.com/searchcount.json?q=%23$hash2&type=tweet&apikey=09C43A9B270A470B8EB8F2946A9369F3";
        $json2 = file_get_contents($jsonurl2, 0, null, null);
        $json_output2 = json_decode($json2, true);

        $resp1 = $json_output['response']['m'];
        $resp2 = $json_output2['response']['m'];

        $sql = mysql_query("UPDATE voting SET optvotes1=$resp1, optvotes2=$resp2 WHERE id='$i'");

//$lequery = "INSERT INTO stats(voteid, votesfor1, votesfor2) VALUES ('$i','$resp1','$resp2')";
//$stats = mysql_query($lequery) or die(mysql_error());;

        echo "ok!";

    }
}