<?php
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
    include('config.php');
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";

$sql = "SELECT * FROM `books`";
$result = mysql_query($sql) or die(mysql_error());
$table = "<table border=1 width=100% align=center>\n";

while ($row = mysql_fetch_assoc($result))
{
    $table .= "<tr>\n";
    $table .= "<td>".$row['avtor']."</td>\n";
    $table .= "<td>".$row['nazv']."</td>\n";
    $table .= "<td>".$row['izd']."</td>\n";
    $table .= "<td>".$row['god_izd']."</td>\n";
    $table .= "<td>".$row['mesto_izd']."</td>\n";
    $table .= "<td>".$row['ob']."</td>\n";
    $table .= "<td>".$row['sobst']."</td>\n";
    $table .= "<td>".$row['udk']."</td>\n";
    $table .= "<td>".$row['bbk']."</td>\n";
    $table .= "<td>".$row['grif']."</td>\n";
    $table .= "<td>".$row['stat']."</td>\n";
    $table .= "<td>".$row['keywords']."</td>\n";
    $table .= "<td><a href='get_ref.php?ref_id=" . $row['id'] . "'>Реферат</a></td>\n";
    $table .= "<td><a href='get_text.php?text_id=" . $row['id'] . "'>Текст</a></td>\n";
    $table .= "<td><a href='" . $row['link'] . "'>Скачать</a></td>\n"; 
    $table .= "</tr>\n";
}

$table .= "</table>\n";
echo $table; 
  }
?>
</body>
</html>