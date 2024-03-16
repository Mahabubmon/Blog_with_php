<?php

function query(string $query, array $data = [])
{
    $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);

    $stm = $con->prepare($query);
    $stm->execute($data);

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (is_array($result) && !empty ($result)) {
        return $result;
    }
    return false;
}
function query_row(string $query, array $data = [])
{
    $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);

    $stm = $con->prepare($query);
    $stm->execute($data);

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (is_array($result) && !empty ($result)) {
        return $result[0];
    }
    return false;
}


function redirect($page)
{
    header('Location: ' . ROOT . '/' . $page);
    die;

}

function old_value($key, $default = '')
{
    if (!empty ($_POST[$key]))
        return $_POST[$key];

    return $default;

}
function old_checked($key, $default = '')
{
    if (!empty ($_POST[$key]))
        return "checked";

    return "";

}

function get_image($file)
{
    $file = $file ?? '';
    if (file_exists($file)) {
        return ROOT . '/' . $file;
    }
    return ROOT . '/assets/images/download (3).jpeg' . $file;

}


function authenticate($row)
{
    $_SESSION['USER'] = $row;

}
function logged_in()
{
    if (!empty ($_SESSION['USER']))
        return true;

    return false;

}


function str_to_url($url)
{

    $url = str_replace("'", "", $url);
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);

    return $url;
}

function esc($str)
{
    return htmlspecialchars($str ?? '');
}


// create_tables();
function create_tables()
{
    $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE DATABASE IF NOT EXISTS " . DBNAME;
    $stm = $con->prepare($query);
    $stm->execute();

    // Now selecting the database
    $con->exec("USE " . DBNAME);

    $query = "CREATE TABLE IF NOT EXISTS users(
        id int primary key auto_increment,
        username varchar(50) not null,
        email varchar(100) not null,
        password varchar(255) not null,
        image varchar(1024) null,
        date datetime default current_timestamp,
        role varchar(10) not null,

        key username (username),
        key email (email)
    )";
    $stm = $con->prepare($query);
    $stm->execute();
    $query = "CREATE TABLE IF NOT EXISTS categories(
        id int primary key auto_increment,
        category varchar(50) not null,
        slug varchar(100) not null,
        disabled tinyint default 0,
      

        key slug (slug),
        key category (category)
    )";
    $stm = $con->prepare($query);
    $stm->execute();
    $query = "CREATE TABLE IF NOT EXISTS posts(
        id int primary key auto_increment,
        user_id int,
        category_id int,
        title varchar(100) not null,
        content text null,
        image varchar(1024) null,
        date datetime default current_timestamp,
        slug varchar(100) not null,

        key user_id (user_id),
        key category_id (category_id),
        key title (title),
        key slug (slug),
        key date (date)
    )";
    $stm = $con->prepare($query);
    $stm->execute();
}

?>