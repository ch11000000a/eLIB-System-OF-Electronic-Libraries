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
        echo "�� �� ������������, <a href='../index.php'>��������������</a>";
}
    else
    {
// *********GROUP_ACCESS*********
$username = $_SESSION['login']; 
$sql = "SELECT * FROM `users` WHERE login='$username'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");
$row = mysql_fetch_assoc($result);
$group =  $row['group_id'];
$group = intval($group);
if ($group == 0) { $gt = '<b>��������<b>'; $grac = '�� ������ ������/��������� �����'; }
if ($group == 1) { $gt = '<b><font color="orange">����������</font></b>'; $grac = '<b><font color="orange">������ ������ ��� ����� �������� ������ �� ������</font></b>'; }
if ($group == 2) { $gt = '<b><font color="red">��������������</font></b>'; $grac = '<b><font color="red">������ ������</font></b>'; }
if ($group<2){
    echo "<a href='./index.php'><b>�� �������</b></a><br/><br/><b>���� ������: </b>" . $gt . ", � ��� ��� ���������� � ��� ����� �������. <br/><b>���� ����������: </b>" . $grac . "<br/><br/>";
}
  
else {
// *********GROUP_ACCESS*********

include('config.php');

echo "<a href='index.php'>��������� �� ������� ��������</a><br/><br/>";

//���������� �� ��������
if (!empty($_GET['id'])) {
$id = $_GET['id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);
//���������� �� ��������


$sql = "DELETE FROM books WHERE id = '$id'";

   if(mysql_query($sql)) { echo "����� �������!"; } else { echo '�� ������� �������!'; }


}
  }
    }
?>
</body>
</html>