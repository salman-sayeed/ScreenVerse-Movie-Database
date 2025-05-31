<?php
session_start();
require_once __DIR__ . '/../../model/users.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'No user specified';
    header('Location: ../../view/salmansayeed/admindb.php');
    exit();
}

$userIdToDelete   = intval($_GET['id']);
$currentAdminId   = intval($_SESSION['user']['id']);

try {
    $result = deleteUser($userIdToDelete, $currentAdminId);

    if ($result['success']) {
        $_SESSION['success'] = $result['message'];
    } else {
        $_SESSION['error']   = $result['message'];
    }
} catch (Exception $e) {
    $_SESSION['error'] = 'Deletion failed: ' . $e->getMessage();
}

header('Location: ../../view/salmansayeed/admindb.php');
exit();
