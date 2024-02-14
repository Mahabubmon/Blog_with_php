<?php

require_once('../includes/congig.php');

if (!$user->is_logged_in()) {
    header('location: login.php');
}

if (isset($_GET['delpost'])) {
    $smt = $db->prepare('DELETE FROM blog WHERE articleId=:articleId');
    $smt->execute(array(':articleId' => $_GET['delpost']));
    header('location"index.php?action=deleted');
    exit();


}



?>