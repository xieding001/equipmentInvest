<?php
// 处理编辑操作的页面 
require "dbconfig.php";
// 连接mysql
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
// 选择数据库
mysql_select_db(DBNAME,$link);
// 编码设置
mysql_set_charset('utf8',$link);

// 获取修改的新闻
$id = $_POST['id'];
$enterprise = $_POST['enterprise'];
$entcode = $_POST['ent_code'];
$equipment = $_POST['equipment'];
$notax = $_POST['notax'];
$withtax = $_POST['withtax'];
$invoice_num = $_POST['invoice_num'];
$invnum = $_POST['inv_num'];
$invdate = $_POST['invdate'];
$supplier = $_POST['supplier'];
$authentic = $_POST['authentic'];
$remark = $_POST['remark'];
$update_date = $_POST['update_date'];
$update_name = $_POST['update_name'];
$create_date = $_POST['create_date'];
$create_name = $_POST['create_name'];

// 更新数据
mysql_query("UPDATE invoice SET id='$id',enterprise='$enterprise',ent_code='$entcode',equipment='$equipment',notax='$notax',withtax='$withtax',invoice_num='$invoice_num',inv_num='$invnum',invdate='$invdate',supplier='$supplier',authentic='$authentic',remark='$remark',update_date='$update_date',update_name='$update_name',create_date='$create_date',create_name='$create_name' WHERE id=$id",$link) or die('修改数据出错：'.mysql_error()); 
header("Location:table_data_tables.php");  
?>