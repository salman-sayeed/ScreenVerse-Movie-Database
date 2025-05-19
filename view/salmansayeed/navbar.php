<?php 
    if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
        // Accessed directly
        header('Location: ./error.php');
        exit();
    }
?>

<!-- ------------------------------------ sidebar ------------------------------------ -->
<div class="sidebar">
    <ul class="sidebar-content">
        <li><i onclick="hideSidebar()" class="fa-regular fa-circle-xmark cancel-button"></i>
        <li class="sidebar-list-topitem">
            <div class="login-container-link">
                 <a class="login-container-link btn" href="#loginpage">Login</a>      
            </div>
        </li>
        <li class="sidebar-list-item" onclick="window.location.href='../../index.php'">Home</li>
        <li class="sidebar-list-item">Movies</li>
        <li class="sidebar-list-item">Series</li>
        <li class="sidebar-list-item" onclick="window.location.href='../mdsanjidhasan/Genre Filtering.php'">Genre</li>
        <li class="sidebar-list-item" onclick="window.location.href='../mdsanjidhasan/Media Catalog.php'">Catalog</li>
    </ul>
</div>

<!-- ------------------------------------ navbar ------------------------------------ -->
<div class="navbar">
    <div class="navbar-container">
            <div class="hamburger-button">
                <i onclick="showSidebar()" class="fa-solid fa-bars"></i>
            </div>
        <div class="logo-container">
            <a href="../../index.php"><img src="../../assets/icons/logomain.png"></a>
        </div>
        <div class="menu-container">
            <ul class="menu-list">
                <li class="menu-list-item hideOnMobile" onclick="window.location.href='../../index.php'">Home</li>
                <li class="menu-list-item hideOnMobile">Movies</li>
                <li class="menu-list-item hideOnMobile">Series</li>
                <li class="menu-list-item hideOnMobile" onclick="window.location.href='../mdsanjidhasan/Genre Filtering.php'">Genre</li>
                <li class="menu-list-item hideOnMobile" onclick="window.location.href='../mdsanjidhasan/Media Catalog.php'">Catalog</li>
            </ul>
        </div>
        <div class="login-container ">
            <div class="login-container-link hideOnMobile">
                <a class="login-container-link btn" href="../mdsanjidhasan/login.html">Login</a>      
            </div>
            <div class="toggle">
                <i class="fa-solid fa-moon toggle-icon"></i>
                <i class="fa-solid fa-sun toggle-icon"></i>
                <div class="toggle-ball"></div>
            </div>
        </div>

        <script src="../../assets/salmansayeed/main-script.js"></script>
        <script src="../../assets/salmansayeed/releasecalander/script-releasecalander.js"></script>
    </div>  
</div>