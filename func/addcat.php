<html>
<head>
    <title>����������...</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config.php';

$name = $_POST[Name];
$description = $_POST[Description];


$queryname = mysql_query("INSERT INTO category (name, description, status) VALUES ('$name', '$description', '1')") or die(mysql_error());;

$REF = $_SERVER['HTTP_REFERER'];
header("HTTP/1.1 301 Moved Permanently");
header("Location: $REF");


?>


</body>
</html>