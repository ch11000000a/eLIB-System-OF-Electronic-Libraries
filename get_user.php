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

echo "<a href='users.php'>�����</a><br/><br/>";

//���������� �� ��������
if (!empty($_GET['user_id'])) {
$id = $_GET['user_id'];
$id = htmlspecialchars($id);
$id = stripcslashes($id);
$id = trim($id);
$id = abs($id);
//���������� �� ��������

$sql = "SELECT * FROM `users` WHERE id='$id'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");

while ($row = mysql_fetch_assoc($result))
{
 	if ($row['group_id'] == 0) {  $row['group_id'] = '������������'; }
 	if ($row['group_id'] == 1) {  $row['group_id'] = '<font color="orange">���������</font>'; }
 	if ($row['group_id'] == 2) {  $row['group_id'] = '<font color="red">�������������</font>'; }
	$login = $row['login'];
    $userid = $row['id'];
    echo "<b><h3>" . $row['login'] . " - " . $row['group_id'] . "</h3></b><br/><a href='get_user.php?user_id=" . $row['id'] . "&new_login=" . $row['id'] . "'>[�������� �����]</a>&nbsp;&nbsp;<a href='get_user.php?user_id=" . $row['id'] . "&new_pass=" . $row['id'] . "'>[�������� ������]</a>&nbsp;&nbsp;<a href='get_user.php?user_id=" . $row['id'] . "&user_del=" . $row['id'] . "'>[������� ������������]</a>";
}
	


// ������ �����_start
if (!empty($_GET['user_id']) and !empty($_GET['new_login']) and $_GET['user_id'] == $_GET['new_login']) {
echo "<form action='get_user.php?user_id=" . $userid . "&new_login=" . $userid . "' method='post'><input name='new_login' type='text' id='new_login' placeholder='����� ����� ��� ������������ " . $login . "' size='45' required>";
echo "<input name='submit' type='submit' id='submit' value='��������'></form><br/>";

//������������ ������
if (isset($_POST['new_login'])) { $new_login = $_POST['new_login']; if ($new_login == '') 
    $new_login = stripslashes($new_login);
    $new_login = htmlspecialchars($new_login);
    // ������ � ��
    $query = "UPDATE users SET login = '$new_login' WHERE id = $userid";
    $result = mysql_query ($query);
//�������� �����
    echo "<font color='lime'>����� ������������</font> <b><font color='red'>" . $login . "</font></b> <font color='lime'>������� �� </font><b><font color='red'>" . $new_login . "</font></b>";
{ unset($new_login);} }
}
// ������ �����_end

// ������ ����_start
if (!empty($_GET['user_id']) and !empty($_GET['new_pass']) and $_GET['user_id'] == $_GET['new_pass']) {
echo "<form action='get_user.php?user_id=" . $userid . "&new_pass=" . $userid . "' method='post'><input name='new_pass' type='password' id='new_pass' placeholder='����� ������ ��� ������������ " . $login . "' size='45' required>";
echo "<input name='submit' type='submit' id='submit' value='��������'></form><br/>";

//������������ ������
if (isset($_POST['new_pass'])) { $new_pass = $_POST['new_pass']; if ($new_pass == '') 
    $new_pass = stripslashes($new_pass);
    $new_pass = htmlspecialchars($new_pass);
    $new_pass = md5(md5($new_pass));
 // ������ � ��
    $query = "UPDATE users SET password = '$new_pass' WHERE id = $userid";
    $result = mysql_query ($query);
//�������� �����
    echo "<font color='lime'>������ ������������</font> <b><font color='red'>" . $login . "</font></b> <font color='lime'>�������.</font>";
{ unset($new_pass);} }
}
// ������ ����_end

// ������� �����_start
if (!empty($_GET['user_id']) and !empty($_GET['user_del']) and $_GET['user_id'] == $_GET['user_del']) {
echo "<form action='get_user.php?user_id=" . $userid . "&user_del=" . $userid . "' method='post'><input name='del' value='1' type='hidden' id='del' size='45'>";
echo "<input name='submit' type='submit' id='submit' value='������� ������������'></form><br/>";

//������������ ������
if (isset($_POST['del'])) { $del = $_POST['del']; if ($del == '') 
    $del = stripslashes($del);
    $del = htmlspecialchars($del);
    
// ������ � ��
    if ( $del == 1 ) {
    $query = "DELETE from users where id = $userid"; 
/* ��������� ������. ���� ���������� ������ - ������� ��. */ 
mysql_query($query) or die(mysql_error());

//�������� �����
    echo "<font color='green'>������������</font> <b><font color='red'>" . $login . "</font></b> <font color='green'>������� ������.</font>"; 
} else { echo "<font color='red'>������! ������������ �� ������.</font>"; }

{ unset($del);} }
}
// ������� �����_end

}
	
  }
?>
</body>
</html>