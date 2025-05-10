<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenverse | Actor Name</title>

    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css">
    <link rel="stylesheet" href="../../assets/salmansayeed/actor-details/style-actor-details.css">
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="content-container"> 

        <!-- ----------------------------------- movie information box ----------------------------------- -->
        <div class="container-profile-box">
            <div class="container-profile-box-blurr">
                <div class="profile-info">
                    <div class="info-title">
                        <h1>Robert Pattinson</h1>
                        <p>Actor • Producer • Writer</p>
                    </div>
                    <div class="info-links">
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
                        <iframe width="900" height="450" src="https://www.youtube.com/embed/bYQeG7Z5qzE?si=Y-vRmR3K7nxJjnb9&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="profile-desc">
                    <div class="desc-box desc-box1">
                        <div class="desc-items">
                            <p>Robert Douglas Thomas Pattinson was born May 13, 1986 in London, England, to Richard Pattinson, a car dealer importing vintage cars, and Clare Pattinson (née Charlton), who worked as a booker at a model agency. He grew up in Barnes, southwest London with two older sisters. Robert discovered his love for music long before acting and started learning the guitar and piano at the age of four. He became a big cinephile for love of auteur cinema in his early teens and preferred to watch films rather than doing his homework. In his late teens and early twenties, he used to perform solo acoustic guitar gigs at open mic nights in bars and pubs around London where he sung his own written songs. Thinking about becoming a musician or going to university to study speech-writing, he never thought about pursuing an acting career and his drama teacher in school even advised him not to join the drama club because she thought he wasn't made for the creative subjects. But as a teenager, he joined the local amateur theatre club after his father convinced him to attend because he was quite shy. At age 15 and after two years of working backstage, he auditioned for the play 'Guys and Dolls' and he got his first role as a Cuban dancer with no lines. He got the lead part in the next play 'Our Town', was spotted by a talent agent who was sitting in the audience and he began looking for professional roles.</p>
                        </div>
                    </div>

                    <div class="desc-box desc-box2">
                        <div class="desc-box2-item">
                            <div class="box2-button box2-button1">
                            <i class="fa-solid fa-plus"></i><p>Add to List</p>
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
                        <p>Known For</p>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv1.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">Batman</p>
                                <p class="p-sub-title">2022</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv2.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">Mickey 17</p>
                                <p class="p-sub-title">2025</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv3.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">Twilight</p>
                                <p class="p-sub-title">2008</p>
                        </div>
                    </div>
                </div>
                <div class="cast-list">
                    <div class="list-title list-title2">
                        <div class="trivia-submit see-all" >
                        <p >See all</p>
                    </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv4.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">Tenet</p>
                                <p class="p-sub-title">2020</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv5.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">The Twilight Saga: Eclipse</p>
                                <p class="p-sub-title">2010</p>
                        </div>
                    </div>
                    <div class="list">
                        <div class="list-profile-pic"> <img src="../../assets/salmansayeed/actor-details/mv/mv6.jpg"></div>
                        <div class="list-profile-info">
                                <p class="p-title">The Devil All the Time</p>
                                <p class="p-sub-title">2020</p>
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
                    <p>While filming a movie in Spain, a woman was stalking him at his apartment for several weeks. As he felt bored at the time, he took her out for dinner, where he, in his own words, "just complained about everything" in his life. After that, she never returned.</p>
                </div>
                <div class="trivia-top">
                    <div class=""><p>Awards</p></div>
                </div>
                <div class="trivia-bottom">
                    <div class="awards a-1">
                        • Academy of Science Fiction, Fantasy & Horror Films, USA
                        <div>
                            <div class="award-desc">
                                <p>2022 nominee <p class="award-desc-inner">Saturn  Award</p></p>
                            </div>

                            <div class="award-desc2">
                                <p>Best Actor</p>
                                <p><a href="##">The Batman</a></p>
                            </div>
                        </div>
                        <div>
                            <div class="award-desc">
                                <p>2021 nominee <p class="award-desc-inner">Saturn  Award</p></p>
                            </div>

                            <div class="award-desc2">
                                <p>Best Supporting Actor</p>
                                <p><a href="##">Tenet</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="awards">
                        • Film Critics Circle of Australia Awards
                        <div>
                            <div class="award-desc">
                                <p>2015 nominee <p class="award-desc-inner">FCCA  Award</p></p>
                            </div>

                            <div class="award-desc2">
                                <p>Best Actor - Supporting Role</p>
                                <p><a href="##">The Rover</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="awards">
                        • Evening Standard British Film Awards
                        <div>
                            <div class="award-desc">
                                <p>2018 nominee <p class="award-desc-inner">Evening Standard British Film Award</p></p>
                            </div>

                            <div class="award-desc2">
                                <p>Best Actor</p>
                                <p><a href="##">Good Time</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>
    
    <script src="../../assets/salmansayeed/main-script.js"></script>
</body>
</html>