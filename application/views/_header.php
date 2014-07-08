<?php
$active = array('','','','');
$header_color = array('#226aaa','#226aaa','#32be6a','#226aaa','#32be6a');
$active[$current] = ' class="active"';
$search_options = array('1' => array('name' => '企业名称', 'type' => '企业类型', 'industry' => '企业分类', 'kind' => '企业性质'),
                        '3' => array('name' => '个人姓名'));
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
<header>
<nav class="navbar navbar-default margin-no" role="navigation">
 <div class="container">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index">企业信息管理系统</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li<?=$active[0]?>><a href="index" class="glyphicon glyphicon-home"> 首页</a></li>
        <li<?=$active[1]?>><a href="view_e" class="glyphicon glyphicon-briefcase"> 企业<?=($this->input->get('id') && $current==1)?' - 详细资料':''?></a></li>
        <li<?=$active[2]?>><a href="input_e" class="glyphicon glyphicon-pencil"> <?=($this->input->get('eid') && $current==2)?'修改':''?></a></li>
        <li<?=$active[3]?>><a href="view_p" class="glyphicon glyphicon-flag"> 个人<?=($this->input->get('id') && $current==3)?' - 详细资料':''?></a></li>
        <li<?=$active[4]?>><a href="input_p" class="glyphicon glyphicon-pencil"> <?=($this->input->get('eid') && $current==4)?'修改':''?></a></li>
      </ul>
      <?if($current==1 || $current==3):?>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle glyphicon glyphicon-search" data-toggle="dropdown"> 
            <span id="column_show"><?=$search_options[$current]['name']?></span> 
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <?foreach ($search_options[$current] as $c_name => $c_dscrptn):?>
            <li><a href="javascript:void(0);" class="column_sel" id="<?=$c_name?>"><?=$c_dscrptn?></a></li>
            <?endforeach?>
          </ul>
        </li>
      </ul>
      <?=form_open('/sys/search',array('name'=>'serachForm','id'=>'serachForm','class'=>'serachForm navbar-form navbar-left','role'=>'search'))?>
        <div class="form-group">
          <input type="hidden" id="column" name="column" value="name" />
          <input id="keyword" name="keyword" type="text" class="form-control" placeholder="关键字" />
        </div>
        <button type="submit" class="btn btn-default search_btn">搜索</button>
      <?=form_close()?>
      <?endif?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown"> <?=$user_data['name']?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a class="glyphicon glyphicon-file" href="profile"> 修改资料</a></li>
            <li><a class="glyphicon glyphicon-lock" href="password"> 修改密码</a></li>
            <li><a class="glyphicon glyphicon-off" href="/sys/logout"> 注销</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>
<div class="page-header bg-custom" style="background-color:<?=isset($header_color[$current]) ? $header_color[$current] : '#414385' ?>">
  <div class="container">
    <h1><?=empty($header_title) ? '企业信息管理系统' : $header_title?></h1>
  </div>
</div>
</header>