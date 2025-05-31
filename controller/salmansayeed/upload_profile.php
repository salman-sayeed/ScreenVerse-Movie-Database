<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../../view/mdsanjidhasan/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $userId = $_SESSION['user']['id'];
    $targetDir = "../../assets/uploads/";
    $targetFile = $targetDir . "profile_" . $userId . ".jpg";
    
    $check = getimagesize($_FILES['profile_pic']['tmp_name']);
    if ($check === false) {
        die("Error: File is not an image.");
    }
    
    $imageFileType = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Error: Only JPG, JPEG, PNG & GIF files are allowed.");
    }
    
    if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFile)) {
        header("Location: ../../view/salmansayeed/admindb.php?success=1");
    } else {
        header("Location: ../../view/salmansayeed/admindb.php?error=upload");
    }
    exit();
}
?>