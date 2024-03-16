<?php

session_start();

require "../app/core/init.php";

$url = $_GET['url'] ?? 'home';
$url = strtolower($url);
$url = explode("/", $url);

$page_name = trim($url[0]);
$filename = "../app/pages/" . $page_name . ".php";


// set pagination vars
$page_number = $_GET['page'] ?? 1;

$page_number = empty ($page_number) ? 1 : (int) $page_number;
$page_number = $page_number < 1 ? 1 : $page_number;

$current_link = $_GET['url'] ?? 'home';
$current_link = ROOT . "/" . $current_link;

foreach ($_GET as $key => $value) {
    if ($key != 'url' && $key != 'page') {
        $current_link .= (strpos($current_link, '?') === false) ? '?' : '&';
        $current_link .= $key . "=" . $value;
    }
}

$current_link .= (strpos($current_link, '?') === false) ? '?' : '&';
$current_link .= "page=" . $page_number;


$next_link = preg_replace("/page=[0-9]+/", "page=" . ($page_number + 1), $current_link);

$prev_page_number = $page_number < 2 ? 1 : $page_number - 1;
$prev_link = preg_replace("/page=[0-9]+/", "page=" . $prev_page_number, $current_link);
echo $prev_link;

if (file_exists($filename)) {
    require_once $filename;
} else {
    require_once "../app/pages/404.php";
}
