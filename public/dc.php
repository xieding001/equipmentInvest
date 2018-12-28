<?php
/**
 * Created by PhpStorm.
 * User: GUO
 * Date: 2018/5/19
 * Time: 16:06
 */
 $filename="info.xls";//先定义一个excel文件
 header("Content-Type: application/vnd.ms-execl");
 header("Content-Type: application/vnd.ms-excel; charset=utf-8");
 header("Content-Disposition: attachment; filename=$filename");
 header("Pragma: no-cache"); header("Expires: 0");
 //我们先在excel输出表头，当然这不是必须的
 echo iconv("utf-8", "gb2312", "序号")."\t";
 echo iconv("utf-8", "gb2312", "企业名称")."\t";
 echo iconv("utf-8", "gb2312", "纳税人识别号")."\t";
 echo iconv("utf-8", "gb2312", "设备名称")."\t";
 echo iconv("utf-8", "gb2312", "不含税价")."\t";
 echo iconv("utf-8", "gb2312", "含税价")."\t";
 echo iconv("utf-8", "gb2312", "发票代码")."\t";
 echo iconv("utf-8", "gb2312", "发票号码")."\t";
 echo iconv("utf-8", "gb2312", "开票日期")."\t";
 echo iconv("utf-8", "gb2312", "供货单位")."\t";
 echo iconv("utf-8", "gb2312", "是否抵扣认证")."\t";
 echo iconv("utf-8", "gb2312", "备注")."\t";
 echo iconv("utf-8", "gb2312", "更新日期")."\t";
 echo iconv("utf-8", "gb2312", "更新人")."\t";
 echo iconv("utf-8", "gb2312", "创建日期")."\t";
 echo iconv("utf-8", "gb2312", "创建人")."\n";
 //这里我们定义一个数据库为datebse 数据库用户名：root 密码为：123456
 $conn = mysqli_connect("localhost","root","") or die("无法连接数据库");
mysqli_select_db($conn,"test");
mysqli_set_charset($conn,'utf8');//需要加这句，不知道为什么，不然导出的中文乱码，大家在使用的时候，如果utf8乱码，就改为GBK，反正也可以
 $sql="SELECT id,enterprise,ent_code,equipment,notax,withtax,invoice_num,inv_num,invdate,supplier,authentic,remark,update_date,update_name,create_date,create_name FROM invoice";$result=mysqli_query($conn,$sql); //查询的表条件
 while($row =mysqli_fetch_array($result)){
     echo iconv("utf-8", "gb2312", $row['id'])."\t";
     echo iconv("utf-8", "gb2312", $row['enterprise'])."\t";
     echo iconv("utf-8", "gb2312", $row['ent_code'])."\t";
     echo iconv("utf-8", "gb2312", $row['equipment'])."\t";
     echo iconv("utf-8", "gb2312", $row['notax'])."\t";
     echo iconv("utf-8", "gb2312", $row['withtax'])."\t";
     echo iconv("utf-8", "gb2312", $row['invoice_num'])."\t";
     echo iconv("utf-8", "gb2312", $row['inv_num'])."\t";
     echo iconv("utf-8", "gb2312", $row['invdate'])."\t";
     echo iconv("utf-8", "gb2312", $row['supplier'])."\t";
     echo iconv("utf-8", "gb2312", $row['authentic'])."\t";
     echo iconv("utf-8", "gb2312", $row['remark'])."\t";
     echo iconv("utf-8", "gb2312", $row['update_date'])."\t";
     echo iconv("utf-8", "gb2312", $row['update_name'])."\t";
     echo iconv("utf-8", "gb2312", $row['create_date'])."\t";
     echo iconv("utf-8", "gb2312", $row['create_name'])."\n";
 }
   ?>