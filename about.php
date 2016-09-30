<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'pages.php';
head('За нас');
if($_SESSION['is_logged'] == 1){
    ?>
    <div class="about">
    <h1>За нас</h1>
        <h3>Потърсете ни в социалните мрежи</h3>
        <ul>
            <li><img src="img/icons/9.png" alt="timeIcon"></li>
            <li><img src="img/icons/10.png" alt="timeIcon" ></li>
            <li><img src="img/icons/12.png" alt="timeIcon"></li>
        </ul>
        <p>За повече информация можете да се свържете с нас на адрес : <a href="#">support@1sectaxi.com</a></p>
        <p>Или на телефон валиден за цялата страна:<a href="#">0896611166</a> </p>
    </div>
<?php
}else{
    header('Location: login.php');
}

footer();