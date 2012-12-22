<?php
include ("config.php");
session_start();
header("Content-type: text/html; charset=windows-1251");
?>
<html>
<head><?="<title>" . VERSION . "</title>"?>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="./js/jquery.min.js"></script>
<style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

      .field {clear:both; text-align:center; line-height:25px;}
        label {float:left; padding-right:200px;}
      .field_avtoriz {clear:both; text-align:right; line-height:25px;}
        label {float:left; padding-right:10px;}
      .main {float:center; text-align:center;}
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<?php
    
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    
  ?>

    <div class="container">
      <form action="login.php" method="post" class="form-signin">
        <center><h2 class="form-signin-heading">Авторизация</h2></center>
        <input type="text" name="login" class="input-block-level" placeholder="Логин" autofocus required />
        <input type="password"  name="pass" class="input-block-level" placeholder="Пароль" required>
        <center>
          <button class="btn btn-large btn-primary" type="submit">Войти</button>
          <button class="btn btn-large btn-primary" type="button" onClick="window.location='./reg/'">Регистрация</button>
        </center>
      </form>
    </div>

<!-- Copy -->
<br/><center><b><?php echo COPY; ?></b></center>
<!-- Copy -->

<?php
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
    
echo "<center><b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "<br/></center><br/>";
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
echo "<center><b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "</center><br/><br/>";
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
echo "<center><b>Ваша группа: </b>" . $gt . ". <b>Ваши привилегии: </b>" . $grac . "</center><br/><br/>";
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