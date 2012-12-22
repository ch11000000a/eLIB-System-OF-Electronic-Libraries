<?php
session_start();
?>
<html>
<head>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery.min.js"></script>


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
    <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php
    include ("../config.php");
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    
  ?>
    <div class="container">
      <form action="reg.php" method="post" class="form-signin">
        <center><h2 class="form-signin-heading">Регистрация</h2></center>
        
        <input type="text" name="login" class="input-block-level" placeholder="Логин" autofocus required />
        <input type="password"  name="pass" class="input-block-level" placeholder="Пароль" required>
        <input type="password"  name="re_pass" class="input-block-level" placeholder="Повторите пароль" required>
        <center>
          <button class="btn btn-small btn-primary" type="submit">Зарегистрироваться</button>
          <button class="btn btn-small btn-primary" type="button" onClick="window.location='../'">Войти</button>
        </center>
      </form>
    </div>

<!-- Copy -->
<br/><center><b><?php echo COPY ?></b></center>
<!-- Copy -->

<?php
}
    else
    {
header("Location: ../index.php");
  
  }
?>
</body>
</html>