<?php
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'登录');
?>
<html>
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=empty($title) ? '企业信息管理系统' : $title?></title>

    <!-- Bootstrap -->
    <link href="<?=$this->config->item('base_url')?>bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=$this->config->item('base_url')?>bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="<?=$this->config->item('base_url')?>css/common.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid container-login bg-dark">
	<div class="row-padding-0">&nbsp;</div>
	<div class="bg-primary row padding-sm">
		<div class="container center-block">
		    <div class="col-xs-6 col-md-7 col-lg-7 vcenter">
		        <h1>企业信息管理系统</h1>
		    </div><!--
		 --><div class="col-xs-6 col-md-5 col-lg-5 vcenter">
		        <div class="panel-default">
		        	<div class="panel-heading">用户登陆</div>
					<div class="panel-body" style="background: #fff; color: #000">
		        		<?=form_open('/sys/login',array('name'=>'loginForm','id'=>'loginForm','class'=>'loginForm form-horizontal','role'=>'form'))?>
				        <?=form_hidden(array('table_name'=>'sys_user'))?>
				        <div class="form-group">
				            <label for="inputUsername" class="col-sm-3 control-label">用户名</label>
				            <div class="col-sm-9">
				            	<div class="input-group">
						            <span class="input-group-addon glyphicon glyphicon-user"></span>
						            <?=form_input(array('name'=>'username','id'=>'inputUsername','class'=>'form-control',
						                                'placeholder'=>'请输入'))?>
	                        	</div>
				            </div>
			        	</div>
			        	<div class="form-group">
				            <label for="inputPassword" class="col-sm-3 control-label">密码</label>
				            <div class="col-sm-9">
				            	<div class="input-group">
				            		<span class="input-group-addon glyphicon glyphicon-lock"></span>
						            <?=form_password(array('name'=>'password','id'=>'inputPassword','class'=>'form-control',
						                                'placeholder'=>'请输入'))?>
	                            </div>
				            </div>
				        </div>
				        <p class="text-right"><?=form_button($btn_submit)?></p>
				        <?=form_close()?>
		        	</div>
		        </div>
		    </div>
		</div>
	</div>
	<div class="row-padding-1">&nbsp;</div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=$this->config->item('base_url')?>js/jquery.min.js"></script>
    <script src="<?=$this->config->item('base_url')?>js/jquery.form.min.js"></script>
    <script src="<?=$this->config->item('base_url')?>js/common.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$this->config->item('base_url')?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>