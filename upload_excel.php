<?php
include("public/conn.php");
include("function.php"); 

if($_POST['import']=="导入数据"){

	$leadExcel=$_POST['leadExcel'];
	
	if($leadExcel == "true")
	{
		//echo "OK";die();
		//��ȡ�ϴ����ļ���
		$filename = 'test';
		//�ϴ����������ϵ���ʱ�ļ���
		$tmp_name = $_FILES['inputExcel']['tmp_name'];
		
		$msg = uploadFile($filename,$tmp_name);
		echo $msg;
	}
}
header("Location:public/table_data_tables");  
?>