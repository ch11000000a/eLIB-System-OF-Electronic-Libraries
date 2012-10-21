<?php
include ("../connect.php");
session_start();
?>

<!DOCTYPE html>
<?php header("Content-type: text/html; charset=windows-1251"); ?>
<html>
<head>
<title>Поиск</title>
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
<script type="text/javascript" src="js/jquery-1.5.1.min.js" charset="windows-1251"></script>
<script type="text/javascript" charset="windows-1251">

$(function() {
	$("#search").keyup(function(){
		var search = $("#search").val();
					
		$.ajax({
			type: "POST",
			url: "search.php",
			data: {"search": search},
			cache: false,						
			success: function(response){
				$("#resSearch").html(response);
			}
		});
		return false;
				
	});
});
</script>
</head>
<body>


<?php
// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
        echo "Вы не авторизованы, <a href='../index.php'>Авторизоваться</a>";
}
    else
    {

echo '
<b><a href="../index.php">На Главную</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout.php">Выход</a></b><br/><br/>
<center><form action="search.php" method="post" name="form" onsubmit="return false;">
	<p>
		Введите слова для поиска:<br> 
		<input name="search" type="text" id="search">
	</p>
</form>
<div id="resSearch"><b>eLIB v. 0.5 © <a href="mailto:diezel@xakep.ru">Гонцов Д.</a> 2012</b></div></center>
'; 
}
?>
</body>
</html>