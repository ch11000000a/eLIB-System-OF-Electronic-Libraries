<?php
include ("../connect.php");
session_start();
define ("COPY", "eLIB&nbsp;v.&nbsp;0.5&nbsp;&copy;&nbsp;<a href='mailto:diezel@xakep.ru'>������&nbsp;�.</a>&nbsp;2012"); //copy
?>
<html>
<head>
<link rel="stylesheet" href="../reg.css" type="text/css">
</head>
<body>
<?php
    // ���������, ����� �� ���������� ������ � id ������������
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // ���� �����, �� �� �� ������� ������
  ?>

 <?php
 echo '
<div id="wrapper">
  <div id="demoBox">
    <form id="login" action="reg.php" method="post">
      <h1>�����������</h1>
      <fieldset id="inputs">
        <input id="username" type="text" name="login" placeholder="�����" autofocus required>
        <input id="password" type="password" name="pass" placeholder="������" required>
        <input id="password" type="password" name="re_pass" placeholder="��������� ������" required>
      </fieldset>
      <fieldset id="actions">
        <input type="submit" id="submit" value="������������������">
        <a href="#" onClick="window.location=\'../index.php\'">�����</a>
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