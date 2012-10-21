<html>
<head>
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
header("Content-type: text/html; charset=windows-1251");
error_reporting(0);

    if (isset($_POST['avtor'])) { $avtor = $_POST['avtor']; if ($avtor == '') { unset($avtor);} }  
    if (isset($_POST['nazv'])) { $nazv=$_POST['nazv']; if ($nazv =='') { unset($nazv);} } 
    if (isset($_POST['izd'])) { $izd=$_POST['izd']; if ($izd =='') { unset($izd);} }
    if (isset($_POST['god_izd'])) { $god_izd=$_POST['god_izd']; if ($god_izd =='') { unset($god_izd);} }
    if (isset($_POST['mesto_izd'])) { $mesto_izd=$_POST['mesto_izd']; if ($mesto_izd =='') { unset($mesto_izd);} }
    if (isset($_POST['ob'])) { $ob=$_POST['ob']; if ($ob =='') { unset($ob);} }
    if (isset($_POST['sobst'])) { $sobst=$_POST['sobst']; if ($sobst =='') { unset($sobst);} }
    if (isset($_POST['udk'])) { $udk=$_POST['udk']; if ($udk =='') { unset($udk);} }
    if (isset($_POST['bbk'])) { $bbk=$_POST['bbk']; if ($bbk =='') { unset($bbk);} }
    if (isset($_POST['grif'])) { $grif=$_POST['grif']; if ($grif =='') { unset($grif);} }
    if (isset($_POST['stat'])) { $stat=$_POST['stat']; if ($stat =='') { unset($stat);} }
    if (isset($_POST['link'])) { $link=$_POST['link']; if ($link =='') { unset($link);} }

// текст
if (isset($_POST['keywords'])) { $keywords=$_POST['keywords']; if ($keywords =='') { unset($keywords);} }
if (isset($_POST['referat'])) { $referat=$_POST['referat']; if ($referat =='') { unset($referat);} }
if (isset($_POST['text'])) { $text=$_POST['text']; if ($text =='') { unset($text);} }
// текст


if (empty($avtor) or empty($nazv) or empty($god_izd)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
 
 // если данные введены,то обрабатываем, чтобы теги и скрипты не работали...
    $avtor = stripslashes($avtor);
    $avtor = htmlspecialchars($avtor);
    $nazv = stripslashes($nazv);
    $nazv = htmlspecialchars($nazv);
    $izd = stripslashes($izd);
    $izd = htmlspecialchars($izd);
    $god_izd = stripslashes($god_izd);
    $god_izd = htmlspecialchars($god_izd);
    $mesto_izd = stripslashes($mesto_izd);
    $mesto_izd = htmlspecialchars($mesto_izd);
    $ob = stripslashes($ob);
    $ob = htmlspecialchars($ob);
    $sobst = stripslashes($sobst);
    $sobst = htmlspecialchars($sobst);
    $udk = stripslashes($udk);
    $udk = htmlspecialchars($udk);
    $bbk = stripslashes($bbk);
    $bbk = htmlspecialchars($bbk);
    $grif = stripslashes($grif);
    $grif = htmlspecialchars($grif);
    $stat = stripslashes($stat);
    $stat = htmlspecialchars($stat);


    $keywords = stripslashes($keywords);
    $keywords = htmlspecialchars($keywords);
    $referat = stripslashes($referat);



 // удаляем лишние пробелы
    $avtor = trim($avtor);
    $nazv = trim($nazv);
    $izd = trim($izd);
    $god_izd = trim($god_izd);
    $mesto_izd = trim($mesto_izd);
    $ob = trim($ob);
    $sobst = trim($sobst);
    $udk = trim($udk);
    $bbk = trim($bbk);
    $grif = trim($grif);
    $stat = trim($stat);
    // $link - ссылка на книгу !
    $link = trim($link); 
    // link_end

// текст
    $keywords = trim($keywords);
// текст 
 


 // подключаемся к базе
    include ("connect.php");

 // сохраняем данные
    $result2 = mysql_query ("INSERT INTO books (avtor,nazv,izd,god_izd,mesto_izd,ob,sobst,udk,bbk,grif,stat,keywords,referat,text,link) VALUES('$avtor','$nazv','$izd','$god_izd','$mesto_izd','$ob','$sobst','$udk','$bbk','$grif','$stat','$keywords','$referat','$text','$link')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Книга успешно добавлена! <a href='index.php'>Добавить еще...</a>";
    }
 else {
    echo "Ошибка!";
    }
    ?>
    </body>
</html>