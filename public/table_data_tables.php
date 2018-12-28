<?php
session_start();
if (isset($_SESSION['shili']) && !empty($_SESSION['shili'])) {
    echo "登录成功：".$_SESSION['shili'];
}else{
    header("refresh:0;url=login.php");}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>发票管理系统</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<nav class="navbar-default navbar-static-side" role="navigation"    >
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header" style="padding-top: 1px;
    padding-bottom: 1px;">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="img/user.png" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">admin</strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                              
                                <li><a class="J_menuItem" href="alter.php">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="login.html">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    
                </ul>
            </div>
        </nav>
        
    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>发票表格</h5>
            
                <?php

      $keywords = '';
      if($_GET){
             $keywords=$_GET['keywords'];
       }else{
            $keywords = '';
         }
          $auth = '';
       if($_GET){
             $auth=$_GET['authentic'];
       }else{
         $auth = '';
            }
         $ud = '';
       if($_GET){
           $ud=$_GET['date'];
       }else{
          $ud = '';
             }
                ?>
                    </div>
                    <div class="ibox-content">
                        <div class="" style='overflow:hidden'>
                            <form name="form2" method="post" enctype="multipart/form-data" action="..\upload_excel.php" style='float:left;'>
                                <input type="hidden" name="leadExcel" value="true"class="btn btn-primary ">
                                <input style="display:inline-block" type="file" name="inputExcel"class="btn btn-primary ">
                                <input style="margin-top: 1px;display: inline-block;height: 39px;" type="submit" name="import" value="导入数据"class="btn btn-primary "> 
                            </form>
                            <a style="margin-left:4px;margin-top: 1px;padding-top:8px;display: inline-block;height: 39px;float:left;" href="dc.php" class="btn btn-primary ">导出</a>
                            <a style="margin-top: 1px;padding-top:8px;display: inline-block;height: 39px;float:right;" href="addinv.php" class="btn btn-primary ">添加数据</a>
                        </div>
                        <form method="get">
                            <input style="height: 39px;margin-top: 0px;margin-left: 3px;display: inline-block;width: fit-content;" class="form-control" type="text" name="keywords" value="<?php echo $keywords  ?>" placeholder="请输入企业名称或发票号码" >
                            是否抵扣认证：<select style="width: fit-content;display: inline-block;height: 41px;" type="text" class="form-control m-b" name="authentic"value="<?php echo $auth  ?>" >
                                            <option></option>
                                            <option>是</option>
                                            <option>否</option>
                                             
                                             
                            </select> 
                            <input style="height: 39px;margin-top: 0px;margin-left: 3px;display:inline-block;width: fit-content;" class="form-control" type="date" name="date" placeholder="请输入更新日期或创建日期" value="<?php echo $ud  ?>" >
                            <input style="margin-top:-1px;display: inline-block;height: 39px;" type="submit" value="提交查询"class="btn btn-primary "/>
                        </form>

                        
                        
                        <table class="table table-striped table-bordered table-hover " id="editable">
                        <tr>
                <th>序号</th>
                <th>企业名称</th>
                <th>纳税人识别号</th>
                <th>设备名称</th>
                <th>不含税价</th>
                <th>含税价</th>
                <th>发票代码</th>
                <th>发票号码</th>
                <th>开票日期</th>
                <th>供货单位</th>
                <th>是否抵扣认证</th>
                <!--<th>备注</th>
                <th>更新日期</th>
                <th>更新人</th>
                <th>创建日期</th>
                <th>创建人</th>-->
                <th>操作</th>
            </tr>

            <?php
            $num_rec_per_page=10; 
                // 1.导入配置文件
                require "dbconfig.php";
                // 2. 连接mysql
                $link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
                // 选择数据库
                mysql_select_db(DBNAME,$link);
                // 编码设置
                mysql_set_charset('utf8',$link);
                $keywords = '';
                if($_GET){
                    $keywords=$_GET['keywords'];
                }else{
                    $keywords = '';
                }
                $auth = '';
                if($_GET){
                    $auth=$_GET['authentic'];
                }else{
                    $auth = '';
                }
                $ud = '';
                if($_GET){
                    $ud=$_GET['date'];
                }else{
                    $ud = '';
                }
                // $keywords = $keywords?$keywords:'ooo';
                //echo $keywords;
                //echo $ud;
                // 3. 从DBNAME中查询到news数据库，返回数据库结果集,并按照addtime降序排列 
                if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
                $start_from = ($page-1) * $num_rec_per_page;  
                $sql = "select * from invoice WHERE CONCAT(IFNULL(`enterprise`,''),IFNULL(`inv_num`,''))like'%$keywords%' and(authentic like '%$auth%') LIMIT $start_from, $num_rec_per_page";
                if($ud){ $sql = "select * from invoice WHERE (CONCAT(IFNULL(`enterprise`,''),IFNULL(`inv_num`,''))like'%$keywords%' and(authentic like '%$auth%')) and (update_date='$ud'or create_date='$ud') LIMIT $start_from, $num_rec_per_page";
                }
               
                // 结果集
                $result = mysql_query($sql,$link);
                // var_dump($result);die;

                // 解析结果集,$row为新闻所有数据，$newsNum为新闻数目
                $newsNum=mysql_num_rows($result);  

                for($i=0; $i<$newsNum; $i++){
                    $row = mysql_fetch_assoc($result);
                    $j=$i+1;
                    echo "<tr>";
                    echo "<td>$j</td>";
                    echo "<td>{$row['enterprise']}</td>";
                    echo "<td>{$row['ent_code']}</td>";
                    echo "<td>{$row['equipment']}</td>";
                    echo "<td>{$row['notax']}</td>";
                    echo "<td>{$row['withtax']}</td>";
                    echo "<td>{$row['invoice_num']}</td>";
                    echo "<td>{$row['inv_num']}</td>";
                    echo "<td>{$row['invdate']}</td>";
                    echo "<td>{$row['supplier']}</td>";
                    echo "<td>{$row['authentic']}</td>";
                    //echo "<td>{$row['remark']}</td>";
                    //echo "<td>{$row['update_date']}</td>";
                    //echo "<td>{$row['update_name']}</td>";
                    //echo "<td>{$row['create_date']}</td>";
                    //echo "<td>{$row['create_name']}</td>";
                    echo "<td>
                            

                            <a id=\"vb\" data-id=\"$ud\" data-au=\"$auth\" href='javascript:del({$row['inv_num']}, $keywords)'>删除</a>

                            <a href='editinv.php?inv_num=({$row['inv_num']})'>修改</a>
                            <a href='info.php?inv_num=({$row['inv_num']})'>详情</a>
                          </td>";
                    echo "</tr>";
                }
                // 5. 释放结果集
                mysql_free_result($result);
                mysql_close($link);
            ?>
                        </table>

                </div>
                    <script type="text/javascript">
                     function del (inv_num,$keywords) {
                        var update = $("#vb").attr("data-id");
                        var auth = $("#vb").attr("data-au");
                     if (confirm("确定删除这条记录吗？")){

                       // var update = $("#vb").attr("data-id");
                        //var auth = $("#vb").attr("data-au");
                        
                window.location = "action-del.php?inv_num="+inv_num+"&keywords="+$keywords+"&date="+update+"&authentic="+auth;

                
            }
        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <?php 
 require "conn.php";
                $keywords = '';
                if($_GET){
                    $keywords=$_GET['keywords'];
                }else{
                    $keywords = '';
                }
                $auth = '';
                if($_GET){
                    $auth=$_GET['authentic'];
                }else{
                    $auth = '';
                }
                $ud = '';
                if($_GET){
                    $ud=$_GET['date'];
                }else{
                    $ud = '';
                }
 $sql = "select * from invoice where inv_num LIKE '%$keywords%'";
                
 $rs_result = mysql_query($sql); //查询数据
 $total_records = mysql_num_rows($rs_result);  // 统计总共的记录条数
 $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

echo "<a href='table_data_tables.php?page=1&keywords=$keywords&authentic=$auth&date=$ud'>".'|<'."</a> "; // 第一页

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='table_data_tables.php?page=".$i."&keywords=$keywords&authentic=$auth&date=$ud'>".$i."</a> "; 
}; 
echo "<a href='table_data_tables.php?page=$total_pages&keywords=$keywords&authentic=$auth&date=$ud'>".'>|'."</a> "; // 最后一页
?>

    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>



    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

 


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function (sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function (value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            });


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData([
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row"]);

        }
    </script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    <!--统计代码，可删除-->

</body>

</html>
