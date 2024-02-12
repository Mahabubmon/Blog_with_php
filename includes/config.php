<?php
Session_start();
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cms');

$db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

date_default_timezone_set('Asia/Dhaka'); // Corrected timezone format (no space)

function my_autoload_register($class)
{
    $class = strtolower($class);

    $classpath = __DIR__ . '/classes/class.' . $class . '.php'; // Use __DIR__ to get the current directory
    if (file_exists($classpath)) {
        require_once $classpath;
    }
    $classpath = __DIR__ . '/../classes/class.' . $class . '.php'; // Use __DIR__ to get the current directory
    if (file_exists($classpath)) {
        require_once $classpath;
    }
    $classpath = __DIR__ . '/../../classes/class.' . $class . '.php'; // Use __DIR__ to get the current directory
    if (file_exists($classpath)) {
        require_once $classpath;
    }
}

// Register the custom autoload function
spl_autoload_register('my_autoload_register');

$user = new User($db);

?>