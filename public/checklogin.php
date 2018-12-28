<?php 
session_start () ;                   //初始session
if (isset ($_SESSION['shili']))
{
header ("Location:shili.php") ;    //重新定向到其他页面
exit ;
}                       //登录过的话立即结束
$shili_name=$_POST['username'] ;    //获取参数
$password=$_POST['password'] ;
//验证管理员名称和密码是否正确,这里采用直接验证,没有连接数据库
if ($shili_name=="mr" and $password=="mrsoft")
{
session_register ("shili") ;        //注册新的变量,保存当前会话的昵称
$shili = $shili_name ;
echo "<font color=red>登录成功!</font>" ;
header ("Location:shili.php") ;    //登录成功重定向到管理页面
}
else
{
echo "<table width='100%' align=center><tr><td align=center>" ;
echo "账号或密码错误,或者不是管理员账号<br>" ;
echo "<font color=red>登录失败!</font><br><a href='login.php'>请重新输入</a>";
echo "</td></tr></table>" ;
}
?>