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
      echo "�� �� ������������, <a href='index.php'>��������������</a>";
}
    else
    {

echo "<a href='index.php'>��������� �� ������� ��������</a><br/><br/>";
$username = $_SESSION['login']; 
$all_books = mysql_query("SELECT COUNT(*) FROM books");
$books = mysql_fetch_row($all_books);
$all_users = mysql_query("SELECT COUNT(*) FROM users");
$users = mysql_fetch_row($all_users);

function formatfilesize( $data ) {
    
 
        if( $data < 1024 ) {
        
            return $data . " bytes";
        
        }

        else if( $data < 1024000 ) {
        
            return round( ( $data / 1024 ), 1 ) . "KB";
        
        }

        else {
        
            return round( ( $data / 1024000 ), 1 ) . " MB";
        
        }
    
    }


    $dbname = "elib";


    mysql_select_db( $dbname );
    $result = mysql_query( "SHOW TABLE STATUS" );
    $dbsize = 0;
	
    while( $row = mysql_fetch_array( $result ) ) {  
	
        $dbsize += $row[ "Data_length" ] + $row[ "Index_length" ];
		
    }



$sql = "SELECT * FROM `users` WHERE login='$username'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");
$row = mysql_fetch_assoc($result);
$group =  $row['group_id'];

$group = intval($group);
if ($group == 0) { $gt = '<b>��������<b>'; $grac = '�� ������ ������/��������� �����'; }
if ($group == 1) { $gt = '<b><font color="orange">����������</font></b>'; $grac = '<b><font color="orange">������ ������ ��� ����� �������� ������ �� ������</font></b>'; }
if ($group == 2) { $gt = '<b><font color="red">��������������</font></b>'; $grac = '<b><font color="red">������ ������</font></b>'; }


echo "<b>��: </b>" . $username . "<br/><b>���� � ����: </b><a href='stat.php?b_w=view'>". $books[0] . "</a><br/>";
echo "<b>���� ������: </b>" . $gt . "</br>";
echo "<b>����������: </b>" . $grac . "</br>";
echo "<b>������ ���� ������ ����������: </b>" . formatfilesize( $dbsize ) . "<br/>";
echo "<b>����� �������������: </b>" ."<a href='stat.php?u_w=view'>". $users[0] . "</a><br/>";


if (!empty($_GET['u_w'])) {
$u_w = $_GET['u_w'];
$u_w = htmlspecialchars($u_w);
$u_w = stripcslashes($u_w);
$u_w = trim($u_w);
$u_w = abs($u_w);

$sql = "SELECT * FROM `users`";
$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);
echo "<br/><b>������������:</b><br/>"; // ������� ������
while ($row = mysql_fetch_assoc($result))
{
  echo $row['login'] . "<br/>";
}

}

if (!empty($_GET['b_w'])) {
$b_w = $_GET['b_w'];
$b_w = htmlspecialchars($b_w);
$b_w = stripcslashes($b_w);
$b_w = trim($b_w);
$b_w = abs($b_w);

$sql1 = "SELECT * FROM `books`";
$result1 = mysql_query($sql1) or die(mysql_error() ."<br/>");
echo "<br/><b>�����:</b><br/>";
while ($row = mysql_fetch_assoc($result1))
{
  echo $row['nazv'] . "<br/>";
}

}

  }

?>