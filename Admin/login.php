<?php
require_once('../includes/config.php');

if ($user->is_logged_in()) {
    header('location:index.php');
    exit(); // Make sure to exit after redirecting
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $user_name = trim($_POST['user_name']);
        $password = trim($_POST['password']);
        if ($user->login($user_name, $password)) {
            header('location: index.php');
            exit();
        } else {
            $message = '<p>Invalid user_name or password</p>';
        }
    }
    if (isset($message)) {
        echo $message; // Corrected syntax
    }
    ?>

    <form action="" method="POST" class="form">
        <label for="">user_name</label>
        <input type="text" name="user_name" id="user_name" required>
        <br>
        <label for="">Password</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for=""></label>
        <input type="submit" name="submit" id="submit" value="SignIn">
    </form>
</body>

</html>