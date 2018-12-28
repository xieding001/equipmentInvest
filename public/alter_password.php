<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>正在修改密码</title> 
</head> 
<body> 
  <?php
  session_start (); 
  $username = $_POST ["username"]; 
  $oldpassword = $_POST ["oldpassword"]; 
  $newpassword = $_POST ["newpassword"]; 
    
  require('conn.php');
  mysql_select_db ("user"); 
  $dbusername = null; 
  $dbpassword = null; 
  $result = mysql_query ( "select * from user where name ='{$username}' ;" ); 
  while ( $row = mysql_fetch_array ($result) ) { 
    $dbusername = $row ["name"]; 
    $dbpassword = $row ["password"]; 
  } 
  if (is_null ( $dbusername )) { 
    ?> 
  <script type="text/javascript"> 
    alert("用户名不存在"); 
    window.location.href="alter.php"; 
  </script>  
  <?php
  } 
  if ($oldpassword != $dbpassword) { 
    ?> 
  <script type="text/javascript"> 
    alert("密码错误"); 
    window.location.href="alter.php"; 
  </script> 
  <?php
  } 
  mysql_query ( "update user set password='{$newpassword}' where name='{$username}'" ) or die ( "存入数据库失败" . mysql_error () );//如果上述用户名密码判定不错，则update进数据库中 
  mysql_close ( $con ); 
  ?> 
  
  
  <script type="text/javascript"> 
    alert("密码修改成功"); 
    window.location.href="login.html"; 
  </script> 
</body> 
</html>