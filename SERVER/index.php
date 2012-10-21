<?php
include ("connect.php");
session_start();
define ("COPY", "eLIB&nbsp;v.&nbsp;0.5&nbsp;&copy;&nbsp;<a href='mailto:diezel@xakep.ru'>diezel</a>&nbsp;2012"); //copy
define ("VERSION", "eLIB v. 0.5");
header("Content-type: text/html; charset=windows-1251");
?>
<html>
<head><?="<title>" . VERSION . "</title>"?>
<link rel="stylesheet" media="screen" type="text/css" href="login.css">
<script type="text/javascript" src="./js/jquery.min.js"></script>
</head>
<body>
<?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
  ?>

 <?php
 echo '
<div id="wrapper">
  <div id="demoBox">
    <form id="login" action="login.php" method="post">
      <h1>Авторизация</h1>
      <fieldset id="inputs">
        <input id="username" type="text" name="login" placeholder="Логин" autofocus required />
        <input id="password" type="password" name="pass" placeholder="Пароль" required />
      </fieldset>
      <fieldset id="actions">
        <input type="submit" id="submit" value="Войти">
        <a href="#">Забыли пароль?</a>
        <a href="./reg/">Регистрация</a>
      </fieldset>
     ';
//copy
echo "<br/><center><b>" . COPY . "</b></center>";
echo '
    </form>
  </div>
  <script type="text/javascript" src="./js/partner.js"></script>
  <div class="partnerGeneralBox"></div>
</div>
';
    }
    else
    {


// *********GROUP_ACCESS_VIEW*********
$username = $_SESSION['login'];
$sql = "SELECT * FROM `users` WHERE login='$username'";
$result = mysql_query($sql) or die(mysql_error() ."<br/>");
$row = mysql_fetch_assoc($result);
$group =  $row['group_id'];
$group = intval($group);
if ($group == 0) { $gt = '<b>Студенты<b>'; $grac = 'Вы можете читать/скачивать книги'; }
if ($group == 1) { $gt = '<b><font color="orange">Модераторы</font></b>'; $grac = '<b><font color="orange">Полный доступ без права загрузки файлов на сервер</font></b>'; }
if ($group == 2) { $gt = '<b><font color="red">Администраторы</font></b>'; $grac = '<b><font color="red">Полный доступ</font></b>'; }

// *********GROUP_ACCESS_VIEW*********
// Admin_acces
if ($group == 2){
    
echo "<h1><b><center>" . VERSION . "</center></b></h1>";
echo "<b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "<br/><br/>";
echo '
<form action="add.php" method="post">
<div class="main">
<div class="field">
   <input name="avtor" type="text" size="50" id="avtor" placeholder="Авторы*" required>

   <input name="nazv" type="text" size="50" id="nazv" placeholder="Название*" required><br /><br />
</div>

<div class="field">
   <input name="izd" type="text" size="50" id="izd" placeholder="Издание">

   <input name="god_izd" type="text" size="50" id="god_izd" placeholder="Год Издания*" required><br /><br />
</div>

<div class="field">
   <input name="mesto_izd" type="text" size="50" id="mesto_izd" placeholder="Место Издания">

   <input name="ob" type="text" size="50" id="ob" placeholder="Объем"><br /><br />
</div>

<div class="field">
   <input name="sobst" type="text" size="50" id="sobst" placeholder="Собственник">

   <input name="udk" type="text" size="50" id="udk" placeholder="УДК"><br /><br />
</div>

<div class="field">
   <input name="bbk" type="text" size="50" id="bbk" placeholder="ББК">

   <input name="grif" type="text" size="50" id="grif" placeholder="ГРИФ"><br /><br />
</div>

<div class="field">
   <input name="stat" type="text" size="50" id="stat" placeholder="Статус">

   <input name="link" type="text" size="50" id="link" placeholder="Ссылка на электронный вариант"><br /><br />
</div>

<div class="field">
  <textarea maxlength="50" name="keywords" wrap="virtual" rows="2" style="width:80%;" id="keywords" placeholder="Ключевые слова..."></textarea><br /><br />
</div>

<div class="field">
  <textarea maxlength="255" name="referat" wrap="virtual" rows="5" style="width:80%;" id="referat" placeholder="Реферат..."></textarea><br/><br />
</div>


<div class="field">
  <textarea name="text" wrap="virtual" rows="10" style="width:80%;" id="text" placeholder="Текст..."></textarea><br/><br />
</div>


<input name="submit" type="submit" value="Добавить" style="width:35%;" />
<input name="submit" type="button" value="Загрузить Книгу на Сервер" onClick="window.location=\'./upload/\'" style="width:35%;" /><br/>
<input type="reset" value="Очистить форму" style="width:35%;" />
<input name="submit" type="button" value="Просмотр Добавленных Книг" onClick="window.location=\'view.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Просмотр Добавленных Рефератов" onClick="window.location=\'referat.php\'" style="width:35%;" />
<input name="submit" type="button" value="Просмотр Добавленных Текстов" onClick="window.location=\'text.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Поиск" onClick="window.location=\'./search/index.php\'" style="width:35%;" />
<input name="submit" type="button" value="Справка" onClick="window.location=\'help.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Статистика" onClick="window.location=\'stat.php\'" style="width:35%;" />
<input name="submit" type="button" value="Управление пользователями" onClick="window.location=\'users.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Все Книги" onClick="window.location=\'get_all.php\'" style="width:35%;" />
<input name="submit" type="button" value="Выход" onClick="window.location=\'logout.php\'" style="width:35%;" /><br/>
</form><br/>
';
//copy
echo '
<center><b>
';
echo COPY;
echo '
</b></center>
';
//copy
} else {}
// Admin_acces_end

// Moder_acces
  if ($group == 1){
echo "<h1><b><center>" . VERSION . "</center></b></h1>";
echo "<b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "<br/><br/>";
echo '
<form action="add.php" method="post">
<div class="main">
<div class="field">
   <input name="avtor" type="text" size="50" id="avtor" placeholder="Авторы" required>

   <input name="nazv" type="text" size="50" id="nazv" placeholder="Название" required><br /><br />
</div>

<div class="field">
   <input name="izd" type="text" size="50" id="izd" placeholder="Издание" required>

   <input name="god_izd" type="text" size="50" id="god_izd" placeholder="Год Издания" required><br /><br />
</div>

<div class="field">
   <input name="mesto_izd" type="text" size="50" id="mesto_izd" placeholder="Место Издания" required>

   <input name="ob" type="text" size="50" id="ob" placeholder="Объем" required><br /><br />
</div>

<div class="field">
   <input name="sobst" type="text" size="50" id="sobst" placeholder="Собственник" required>

   <input name="udk" type="text" size="50" id="udk" placeholder="УДК" required><br /><br />
</div>

<div class="field">
   <input name="bbk" type="text" size="50" id="bbk" placeholder="ББК" required>

   <input name="grif" type="text" size="50" id="grif" placeholder="ГРИФ" required><br /><br />
</div>

<div class="field">
   <input name="stat" type="text" size="50" id="stat" placeholder="Статус" required>

   <input name="link" type="text" size="50" id="link" placeholder="Ссылка на электронный вариант" required><br /><br />
</div>

<div class="field">
  <textarea maxlength="50" name="keywords" wrap="virtual" rows="2" style="width:80%;" id="keywords" placeholder="Ключевые слова..."></textarea><br /><br />
</div>

<div class="field">
  <textarea maxlength="255" name="referat" wrap="virtual" rows="5" style="width:80%;" id="referat" placeholder="Реферат..."></textarea><br/><br />
</div>


<div class="field">
  <textarea name="text" wrap="virtual" rows="10" style="width:80%;" id="text" placeholder="Текст..."></textarea><br/><br />
</div>

<input name="submit" type="submit" value="Добавить" style="width:35%;" />
<input type="reset" value="Очистить форму" style="width:35%;" />
<input name="submit" type="button" value="Просмотр Добавленных Книг" onClick="window.location=\'view.php\'" style="width:35%;" />
<input name="submit" type="button" value="Просмотр Добавленных Рефератов" onClick="window.location=\'referat.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Просмотр Добавленных Текстов" onClick="window.location=\'text.php\'" style="width:35%;" />
<input name="submit" type="button" value="Поиск" onClick="window.location=\'./search/index.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Справка" onClick="window.location=\'help.php\'" style="width:35%;" />
<input name="submit" type="button" value="Статистика" onClick="window.location=\'stat.php\'" style="width:35%;" /><br/>
<input name="submit" type="button" value="Все Книги" onClick="window.location=\'get_all.php\'" style="width:35%;" />
<input name="submit" type="button" value="Выход" onClick="window.location=\'logout.php\'" style="width:35%;" />
</form><br/>
';
//copy
echo '
<center><b>
';
echo COPY;
echo '
</b></center>
';
//copy
      } else {}
// Moder_acces_end


// User_acces
  if ($group == 0){
echo "<h1><b><center>" . VERSION . "</center></b></h1>";
echo "<b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "<br/><br/>";
echo '
<form>
<input name="submit" type="button" value="Выход" onClick="window.location=\'logout.php\'" style="width:35%;" /><br/>
</form><br/>
';
//copy
echo '
<center><b>
';
echo COPY;
echo '
</b></center>
';
//copy

   }  else {}
// User_acces_end


// code_end
echo "</div>";
  }
?>
</body>
</html>