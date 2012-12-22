<?php
session_start();
?>
<html>
<head>
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

    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php
    include('config.php');
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
      echo "Вы не авторизованы, <a href='index.php'>Авторизоваться</a>";
}
    else
    {

echo "<a href='index.php'>Вернуться на Главную Страницу</a><br/><br/>";

$sql = "SELECT * FROM `users`";


$result = mysql_query($sql) or die(mysql_error());
$table = "<table border=1 width=100% align=center>\n";

while ($row = mysql_fetch_assoc($result))
{
  if ($row['group_id'] == 0) {  $row['group_id'] = 'Пользователь'; }
  if ($row['group_id'] == 1) {  $row['group_id'] = 'Модератор'; }
  if ($row['group_id'] == 2) {  $row['group_id'] = 'Администратор'; }

    $table .= "<tr>\n";
    $table .= "<td>".$row['id']."</td>\n";
    $table .= "<td>".$row['login']."</td>\n";
    $table .= "<td>".$row['group_id']."</td>\n";
    $table .= "<td><a href='get_user.php?user_id=" . $row['id'] . "'>Дополнительно</a></td>\n";
    $table .= "</tr>\n";
}

$table .= "</table>\n";


echo $table;

  
  }
?>
</body>
</html>