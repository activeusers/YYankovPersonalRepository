<?php
session_start();
function head($title)
{
    ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>1secTAXI | <?php echo $title; ?></title>
        <script src="js/jquery2.1.4.js"></script>
        <script src="js/slider.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css"/>
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    </head>
    <body>
    <div id="header">
        <nav>
            <ul>
                <li><a href="index.php">Начало</a></li>
                <li><a href="query.php">Карта</a></li>
                <li><a href="info.php">Информация</a></li>
                <li><a href="about.php">За нас</a></li>
                <div class="login">
                    <li><a href="login.php">Вход</a></li>
                </div>
                <div class="logout">
                    <li><a href="logout.php">Изход</a></li>
                </div>
            </ul>
            <div class="handle">Menu</div>
        </nav>
        <?php
        if ($_SESSION['is_logged'] == 1) {
            echo '<script> $(document).ready(function(){$(".login").hide();$(".logout").show();});</script>';

        } else
        {
            echo '<script> $(document).ready(function(){$(".login").show();$(".logout").hide();});</script>';
        }
        ?>
        <script>
            $('.handle').on('click', function () {
                $('nav ul').toggleClass('showing');
            });
        </script>
        <?php
        if($title == 'Начало'){
            echo '<div id="slideshow" class="cycle-slideshow"
         data-cycle-swipe=true
         data-cycle-swipe-fx=scrollHorz
         data-cycle-fx="scrollHorz"
         data-cycle-pause-on-hover="true"
         data-cycle-speed="3000">
         <button class></button>
        <img src="img/taxi.jpg" alt="second">
        <img src="img/taxinyc1.jpg" alt="secondtolast">
        <img src="img/manhattantaxi.jpg" alt="last">
        <img src="img/traffic2.jpg" alt="main">
    </div>';
        }
        ?>
    </div>

    <?php
    }
    function db_init($host, $user,$pass, $db_name){
    $mysqli = new mysqli($host, $user, $pass, $db_name);

    if($mysqli->connect_error)
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());

    return $mysqli;
    }

    function footer()
    {
    ?>
    <footer>
        <div class="wrapper">
            <p class="footer">(C)2015 1sectaxi.com All rights reserved.</p>

        </div>
    </footer>
    </body>
    </html>
    <?php
}