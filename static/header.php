<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#" prefix="fb: http://ogp.me/ns/fb#">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    } elseif (!empty($_GET['category'])) {
        $cat = $_GET['category'];
    }

    if (!empty($id)) {
        $query1 = mysql_query("SELECT * FROM voting WHERE id=$_GET[id]");
        $row1 = mysql_fetch_array($query1);
    } elseif (!empty($category)) {
        $query2 = mysql_query("SELECT * FROM category WHERE id=$_GET[category]");
        $row2 = mysql_fetch_array($query2);
    }

    ?>
    <title>
        Hash2Vote <? if (strripos($_SERVER['PHP_SELF'], 'index.php')) { ?>- Ежедневные интересные голосования<? } elseif (strripos($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'], 'voting.php?id=')) { ?>- <?= $row1['title'] ?> - <?= $row1['subtitle'] ?><? } elseif (!empty($_GET['category'])) { ?>- <?= $row2['name'] ?><? } elseif (!empty($_GET['chosen'])) { ?>- Избранное<? } elseif (strripos($_SERVER['PHP_SELF'], 'voting.php') AND empty($_GET)) { ?>- Лента - Все голосования<? } elseif (strripos($_SERVER['PHP_SELF'], 'category.php')) { ?>- Список категорий<? } ?></title>

    <meta name="description" content="<? if (!empty($_GET['id'])) {
        echo $row1[2];
    } else {
        echo 'Cамый социальный проект интернета. Всегда актуальные и трендовые голосования.';
    } ?>">
    <meta name="keywords" content="<? if (!empty($_GET['id'])) {
        echo $row1[3] . ', ' . $row1[4] . ', голосовать, голосование, проголосовать, hash2vote, twitter, твиттер, твиттер голосование, скандал, событие, новости, интриги, hashtag, хештеги, популярное, ' . $row2[1];
    } else {
        echo ' hash2vote, голосовать, голосование, проголосовать, twitter, твиттер, твиттер голосование, скандал, событие, новости, интриги, hashtag, хештеги, популярное, блоги, блоггеры';
    } ?>">
    <meta name="author" content="Alex Novak">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <link rel="image_src" href="<? if (!empty($_GET['id'])) {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/" . $_GET['id'] . ".png";
    } else {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/hash.png";
    } ?>"/>

    <link rel="author" href="http://plus.google.com/+Hash2voteRu1"/>
    <meta content='Hash2Vote' name='apple-mobile-web-app-title'>
    <link href='/hashtag.gif' rel='apple-touch-icon' type='image/gif'>

    <link rel="stylesheet" href="<?= $domain ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= $domain ?>css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?= $domain ?>css/jasny-bootstrap.min.css">
    <link rel="icon" href="/favicon.ico">
    <meta name="theme-color" content="#eee" />

    <meta name="google-site-verification" content="b138PmRGZNMFhzniKIYbvbYf22ZPqZ9YQd5dy1kYbVM"/>

    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Hash2Vote"/>
    <meta property="og:image" content="<? if (!empty($_GET['id'])) {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/" . $_GET['id'] . ".png";
    } else {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/hash.png";
    } ?>"/>
    <meta property="og:url" content="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
    <meta property="og:description"
          content="<? if (strripos($_SERVER['PHP_SELF'], 'index.php')) { ?>Hash2Vote - Ежедневные интересные голосования<? } ?><? if (strripos($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'], 'voting.php?id=')) { ?><?= $row1['title'] . " " . $row1['subtitle'] . " Сегодня в нашем голосовании идет борьба: " . $row1['option1'] . " vs. " . $row1['option2'] ?><? } elseif (strripos($_SERVER['PHP_SELF'], 'category.php')) { ?>Список категорий<? } elseif (strripos($_SERVER['PHP_SELF'], 'bloglist.php')) { ?>Hash2Vote - последние, актуальные новости<? } ?>"/>
    <meta property="fb:admins" content="100000115356284"/>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@hash2vote">
    <meta name="twitter:creator" content="@hash2vote">
    <meta name="twitter:url" content="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta name="twitter:title" content="Hash2Vote <? if (!empty($_GET['id'])) {
        echo '- ' . $row1[3] . ' vs. ' . $row1[4];
    } else {
        echo 'Ежедневные интересные голосования';
    } ?>">
    <meta name="twitter:description"
          content="<? if (strripos($_SERVER['PHP_SELF'], 'index.php')) { ?>Cамый социальный проект интернета. Всегда актуальные и трендовые голосования.<? } ?><? if (strripos($_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'], 'voting.php?id=')) { ?><?= $row1['title'] . " " . $row1['subtitle'] . " Сегодня в нашем голосовании идет борьба: " . $row1['option1'] . " vs. " . $row1['option2'] ?><? } elseif (strripos($_SERVER['PHP_SELF'], 'category.php')) { ?>Список категорий<? } ?>">
    <meta name="twitter:image:src" content="<? if (!empty($_GET['id'])) {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/" . $_GET['id'] . ".png";
    } else {
        echo 'http://' . $_SERVER['HTTP_HOST'] . "/img/hash.png";
    } ?>">

</head>