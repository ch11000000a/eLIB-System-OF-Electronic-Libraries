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
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

include('config.php');

echo "<a href='view.php'>Вернуться на Главную Страницу</a><br/><br/>";


if (!empty($_GET['text_id'])) {
$id = $_GET['text_id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);


$sql = "SELECT * FROM `books` WHERE id='$id'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");

while ($row = mysql_fetch_assoc($result))
{
  echo "<center><b>" . $row['nazv'] . "</b></center><br/>";
  echo "<center><pre>" . $row['text'] . "</pre></center><br/>";
  if ( !empty($row['link']) ) { echo "<a href='" . $row['link'] . "'>Скачать книгу</a>"; } else {};
}

}
  }
?>
</body>
</html>