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
    // ���������, ����� �� ���������� ������ � id ������������
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "�� �� ������������, <a href='index.php'>��������������</a>";
}
    else
    {

include('config.php');

echo "<a href='view.php'>��������� �� ������� ��������</a><br/><br/>";

//���������� �� ��������
if (!empty($_GET['text_id'])) {
$id = $_GET['text_id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);
//���������� �� ��������

$sql = "SELECT * FROM `books` WHERE id='$id'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");

while ($row = mysql_fetch_assoc($result))
{
  echo "<center><b>" . $row['nazv'] . "</b></center><br/>";
  echo "<center><pre>" . $row['text'] . "</pre></center><br/>";
  if ( !empty($row['link']) ) { echo "<a href='" . $row['link'] . "'>������� �����</a>"; } else {};
}

}
  }
?>
</body>
</html>