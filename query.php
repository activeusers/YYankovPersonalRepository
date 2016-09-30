<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'pages.php';
head('Заяви');

    if($_SESSION['is_logged'] == 1){
        ?>
        <script>
            $(document).ready(function(){
                $('.taxi').hide();
                $('.success').hide();
            });

        </script>
        <button class="getLocation" id="getLocation">Къде се намирам в момента</button>
        <button class="taxi" id="taxi">Заяви такси на този адрес</button>
        <h3 class="success">Успешно изпратена заявка ще получите съобщение с необходимата информация до няколко секунди.</h3>
        <div id="map">
            <iframe id="googleMap" width="1348" height="600" frameborder="0" scrolling="0" marginheight="0" marginwidth="0" src="https://www.google.bg/maps?q=43.8216171,25.959792,12&z=60&output=embed"></iframe>
        </div>


        <script>

            var c = function(pos){
                var lat  = pos.coords.latitude,
                    long = pos.coords.longitude,
                    coords = lat + ', ' + long;
                document.getElementById('googleMap').setAttribute('src', 'https://www.google.bg/maps?q='+ coords + '&z=60&output=embed');
            };
            document.getElementById('getLocation').onclick = function(){
                navigator.geolocation.getCurrentPosition(c);
                return false;
            };
            $('#getLocation').click(function(){
                $(this).hide();
                $('.taxi').show();
            });
        </script>
        <script>

            $('#taxi').click(function(){
                $(this).hide();
                $('.success').show();
            });
        </script>

    <?php
    }
    else{
        header('Location: login.php');
    }

