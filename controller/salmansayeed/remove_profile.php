<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

$userId = $_SESSION['user']['id'];
$targetFile = "../../assets/uploads/profile_" . $userId . ".jpg";

if (file_exists($targetFile)) {
    unlink($targetFile);
}

header("Location: ../../view/salmansayeed/admindb.php");
exit();
?>