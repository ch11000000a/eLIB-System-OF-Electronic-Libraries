<?php
include ("config.php");
session_start();
?>
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
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

include('config.php');

echo "<a href='users.php'>Назад</a><br/><br/>";

//Защищаемся от хацкеров
if (!empty($_GET['user_id'])) {
$id = $_GET['user_id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);
//Защищаемся от хацкеров

$sql = "SELECT * FROM `users` WHERE id='$id'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");

while ($row = mysql_fetch_assoc($result))
{
 	if ($row['group_id'] == 0) {  $row['group_id'] = 'Пользователь'; }
 	if ($row['group_id'] == 1) {  $row['group_id'] = '<font color="orange">Модератор</font>'; }
 	if ($row['group_id'] == 2) {  $row['group_id'] = '<font color="red">Администратор</font>'; }
	$login = $row['login'];
    $userid = $row['id'];
    echo "<b><h3>" . $row['login'] . " - " . $row['group_id'] . "</h3></b><br/><a href='get_user.php?user_id=" . $row['id'] . "&new_login=" . $row['id'] . "'>[Изменить Логин]</a>&nbsp;&nbsp;<a href='get_user.php?user_id=" . $row['id'] . "&new_pass=" . $row['id'] . "'>[Изменить Пароль]</a>&nbsp;&nbsp;<a href='get_user.php?user_id=" . $row['id'] . "&user_del=" . $row['id'] . "'>[Удалить Пользователя]</a>";
}
	


// меняем логин_start
if (!empty($_GET['user_id']) and !empty($_GET['new_login']) and $_GET['user_id'] == $_GET['new_login']) {
echo "<form action='get_user.php?user_id=" . $userid . "&new_login=" . $userid . "' method='post'><input name='new_login' type='text' id='new_login' placeholder='Новый логин для пользователя " . $login . "' size='45' required>";
echo "<input name='submit' type='submit' id='submit' value='Изменить'></form><br/>";

//обрабатываем данные
if (isset($_POST['new_login'])) { $new_login = $_POST['new_login']; if ($new_login == '') 
    $new_login = stripslashes($new_login);
    $new_login = htmlspecialchars($new_login);
    // вносим в БД
    $query = "UPDATE users SET login = '$new_login' WHERE id = $userid";
    $result = mysql_query ($query);
//сообщаем юзеру
    echo "<font color='lime'>Логин пользователя</font> <b><font color='red'>" . $login . "</font></b> <font color='lime'>изменен на </font><b><font color='red'>" . $new_login . "</font></b>";
{ unset($new_login);} }
}
// меняем логин_end

// меняем пасс_start
if (!empty($_GET['user_id']) and !empty($_GET['new_pass']) and $_GET['user_id'] == $_GET['new_pass']) {
echo "<form action='get_user.php?user_id=" . $userid . "&new_pass=" . $userid . "' method='post'><input name='new_pass' type='password' id='new_pass' placeholder='Новый пароль для пользователя " . $login . "' size='45' required>";
echo "<input name='submit' type='submit' id='submit' value='Изменить'></form><br/>";

//обрабатываем данные
if (isset($_POST['new_pass'])) { $new_pass = $_POST['new_pass']; if ($new_pass == '') 
    $new_pass = stripslashes($new_pass);
    $new_pass = htmlspecialchars($new_pass);
    $new_pass = md5(md5($new_pass));
 // вносим в БД
    $query = "UPDATE users SET password = '$new_pass' WHERE id = $userid";
    $result = mysql_query ($query);
//сообщаем юзеру
    echo "<font color='lime'>Пароль пользователя</font> <b><font color='red'>" . $login . "</font></b> <font color='lime'>изменен.</font>";
{ unset($new_pass);} }
}
// меняем пасс_end

// удаляем юзера_start
if (!empty($_GET['user_id']) and !empty($_GET['user_del']) and $_GET['user_id'] == $_GET['user_del']) {
echo "<form action='get_user.php?user_id=" . $userid . "&user_del=" . $userid . "' method='post'><input name='del' value='1' type='hidden' id='del' size='45'>";
echo "<input name='submit' type='submit' id='submit' value='Удалить пользователя'></form><br/>";

//обрабатываем данные
if (isset($_POST['del'])) { $del = $_POST['del']; if ($del == '') 
    $del = stripslashes($del);
    $del = htmlspecialchars($del);
    
// вносим в БД
    if ( $del == 1 ) {
    $query = "DELETE from users where id = $userid"; 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */ 
mysql_query($query) or die(mysql_error());

//сообщаем юзеру
    echo "<font color='green'>Пользователь</font> <b><font color='red'>" . $login . "</font></b> <font color='green'>успешно удален.</font>"; 
} else { echo "<font color='red'>Ошибка! Пользователь не удален.</font>"; }

{ unset($del);} }
}
// удаляем юзера_end

}
	
  }
?>
</body>
</html>