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
    include ("config.php");
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    	echo "�� �� ������������, <a href='index.php'>��������������</a>";
}
    else
    {

echo "<a href='index.php'>��������� �� ������� ��������</a><br/><br/>";

$sql = "SELECT * FROM `books`";
$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);


while ($row = mysql_fetch_assoc($result))
{
  echo "<center><b>" . $row['nazv'] . "</b></center><br/>";
  echo "<center><pre>" . $row['referat'] . "</pre></center><hr><br/>";
  if ( !empty($row['link']) ) { echo "<a href='http://" . $row['link'] . "'>������� �����</a>"; } else {};
}
	
  }
?>
</body>
</html>