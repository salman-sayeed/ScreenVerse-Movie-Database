<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$successMessage = '';
$errorMessage = '';

if (isset($_SESSION['success'])) {
    $successMessage = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Screenverse | Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css" />
    <link rel="stylesheet" href="../../assets/salmansayeed/admindb/admin-style.css" />
</head>
<body>
    <?php include('navbar.php') ?>

    <div class="content-container admin-content">
        <div class="admin-section">
            <h2>Admin Profile</h2>
            <div class="profile-pic-container">
                <img
                    src="../../assets/uploads/profile_<?php echo $_SESSION['user']['id']; ?>.jpg"
                    alt="Profile Picture"
                    class="profile-pic"
                    onerror="this.src='../../assets/icons/default_profile.jpg'"
                />
                <div>
                    <h3><?php echo htmlspecialchars($_SESSION['user']['fullname']); ?></h3>
                    <p><?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
                    <div class="profile-actions">
                        <form
                            action="../../controller/salmansayeed/upload_profile.php"
                            method="post"
                            enctype="multipart/form-data"
                        >
                            <input
                                type="file"
                                name="profile_pic"
                                id="profile_pic"
                                accept="image/*"
                                required
                            />
                            <button type="submit" class="admin-button">Upload Picture</button>
                        </form>

                        <form
                            action="../../controller/salmansayeed/remove_profile.php"
                            method="post"
                            style="display:inline;"
                        >
                            <button
                                type="submit"
                                class="admin-button danger-button"
                                onclick="return confirm('Are you sure you want to remove your profile picture?')"
                            >
                                Remove Picture
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-section">
            <h2>User Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/../../model/users.php';

                    $users = getAllUsers();

                    if ($users !== false) {
                        if (empty($users)) {
                            echo "<tr><td colspan='5'>No users found</td></tr>";
                        } else {
                            foreach ($users as $user) {
                                echo "<tr>
                                    <td>{$user['id']}</td>
                                    <td>" . htmlspecialchars($user['fullname']) . "</td>
                                    <td>" . htmlspecialchars($user['email']) . "</td>
                                    <td>{$user['role']}</td>
                                    <td class='action-buttons'>
                                        <a href='../../controller/salmansayeed/delete_user.php?id={$user['id']}'
                                           class='admin-button danger-button'
                                           onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='5'>Error loading user data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="adduser.php" class="admin-button add-user-btn">Add New User</a>
        </div>

        <div class="quick-actions">
            <a href="reset_password.php" class="action-button">Reset Password</a>
            <a href="../../controller/salmansayeed/adminlogout.php" class="action-button">Log Out</a>
        </div>
    </div>

    <?php include('footer.php') ?>

    <script src="../../assets/salmansayeed/main-script.js"></script>
    <script src="../../assets/salmansayeed/admindb/admin-script.js"></script>
</body>
</html>
