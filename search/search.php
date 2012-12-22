<?php
session_start();
header("Content-type: text/html; charset=windows-1251");
// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
        echo "Вы не авторизованы, <a href='../index.php'>Авторизоваться</a>";
}
    else
    {

        $search = $_POST['search'];
        $search = addslashes($search);
        $search = htmlspecialchars($search);
        $search = stripslashes($search);
        $search = @iconv("UTF-8", "windows-1251", $search);     
        $search = mysql_real_escape_string($search);
        if($search == ''){
                exit("Начните вводить запрос");
        }
        
     if($search == ' ' or $search == "'"){
                    exit("Запрос Пустой !");
            }
            require_once("../config.php");
            $query = mysql_query("SELECT * FROM books where CONCAT(avtor,nazv,text,referat) like '%$search%'",$db);
            if(mysql_num_rows($query) > 0){
                    $sql = mysql_fetch_array($query);
                    do{
                            echo "<a href='../get_ref.php?ref_id=" . $sql['id'] . "'><div>" . $sql['avtor'] . " - " . $sql['nazv'] . " (" . $sql['god_izd'] . ")</a></div>";
                    }while($sql = mysql_fetch_array($query));
            }else{
                    echo "Нет результатов";
           }
          }
?>              
