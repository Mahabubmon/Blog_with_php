<?php

require_once('../includes/congig.php');

if (!$user->is_logged_in()) {
    header('location: login.php');
}


?>