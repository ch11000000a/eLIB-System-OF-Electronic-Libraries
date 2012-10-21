<?php
include ("connect.php");
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


include('connect.php');

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";

$sql = "SELECT * FROM `users`";

// Скармливаем наш запрос MySQL
$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);

// Рисуем табличку
$table = "<table border=1 width=100% align=center>\n";

while ($row = mysql_fetch_assoc($result))
{
  if ($row['group_id'] == 0) {  $row['group_id'] = 'Пользователь'; }
  if ($row['group_id'] == 1) {  $row['group_id'] = 'Модератор'; }
  if ($row['group_id'] == 2) {  $row['group_id'] = 'Администратор'; }

    $table .= "<tr>\n";
    $table .= "<td>".$row['id']."</td>\n";
    $table .= "<td>".$row['login']."</td>\n";
    $table .= "<td>".$row['group_id']."</td>\n";
    $table .= "<td><a href='get_user.php?user_id=" . $row['id'] . "'>Дополнительно</a></td>\n";
    $table .= "</tr>\n";
}

$table .= "</table>\n";

// Выводим заполненую таблицу на экран
echo $table;

  
  }
?>
</body>
</html>