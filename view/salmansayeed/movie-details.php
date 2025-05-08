<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenverse | Movie Name</title>

    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css">
    <link rel="stylesheet" href="../../assets/salmansayeed/movie-details/style-movie-details.css">
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="content-container"> 

        <!-- ----------------------------------- movie information box ----------------------------------- -->
        <div class="container-profile-box">
            <div class="container-profile-box-blurr">
                <div class="profile-info">
                    <div class="info-title">
                        <h1>12 Angry  Men</h1>
                        <p>1957 • 1h 37m </p>
                    </div>
                    <div class="info-links">
                        <div class="links-item">
                            <p>ScreenVerse Rating</p>
                            <p><i class="fa-solid fa-star goldstar"></i> 9/10</p>
                        </div>
                        <div class="links-item">
                            <p>Your Rating</p>
                            <p><i class="fa-regular fa-star bluestar"></i> -/-</p>
                        </div>
                        <div class="links-item">
                            <p>Popularity Count</p>
                            <p><i class="fa-solid fa-arrow-trend-up trend"></i> 250</p>
                        </div>
                    </div>
                </div>
                <div class="profile-content">
                    <div class="profile-content-poster">
                             <!-- img in css -->
                    </div>
                    <div class="profile-content-trailer">
                        <iframe width="1015" height="459" src="https://www.youtube.com/embed/TEN-2uTi2c0?si=uM9G_6_YAYS16Syh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="profile-desc">
                    <div class="desc-box desc-box1">
                        <ul class="desc-genre">
                            <li class="genre">Legal Drama</li>
                            <li class="genre">Psycological Drama</li>
                            <li class="genre">Crime</li>
                            <li class="genre">Drama</li>
                        </ul>
                        <p>The jury in a New York City murder trial is frustrated by a single member whose skeptical caution forces them to more carefully consider the evidence before jumping to a hasty verdict.</p>
                    </div>

                    <div class="desc-box desc-box2">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>
    
    <script src="../../assets/salmansayeed/main-script.js"></script>
</body>
</html>