<?php
include 'pages.php';
error_reporting(E_ALL ^ E_NOTICE);
if(!$_SESSION['is_logged'] == 1){
    head('Регистрация');
    if($_POST['form_submit'] == 1){
            $login = trim($_POST['login']);
            $pas1 = trim($_POST['pass1']);
            $pas2 = trim($_POST['pass2']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);

    if(strlen($login)<4){
        echo 'Неправилно въведено име!';
        $error_array['login'] = 'Неправилно въведено име!';
    }
    if(strlen($pas1)<6){
        echo 'Паролата трябва да се състои от 6 или повече знака!';
        $error_array['pass1'] = 'Паролата трябва да се състои от 6 или повече знака!';
    }
    if($pas1 != $pas2){
        echo 'Паролите не съвпадът';
        $error_array['pass_do_not_match'] = 'Паролите не съвпадът';
    }
    if(strlen($phone)<9){
        echo 'Телефонът който сте въвели е с по-малко от 9 знака!';
        $error_array['phone'] = 'Телефонът който сте въвели е с по-малко от 10 знака!';
    }
    if(!count($error_array)>0){
            $mysqli = db_init('localhost', 'root', '', 'taxi');
            $query = 'SELECT COUNT(*) as cnt FROM users WHERE login = "'.addslashes($login) . '" OR email = "' . addslashes($email) .'"';
            $result = mysqli_query($mysqli,$query);
            $row = mysqli_fetch_assoc($result);
            if($row['cnt'] == 0){
                mysqli_query($mysqli,'INSERT INTO users (login, password, phone, email, date_registered)
                              VALUES ("' . addslashes($login) . '", "'. md5($pas1).'", "'. addslashes($email) . '","'.addslashes($phone).'",'. time().')');
                if(mysqli_error($mysqli)){
                    echo mysqli_error($mysqli);
                    echo 'Грешка. Моля опитайте отново.';
                }else{
                    echo'Успешна регистация.';
                    header('Location: login.php');
                    exit;
                }
            }else{
                echo 'Името или адреса са заети!';
                $error_array['login'] = 'Името или адреса са заети!';

            }


        }
    }
?>
    <form action="register.php" method="post" class="form-3">
        <table class="form">
            <tr>
                <td><label for="login">Потребителско име:</label></td>
                <td><input type="text" id="login" name="login"/></td>
            </tr>
            <tr>
                <td><label for="pass1">Парола:</label></td>
                <td><input type="password" id="pass1" name="pass1"/></td>
            </tr>
            <tr>
                <td><label for="pass2">Повторете паролата:</label></td>
                <td><input type="password" id="pass2" name="pass2"/></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email"/></td>
            </tr>
            <tr>
                <td><label for="name">Телефон:</label></td>
                <td><input type="text" id="phone" name="phone"/></td>
            </tr>
            <tr>
                <td><input type="hidden" name="form_submit" value="1"/></td>
                <td><input type="submit" id="register" name="register" value="Регистрация"/></td>
            </tr>

        </table>
    </form>
<?php
    footer();
}else{
    header('Location: index.php');
    exit;
}
