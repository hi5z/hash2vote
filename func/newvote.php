<html>
<head>
    <title>Загружаемс...</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Проверяем загружен ли файл
if (is_uploaded_file($_FILES["image1"]["tmp_name"])) {
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
    move_uploaded_file($_FILES["image1"]["tmp_name"], "/home/hpage00/hash2vote.ru/www/img/" . $_FILES["image1"]["name"]);
    echo "OK - " . $_FILES["image1"]["name"] . "<br />";
} else {
    echo("Ошибка загрузки файла 1<br />");
}


// Проверяем загружен ли файл
if (is_uploaded_file($_FILES["image2"]["tmp_name"])) {
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
    move_uploaded_file($_FILES["image2"]["tmp_name"], "/home/hpage00/hash2vote.ru/www/img/" . $_FILES["image2"]["name"]);
    echo("OK - " . $_FILES["image2"]["name"] . "<br />");
} else {
    echo("Ошибка загрузки файла 2 <br />");
}


include '../config.php';

$title = $_POST[Title];
$subtitle = $_POST[Subtitle];

$option1 = $_POST[Option1];
$option2 = $_POST[Option2];

$hash1 = $_POST[Hash1];
$hash2 = $_POST[Hash2];

$image1 = $_FILES["image1"]["name"];
$image2 = $_FILES["image2"]["name"];

$category = $_POST[Category];


$queryname = mysql_query("INSERT INTO voting (title, subtitle, option1, option2, hash1, hash2, imgname1, imgname2, active, category, chosen) VALUES ('$title', '$subtitle', '$option1', '$option2', '$hash1', '$hash2', '$image1', '$image2', '$active', '$category', '0')") or die(mysql_error());;

$REF = $_SERVER['HTTP_REFERER'];
header("HTTP/1.1 301 Moved Permanently");
header("Location: $REF");


?>


</body>
</html>