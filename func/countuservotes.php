<?
$mysql_host = "hpage00.mysql.ukraine.com.ua";
$mysql_database = "hpage00_h2v";
$mysql_user = "hpage00_h2v";
$mysql_password = "uu34ynrs";


$link = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password") or die("Could not connect : " . mysql_error());

mysql_query('SET CHARSET UTF8');
mysql_query('SET NAMES UTF8');
mysql_select_db("$mysql_database") or die("Could not select database");

$res = mysql_query("SELECT COUNT(*) FROM users");
$row = mysql_fetch_row($res);
$total = $row[0]; // ����� �������


$query = mysql_query("SELECT * FROM users");
while ($row = mysql_fetch_assoc($query)) {

    $row = mysql_num_rows($query);
    $id = $row[0]['id'];

    $jsonurl = "http://otter.topsy.com/searchcount.json?q=%23h2v$id&type=tweet&apikey=09C43A9B270A470B8EB8F2946A9369F3";
    $json = file_get_contents($jsonurl, 0, null, null);
    $json_output = json_decode($json, true);

    $response = $json_output['response']['m'];

    $sql = mysql_query("UPDATE users SET howmuchvotes=$resp1 WHERE id='$id'");

//$lequery = "INSERT INTO stats(voteid, votesfor1, votesfor2) VALUES ('$i','$resp1','$resp2')";
//$stats = mysql_query($lequery) or die(mysql_error());;

    echo $id . "ok! pussy";

}