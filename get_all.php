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
error_reporting(0);

    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

include('config.php');

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";
include('config.php');
$result = mysql_query("SELECT * FROM `books`"); 
$vsego_strok = mysql_num_rows($result); 
 
$skolko_stranic = ceil($vsego_strok/10); 
 
if(!isset($_GET['page'])) $page = 1; 
if(isset($_GET['page'])) {  
    $_GET['page'] = strip_tags($_GET['page']);
    $page = $_GET['page'];
    $page = stripslashes($page);
    $page = htmlspecialchars($page);
    $page = trim($page);
    $page = intval($page);

}


$result = mysql_query("SELECT * FROM `books` LIMIT ".(($page-1)*10).",10" ); 
while ($row = mysql_fetch_array($result)) 
{ 
    echo "<a href='get_ref.php?ref_id=" . $row['id'] . "'>" . $row['avtor'] . " - " . $row['nazv'] . "&nbsp;(" . $row['god_izd'] . ")&nbsp;</a><br/>"; 
} 
echo "<br/><b>Страницы:</b>";
 
for($i=1; $i<=$skolko_stranic; $i++) 
{ 
    if($i == $page) 
    { 
        echo "&nbsp;&nbsp;".$i.'&nbsp;&nbsp;'; 
    } 
    else 
    { 
        echo "&nbsp;&nbsp;<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">$i</a>&nbsp;&nbsp;"; 
    } 
    }
} 
?>
</body>
</html>