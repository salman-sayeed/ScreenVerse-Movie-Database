<?php
session_start();
require_once __DIR__ . '/../../model/users.php';

// Verify admin access
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'No user specified';
    header('Location: ../../view/salmansayeed/admindb.php');
    exit();
}

$userModel = new User();
$result = $userModel->deleteUser($_GET['id'], $_SESSION['user']['id']);

if ($result['success']) {
    $_SESSION['success'] = $result['message'];
} else {
    $_SESSION['error'] = $result['message'];
}

header('Location: ../../view/salmansayeed/admindb.php');
exit();
?>