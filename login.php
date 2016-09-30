<?php
include 'pages.php';
error_reporting(E_ALL ^ E_NOTICE);
head('Вход');
if($_POST['form_login'] == "1"){
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    if(strlen($login)>=4 && strlen($password)>=6){
        $mysqli = db_init('localhost', 'root', '', 'taxi');
        $sql = 'SELECT * FROM users WHERE login="'.addslashes($login) . '" AND password = "' . md5($password) .'"';
        $result = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['is_logged'] = 1;
            $_SESSION['userInfo'] = $row;
            header('Location: index.php');
            exit;
        }elseif(mysqli_num_rows($result) == 0){
            echo 'Грешно име или парола!!!';

        }else{
            echo "ugjhg";
        }
    }else{
        echo "KO stabna weee";
    }


}
?>
    <form action="login.php" method="post" class="form-3">
        <table class="form">
            <tr>
                <td><label for="login">Потребителско име:</label></td>
                <td><input type="text" id="login" name="login"/></td>
            </tr>
            <tr>
                <td><label for="password">Парола:</label></td>
                <td><input type="password" id="password" name="password"/></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                   <p id="register">Регистрация <a href="register.php">тук!</a></p>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="form_login" value="1"/></td>
                <td><input type="submit" name="submit" value="Вход"/></td>
            </tr>
        </table>
    </form>
<?php
footer();