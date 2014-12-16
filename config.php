<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_GET['action'])) {
    $i = $_GET['action'];
    switch ($i) {
        case 1:
            unset($_COOKIE['sssp']);
            setcookie('sssp', null, -1, '/');
            break;
    }
}

if (!empty($_GET['oauth_token']) OR !empty($_GET['oauth_verifier'])) {
    header("Refresh:0; url=/");
}


//////// SECURITY


if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    function stripslashes_deep($value)
    {
        if (is_array($value)) {
            $value = array_map('stripslashes_deep', $value);
        } elseif (!empty($value) && is_string($value)) {
            $value = stripslashes($value);
        }
        return $value;
    }

    $_POST = stripslashes_deep($_POST);
    $_GET = stripslashes_deep($_GET);
    $_COOKIE = stripslashes_deep($_COOKIE);
}


//if (!is_numeric($_POST[id])) { echo 'security is magic!';die();} elseif (!is_numeric($_GET[id])) {echo 'security is magic!';die();}


$domain = "http://hash2vote.ru/";

$mysql_host = "[HOST]";
$mysql_database = "[DATABASE]";
$mysql_user = "[DATABASE USER]";
$mysql_password = "[DATABASE PASSWORD]";


$link = mysql_connect("$mysql_host", "$mysql_user", "$mysql_password") or die("Could not connect : " . mysql_error());

mysql_query('SET CHARSET UTF8');
mysql_query('SET NAMES UTF8');
mysql_select_db("$mysql_database") or die("Could not select database");

if (empty($_COOKIE['sssp'])) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/user/auth.php";
    //include_once($path);
}