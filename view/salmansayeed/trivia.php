<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenverse | Trivia</title>

    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css">
    <link rel="stylesheet" href="../../assets/salmansayeed/trivia/style-trivia.css">
</head>
<body>
    <?php include("navbar.php") ?>

    <div class="content-container">
        <div class="content-container-blurr">
            <div class="trivia-container">
                <div class="trivia-container-top">
                    <div class="top-items trivia-title">
                        <p>Trivia Submission</p>
                    </div>
                    <div class="top-items trivia-score">
                        <div class="scorebox">
                            <p>Your score:</p>
                            <p class="score">500</p>
                        </div>
                    </div>
                </div>
                <div class="trivia-container-bottom">
                    <div class="bottom-items trivia-desc">
                        <p>Fill this form to submit your own trivia!</p>
                    </div>
                    <div class="bottom-items trivia-textbox">
                        <form method="post" action="../../controller/salmansayeed/trivia-controller.php" onsubmit="return validateForm()">
                            <div class="textboxs">
                                
                                <input id="textboxlink" class="textbox-link" type="text" name="link" placeholder="Link of the section">
                                <span id="link-error"></span>
                            </div>
                            <div class="textboxs">
                                <textarea id="textboxmsg" class="textbox-area" name="message"  placeholder="Your trivia!"></textarea>
                                <span id="msg-error"></span>
                            </div>
                        
                            </div>
                            <div class="bottom-items trivia-submit"><button id="submitbtn" class="submitbtn" type="submit">Submit</button></div>
                        </form>
                </div>
            </div>

        </div>
    </div>

    <?php include("footer.php") ?>
    <script src="../../assets/salmansayeed/main-script.js"></script>
    <script src="../../assets/salmansayeed/trivia/style-trivia.js"></script>
</body>
</html>