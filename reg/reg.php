<html>
<head>
<style>
    body {
        background: #eee;
        font: 12px "Lucida sans", Arial, Helvetica;
        color: #333;
    }
    
    a {
        color: #2A679F;
    }
</style>
</head>
<body>
<?php
    error_reporting(0);
    include ("../config.php");
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }  
    if (isset($_POST['pass'])) { $pass=$_POST['pass']; if ($pass =='') { unset($pass);} } 
    if (isset($_POST['re_pass'])) { $re_pass=$_POST['re_pass']; if ($re_pass =='') { unset($re_pass);} }
    

if (empty($login) or empty($pass) or empty($re_pass)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='index.php'>Назад</a>");
    }
 
 
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    $re_pass = stripslashes($re_pass);
    $re_pass = htmlspecialchars($re_pass);
    

 
    $login = trim($login);
    $pass = trim($pass);
    $re_pass = trim($re_pass);


if ($pass !== $re_pass) {
  exit ("Пароли не совпадают! Вернитесь назад и введите пароли заново! <a href='index.php'>Назад</a>"); 
}
    $pass = md5(md5($pass));
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. <a href='index.php'>Назад</a>");
    }
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$pass')");
   
    if ($result2=='TRUE')
    {
        echo "Вы успешно зарегестрированы! <a href='../index.php'>Войти...</a>";
    }
 else {
    echo "Ошибка!";
    }
    ?>
</body>
</html>