<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenverse | Contact Us</title>

    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css">
    <link rel="stylesheet" href="../../assets/salmansayeed/contact/style.css">
</head>
<body>
    <?php include('navbar.php') ?>

    <div class="content-container">
        <div class="content-container-box">
            
            <div class="content-container-items">
                <h1 class="contact-box">CONTACT US</h1>
                <p class="contact-box">If you have any questions, suggestions, or need further information, please don’t hesitate to reach out.</p>
                <form id="contact-form" method="post" action="../../controller/salmansayeed/contact-controller.php">
                    <div class="items">
                        <input type="text" id="fname" name="fname" placeholder="Enter Your First Name">
                        <span class="error-msg" id="fname-error"></span>
                    </div>
                    <div class="items">
                        <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name">
                        <span class="error-msg" id="lname-error"></span>
                    </div>
                    <div class="items">
                        <input type="email" id="email" name="email" placeholder="Enter Your Email">
                        <span class="error-msg" id="email-error"></span>
                    </div>
                    <div class="items">
                        <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number">
                        <span class="error-msg" id="phone-error"></span>
                    </div>
                    <div class="items">
                        <textarea id="msg" name="msg" placeholder="Enter Your Message Here"></textarea>
                        <span class="error-msg" id="msg-error"></span>
                    </div>
                    <div class="content-container-buttons">
                        <button class="buttons" id="submit-btn" type="submit">SUBMIT</button>
                        <button class="buttons" id="reset-btn" type="button">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

    <script src="../../assets/salmansayeed/contact/script.js"></script>
    <script src="../../assets/salmansayeed/main-script.js"></script>

</body>
</html>