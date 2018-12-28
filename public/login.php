<?PHP

  session_start () ;                   //初始session
  
  include('conn.php');//链接数据库
  $name = $_POST['name'];//post获得用户名表单值
  $passowrd = $_POST['password'];//post获得用户密码单值
 
  if ($name && $passowrd){//如果用户名和密码都不为空
       $sql = "select * from user where name = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
       $result = mysql_query($sql);//执行sql
       $rows=mysql_num_rows($result);//返回一个数值
       if($rows){//0 false 1 true
        $_SESSION['shili']=$name;        //注册新的变量,保存当前会话的昵称
        $shili = $name ;
          header("refresh:0;url=table_data_tables");//如果成功跳转至welcome.html页面
          $msg = 'success';
          echo $msg;
          exit;
       }else{
        echo "用户名或密码错误";
       //如果错误使用js 1秒后跳转到登录页面重试;
       }
        
 
  }else{//如果用户名或密码有空
        echo "表单填写不完整";
       
 
            //如果错误使用js 1秒后跳转到登录页面重试;
  }
 
  mysql_close();//关闭数据库
?>
