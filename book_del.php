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
    
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
        echo "Вы не авторизованы, <a href='../index.php'>Авторизоваться</a>";
}
    else
    {

$username = $_SESSION['login']; 
$sql = "SELECT * FROM `users` WHERE login='$username'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");
$row = mysql_fetch_assoc($result);
$group =  $row['group_id'];
$group = intval($group);
if ($group == 0) { $gt = '<b>Студенты<b>'; $grac = 'Вы можете читать/скачивать книги'; }
if ($group == 1) { $gt = '<b><font color="orange">Модераторы</font></b>'; $grac = '<b><font color="orange">Полный доступ без права загрузки файлов на сервер</font></b>'; }
if ($group == 2) { $gt = '<b><font color="red">Администраторы</font></b>'; $grac = '<b><font color="red">Полный доступ</font></b>'; }
if ($group<2){
    echo "<a href='./index.php'><b>На Главную</b></a><br/><br/><b>Ваша группа: </b>" . $gt . ", У Вас нет привилегий в эту часть ресурса. <br/><b>Ваши привилегии: </b>" . $grac . "<br/><br/>";
}
  
else {
include('config.php');

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";

if (!empty($_GET['id'])) {
$id = $_GET['id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);


$sql = "DELETE FROM books WHERE id = '$id'";

   if(mysql_query($sql)) { echo "Книга удалена!"; } else { echo 'Не удалось удалить!'; }


}
  }
    }
?>
</body>
</html>