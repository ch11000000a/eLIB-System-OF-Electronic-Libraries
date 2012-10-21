<?php
include ("../connect.php");
session_start();
define ("COPY", "eLIB&nbsp;v.&nbsp;0.5&nbsp;&copy;&nbsp;<a href='mailto:diezel@xakep.ru'>Гонцов&nbsp;Д.</a>&nbsp;2012"); //copy
?>
<html>
<head>
<link rel="stylesheet" href="../reg.css" type="text/css">
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
    <form id="login" action="reg.php" method="post">
      <h1>Регистрация</h1>
      <fieldset id="inputs">
        <input id="username" type="text" name="login" placeholder="Логин" autofocus required>
        <input id="password" type="password" name="pass" placeholder="Пароль" required>
        <input id="password" type="password" name="re_pass" placeholder="Повторите пароль" required>
      </fieldset>
      <fieldset id="actions">
        <input type="submit" id="submit" value="Зарегистрироваться">
        <a href="#" onClick="window.location=\'../index.php\'">Назад</a>
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
header("Location: ../index.php");
  
  }
?>
</body>
</html>