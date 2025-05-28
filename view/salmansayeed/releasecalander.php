<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Screenverse | Calander</title>

    <link rel="icon" type="image/png" href="../../assets/icons/logosmall.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="../../assets/salmansayeed/main-style.css">
    <link rel="stylesheet" href="../../assets/salmansayeed/releasecalander/style-releasecalander.css">
</head>
<body>
    <?php include('navbar.php') ?>

    <div class="continer-content">   
        <div class="content-header">
            <h1>Release Calander</h1> 
        </div>
        <div class="content-filter">
            <div class="radio-button"><input type="radio" name="radio-sel"><label>Upcoming</label></div>
            <div class="radio-button"><input type="radio" name="radio-sel"><label>Released</label></div>
            <div class="drop-down">
                <select name="sortByYear" required>
                <option value="" disabled selected>Sort by Year</option>
                <option value="2021-present">2021–Present</option>
                <option value="2011-2020">2011–2020</option>
                <option value="2001-2010">2001–2010</option>
                <option value="1991-2000">1991–2000</option>
                <option value="1981-1990">1981–1990</option>
                <option value="before-1980">Before 1980</option>
                </select>
            </div>
        </div>

        <div class="card-title"><h2>Upcoming</h2></div>

        <div class="content-cards">
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-1.jpg">
                <span class="card-items-title">F1</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-2.jpg">
                <span class="card-items-title">Fantastic Four</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-3.jpg">
                <span class="card-items-title">Superman</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-4.jpg">
                <span class="card-items-title">Tron Ares</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-5.jpg">
                <span class="card-items-title">Now You See Me</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/1-6.jpg">
                <span class="card-items-title">Ballerina</span>
            </div>
        </div>

        <div class="card-title"><h2>New Release</h2></div>

        <div class="content-cards">
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-1.jpg">
                <span class="card-items-title">Crow</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-2.jpg">
                <span class="card-items-title">Rust</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-3.jpg">
                <span class="card-items-title">Carry-on</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-4.jpg">
                <span class="card-items-title">Deadpool vs Wolverine</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-5.jpg">
                <span class="card-items-title">The Union</span>
            </div>
            <div class="card-items">
                <img class="card-items-img" src="../../assets/salmansayeed/releasecalander/moviecards/2-6.jpg">
                <span class="card-items-title">Lilo & Stitch</span>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>
</body>
</html>