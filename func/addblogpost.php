<html>
<head>
    <title>����������...</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config.php';

$title = $_POST[Title];
$content = $_POST[PostContent];


$queryname = mysql_query("INSERT INTO blog (post_content, post_title, post_author) VALUES ('$content', '$title', 'Admin')") or die(mysql_error());;

$REF = $_SERVER['HTTP_REFERER'];
header("HTTP/1.1 301 Moved Permanently");
header("Location: $REF");


?>


</body>
</html>