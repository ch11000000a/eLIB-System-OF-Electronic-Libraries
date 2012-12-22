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
    
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

require_once("config.php");

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";
echo ' Идея: <b>Талыпов К. К.</b><br/>
Разработка: <b>Гонцов Д.О.</b>
';
echo '
<center><h2>История Версий</h2></center><br/>
<h3>v. 0.1 - v. 0.3</h3>1. Поставлена задача - Создание Web интерфейса для управления хранением, учетом и распределением литературы ИИП.<br/>
<hr>
<h3>v. 0.4 (13.05.2012)</h3>1. Увеличение длины полей "Авторы", "Название" до 255 символов varchar(255) и поля "Реферат" до (longtext)<br/>
2. Появилась возможность добавлять ссылку на электронный вариант. Добавлено поле "Ссылка на электронный вариант".<br/>
3. Переработана структура БД.<br/>
4. Частично переработан внешний вид.<br/>
4. Добавлена регистрация.<br/>
5. Добавлена статистика.<br/>
6. Внедряется поиск.
<hr>
<h3>v. 0.5 (22.05.2012)</h3>1. Добавлено разделение пользователей по группам.<br/>
2. Добавлен поиск<br/>
3. Доработан Внешний вид.<br/>
4. Изменена структура БД.
<hr>
';
  }
?>
</body>
</html>