<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改发票</title>
</head>

<style type="text/css">
    form{
        margin: 20px;
    }
</style>
<style>
    .div-a{ float:left;width:49%;border:1px }
    .div-b{ float:right;width:49%;border:1px }
</style>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

</head>
<body class="gray-bg">
<?php
    require "conn.php";

    
    $inv_num = $_GET['inv_num'];
    // $id =2;
    $sql = mysql_query("SELECT * FROM invoice WHERE inv_num=$inv_num",$link);
    $sql_arr = mysql_fetch_assoc($sql); 

?>
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

                        
                        <li><a href="table_data_tables">首页</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">H+
                </div>
            </li>

        </ul>
    </div>
</nav>

<div   class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>修改 </h5>

                </div>
                <div class="ibox-content">
                    <form  action="action-editinv.php"  method="post" class="form-horizontal">
                        <div class="div-a">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" >ID: </label>

                            <div class="col-sm-10">
                                <input type="text" name="id" value="<?php echo $sql_arr['id']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">企业名称：</label>

                            <div class="col-sm-10">
                                <input type="text" name="enterprise" value="<?php echo $sql_arr['enterprise']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">纳税人识别号：</label>

                            <div class="col-sm-10">
                                <input type="text" name="ent_code" value="<?php echo $sql_arr['ent_code']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">设备名称：</label>

                            <div class="col-sm-10">
                                <input type="text"  name="equipment" value="<?php echo $sql_arr['equipment']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">不含税价：</label>

                            <div class="col-sm-10">
                                <input type="text" name="notax" value="<?php echo $sql_arr['notax']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">含税价：</label>

                            <div class="col-sm-10">
                                <input type="text" name="withtax" value="<?php echo $sql_arr['withtax']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">发票代码：</label>

                            <div class="col-sm-10">
                                <input type="text" name="invoice_num" value="<?php echo $sql_arr['invoice_num']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">发票号码：</label>

                            <div class="col-sm-10">
                                <input type="text" name="inv_num" value="<?php echo $sql_arr['inv_num']?>">
                            </div>
                        </div>
                        </div>
                        <div class="div-b">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开票日期：</label>

                            <div class="col-sm-10">
                                <input type="text" name="invdate" value="<?php echo $sql_arr['invdate']?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">供货单位：</label>

                            <div class="col-sm-10">
                                <input type="text" name="supplier" value="<?php echo $sql_arr['supplier']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否已抵扣认证：</label>

                            <div class="col-sm-10">
                                <input type="text" name="authentic" value="<?php echo $sql_arr['authentic']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">备注：</label>

                            <div class="col-sm-10">
                                <input type="text" name="remark" value="<?php echo $sql_arr['remark']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">修改日期：</label>

                            <div class="col-sm-10">
                                <input type="text" name="update_date" value="<?php date_default_timezone_set('PRC'); echo date('Y-m-d');?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">修改人：</label>

                            <div class="col-sm-10">
                                <input type="text" name="update_name" value="<?php echo $sql_arr['update_name']?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">创建日期：</label>
                            <div class="col-sm-10">
                                <input type="text" name="create_date" value="<?php date_default_timezone_set('PRC'); echo date('Y-m-d');?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">创建人：</label>

                            <div class="col-sm-10">
                                <input type="text" name="create_name" value="<?php echo $sql_arr['create_name']?>">
                            </div>
                        </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit" >提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="js/content.js?v=1.0.0"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>

</body>



</html>