<?php
// 处理删除操作的页面 
require "conn.php";
// 连接mysql
//获取地址的id参数，并构建要删除的SQL语句
$inv = $_GET["inv_num"];
$sql = "DELETE FROM invoice WHERE inv_num=$inv";
//执行查询的SQL语句
if(mysql_query($sql))
{//echo 'success';
//跳转到首页index.php
                $keywords = '';
                if($_GET['keywords']!='undefined'){
                    $keywords = $_GET['keywords'];
                }else{
                    $keywords ='';
                }
                $auth = '';
                if($_GET['authentic']!='undefined'){
                    $auth=$_GET['authentic'];
                }else{
                    $auth = '';
                }
                $ud = '';
                if($_GET['date']!='undefined'){
                    $ud=$_GET['date'];
                }else{
                    $ud = '';
                }
header("location:table_data_tables.php?page=1&keywords=$keywords&authentic=$auth&date=$ud");
}
?>