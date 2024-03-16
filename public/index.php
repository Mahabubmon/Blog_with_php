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

$current_link = $_GET['url'] ?? 'home';
echo $current_link;

if (file_exists($filename)) {
    require_once $filename;
} else {
    require_once "../app/pages/404.php";
}


