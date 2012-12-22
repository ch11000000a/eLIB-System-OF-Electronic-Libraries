<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php
    include ("config.php");
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    	echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";

$sql = "SELECT * FROM `books`";
$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);

while ($row = mysql_fetch_assoc($result))
{
  echo "<center><b>" . $row['nazv'] . "</b></center><br/>";
  echo "<center><pre>" . $row['text'] . "</pre></center><hr><br/>";
}
	
  }
?>
</body>
</html>