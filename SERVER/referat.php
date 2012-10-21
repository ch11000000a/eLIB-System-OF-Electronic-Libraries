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

$sql = "SELECT * FROM `books`";
$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);


while ($row = mysql_fetch_assoc($result))
{
  echo "<center><b>" . $row['nazv'] . "</b></center><br/>";
  echo "<center><pre>" . $row['referat'] . "</pre></center><hr><br/>";
  if ( !empty($row['link']) ) { echo "<a href='http://" . $row['link'] . "'>Скачать книгу</a>"; } else {};
}
  
  }
?>
</body>
</html>