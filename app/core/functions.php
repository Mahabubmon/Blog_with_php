<?php

function query(string $query, array $data = [])
{
    $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
    $con = new PDO($string, DBUSER, DBPASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stm = $con->prepare($query);
    $stm->execute($data);

    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (is_array($result) && !empty($result)) {
        return $result;
    }
    return false;
}


function redirect($page)
{
    header('Location: ' . $page);
    die;

}

function old_value($key)
{
    if (!empty($_POST[$key]))
        return $_POST[$key];

    return "";

}
function old_checked($key)
{
    if (!empty($_POST[$key]))
        return "checked";

    return "";

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