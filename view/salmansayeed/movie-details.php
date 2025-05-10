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
                        <iframe width="1015" height="459" src="https://www.youtube.com/embed/TEN-2uTi2c0?si=uM9G_6_YAYS16Syh&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                        <div class="desc-items">
                            <p>The jury in a New York City murder trial is frustrated by a single member whose skeptical caution forces them to more carefully consider the evidence before jumping to a hasty verdict.</p>
                        </div>
                        <div class="desc-items ditem">
                            <p>Director</p>
                            <a href="##">Sidney Lumet</a>
                        </div>
                        <div class="desc-items  ditem">
                            <p>Writer</p>
                            <a href="##">Reginald Rose</a>
                        </div>
                        <div class="desc-items ditem">
                            <p>Stars</p>
                            <a href="##">Henry Fonda, </a>
                            <a href="##">Lee J. Cobb,</a>
                            <a href="##">Martin Balsam</a>
                        </div>
                    </div>

                    <div class="desc-box desc-box2">
                        <div class="desc-box2-item">
                            <div class="box2-button box2-button1">
                            <i class="fa-solid fa-plus"></i><p>Add to Watchlist</p>
                            </div>
                        </div>
                        <div onclick="window.location.href='streamingsites.php'" class="desc-box2-item">
                            <div class="box2-button box2-button2">
                            <i class="fa-regular fa-eye"></i><p>Stream Online</p>
                            </div>
                        </div>
                        <div class="desc-box3-item">
                            <div class="box3-item1">
                                <p>2.5k</p>User Reviews
                                <p>174</p>Critic Reviews
                            </div>
                            <div class="box3-item2">
                                <p>97</p>Metascore
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-cast">
            <div class="container-cast-list">
                <div class="cast-list">
                    <div class="list-title">
                        <p>Top Cast</p>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast1.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title"onclick="window.location.href='actor-details.php?id=ps1'">Henry Fonda</p>
                                <p class="p-sub-title">Juror 8</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic" > <img src="../../assets/salmansayeed/movie-details/cast/cast2.webp"></div>
                        <div class="list-profile-info" >
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'" >Martin Balsam</p>
                                <p class="p-sub-title">Juror 1</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast3.png"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">E.G. Marshall</p>
                                <p class="p-sub-title">Juror 4</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast4.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">Edward Binns</p>
                                <p class="p-sub-title">Juror 6</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast5.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">George Voskovec</p>
                                <p class="p-sub-title">Juror 11</p>
                        </div>
                    </div>
                </div>
                <div class="cast-list">
                    <div class="list-title list-title2">
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast6.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">Lee J. Cobb</p>
                                <p class="p-sub-title">Juror 3</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast7.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title"onclick="window.location.href='actor-details.php?id=ps1'">John Fiedler</p>
                                <p class="p-sub-title">Juror 2</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast8.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title"onclick="window.location.href='actor-details.php?id=ps1'">Jack Klugman</p>
                                <p class="p-sub-title">Juror 5</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast9.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">Jack Warden</p>
                                <p class="p-sub-title">Juror 7</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/movie-details/cast/cast10.webp"></div>
                        <div class="list-profile-info">
                                <p class="p-title" onclick="window.location.href='actor-details.php?id=ps1'">Ed Begley</p>
                                <p class="p-sub-title">Juror 10</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-cast-trivia">
                <div class="trivia-top">
                    <div class=""><p>Trivia</p></div>
                    <div class="trivia-submit" onclick="window.location.href='trivia.php'">
                        <p>Submit your own trivia</p>
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>
                </div>
                <div class="trivia-bottom">
                    <p>Director Sidney Lumet had the actors all stay in the same room for several hours on end and do their lines over and over without filming them. This was to give them a real taste of what it would be like to be cooped up in a room with the same people.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>
    
    <script src="../../assets/salmansayeed/main-script.js"></script>
</body>
</html>