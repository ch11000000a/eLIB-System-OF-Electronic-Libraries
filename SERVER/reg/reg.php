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
 
error_reporting(0); // пыха выдает нотисы на пустые переменные...пока так оставлю а то линяк писать :D

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }  
    if (isset($_POST['pass'])) { $pass=$_POST['pass']; if ($pass =='') { unset($pass);} } 
    if (isset($_POST['re_pass'])) { $re_pass=$_POST['re_pass']; if ($re_pass =='') { unset($re_pass);} }
    

if (empty($login) or empty($pass) or empty($re_pass)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='index.php'>Назад</a>");
    }
 
 // если данные введены,то обрабатываем, чтобы теги и скрипты не работали...
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    $re_pass = stripslashes($re_pass);
    $re_pass = htmlspecialchars($re_pass);
    

 // удаляем лишние пробелы
    $login = trim($login);
    $pass = trim($pass);
    $re_pass = trim($re_pass);

//если pass !== re_pass то
if ($pass !== $re_pass) {
  exit ("Пароли не совпадают! Вернитесь назад и введите пароли заново! <a href='index.php'>Назад</a>"); 
}

//Шифруем пасс в md5
$pass = md5(md5($pass));

 // подключаемся к базе
    include ("../connect.php");
 

 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. <a href='index.php'>Назад</a>");
    }
 

 // сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password) VALUES('$login','$pass')");
    // Проверяем, есть ли ошибки
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