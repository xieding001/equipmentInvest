<?php
// 处理增加操作的页面 
require "dbconfig.php";
// 连接mysql
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
// 选择数据库
mysql_select_db(DBNAME,$link);
// 编码设置
mysql_set_charset('utf8',$link);
var_dump($_POST);
var_dump($_FILES);
$uploaddir = "img\upload\img";//设置文件保存目录 注意包含/ 
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型 
$patch="C:\360Downloads\wamp\www\PHPExcelImportSQl2\public";//程序所在路径 

//获取文件后缀名函数 

function fileext($filename) 
{ 
return substr(strrchr($filename, '.'), 1); 
} 
//生成随机文件名函数 
function random($length) 
{ 
$hash = 'CR-'; 
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
$max = strlen($chars) - 1; 
mt_srand((double)microtime() * 1000000); 
for($i = 0; $i < $length; $i++) 
{ 
$hash .= $chars[mt_rand(0, $max)]; 
} 
return $hash; 
} 
//var_dump($_FILES);
$a=strtolower(fileext($_FILES['file']['name'])); 
//判断文件类型 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) 
{ 
$text=implode(",",$type); 
echo "您只能上传以下类型文件: ",$text,"<br>"; 
} 
//生成目标文件的文件名 
else{ 
$filename=explode(".",$_FILES['file']['name']); 
do 
{ 
$filename[0]=random(10); //设置随机数长度 
$name=implode(".",$filename); 
//$name1=$name.".Mcncc"; 
$uploadfile=$uploaddir.$name; 
} 

while(file_exists($uploadfile)); 

if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)) 
{ 
if(is_uploaded_file($_FILES['file']['tmp_name'])) 
{ 

echo "上传失败!"; 
} 
else 
{//输出图片预览 
echo "<center>您的文件已经上传完毕 上传图片预览: </center><br><center><img src='$uploadfile'></center>"; 
} 
} 
};
// require_once('uploadclass.php'); 
// 获取增加的新闻
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
$pic=$uploadfile; 
// 插入数据
mysql_query("INSERT INTO invoice(id,enterprise,ent_code,equipment,notax,withtax,invoice_num,inv_num,invdate,supplier,authentic,remark,update_date,update_name,create_date,create_name,pic) VALUES ('$id','$enterprise','$entcode','$equipment','$notax','$withtax','$invoice_num','$invnum','$invdate','$supplier','$authentic','$remark','$update_date','$update_name','$create_date','$create_name','$pic')",$link) or die('添加数据出错：'.mysql_error()); 
header("Location:table_data_tables");  