<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'pages.php';
head('Начало');
?>
<div class="content" align="center">
    <div class="icons">
    <div class="left">
        <img src="img/icons/5.png" alt="timeIcon">
    </div>
    <div class="right">
        <img src="img/icons/14.png" alt="timeIcon" >
    </div>
    <div class="center">
        <img src="img/icons/7.png" alt="timeIcon">
    </div>
    </div>
    <div class="text">
        <div class="tLeft">
            <h3 align="center">Услуги</h3>
            <p>Желаната дестинация е на само клик разтояние.</p>
        </div>
        <div class="tRight" >
            <h3 align="center">Поддръжка</h3>
            <p>Достъпно за всички устройства.Налично за Android и iOS.</p>
        </div>
        <div class="tCenter">
            <h3 align="center">Настойки</h3>
            <p>Бързи и лесни настройки остнемащи не повече от 1 минута.</p>
        </div>
    </div>
</div>
    
<?php
footer();