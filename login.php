<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
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
    session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['pass'])) { $password=$_POST['pass']; if ($password =='') { unset($password);} }
   
if (empty($login) or empty($password))
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля! <a href='index.php'>На Главную</a>");
    }
   
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = mysql_escape_string($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $login = trim($login);
    $password = trim($password);
    $password = md5(md5($password));

    include ("config.php");
 
$result = mysql_query("SELECT * FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['password']))
    {
    
    exit ("Извините, введённый вами логин или пароль неверный. <a href='index.php'>На Главную</a>");
    }
    else {
    
    if ($myrow['password']==$password) {
    
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];
    header("Location: index.php");
    }
 else {
    

    exit ("Извините, введённый вами логин или пароль неверный. <a href='index.php'>На Главную</a>");
    }
    }
    ?>

    </body>
</html>