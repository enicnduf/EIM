<?php
$i = $l = 0;
$btn_update = array('name'=>'input_u','id'=>$main_data[0][0]['uid'],'type'=>'button','class'=>'btn btn-warning update','content'=>'更改');
$btn_delete = array('name'=>'sys_users','id'=>$main_data[0][0]['uid'],'type'=>'button','class'=>'btn btn-danger delete','content'=>'删除');
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'提交新增');
?>
<?if($uid):?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">用户管理</div>
    <div class="panel-body">
        <p class="text-right"><?=form_button($btn_delete)?></p>
        <table class="table table-bordered  table-striped">
        <?foreach($tables_config['sys_users_column'] as $c_name => $c_dscrptn):?>
            <?=$l%2==0?'<tr>':''?>
            <td><?=$c_dscrptn?></td>
            <td><?=$main_data[0][0][$c_name]?></td>
            <?=$l%2==1?'</tr>':''?>
            <?$l++?>
        <?endforeach?>
        </table>
        <p class="text-right"><?=form_button($btn_update)?></p>
    </div>
</div>
<?else:?>
<?$column_name = $tables_config['sys_users_column'];?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">用户管理</div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <?foreach($tables_config['list_column_users'] as $c_name => $c_dscrptn):?>
                        <td class="col-md-<?=$tables_config['column_width'][$c_name]?>"><?=$c_dscrptn?></td>
                    <?endforeach?>
                </tr>
                </thead>
            <?foreach($main_data as $key => $value):?>
                <tr id="<?=$value['uid']?>" name="users" class="list_item">
                    <?foreach($tables_config['list_column_users'] as $c_name => $c_dscrptn):?>
                        <td><?=$value[$c_name]?></td>
                    <?endforeach?>
                </tr>
            <?$i++?>
            <?endforeach?>
            <?while($i<$limit):?>
                <tr>
                    <td colspan="<?=count($tables_config['list_column_users'])?>">&nbsp;</td>
                </tr>
            <?$i++?>
            <?endwhile?>
            </table>
            <div class="text-right">
                <ul class="pagination">
                    <?if($page==1):?>
                    <li class="disabled"><span>&laquo;</span></li>
                    <li class="disabled"><span>&lt;</span></li>
                        <?else:?>
                    <li><a href="javascript:void(0);" class="paging" id="1">&laquo;</a></li>
                    <li><a href="javascript:void(0);" class="paging" id="<?=$page-1?>">&lt;</a></li>
                        <?endif?>
                    <?for($j=$page-2;$j<=$page+2;$j++):?>
                        <?if($j>0 && $j<=$total):?>
                            <?if($j==$page):?>
                        <li class="active"><span><?=$j?> <span class="sr-only">(current)</span></span></li>
                            <?else:?>
                        <li><a href="javascript:void(0);" class="paging" id="<?=$j?>"><?=$j?></a></li>
                            <?endif?>
                        <?endif?>
                    <?endfor?>
                    <?if($page==$total):?>
                    <li class="disabled"><span>&gt;</span></li>
                    <li class="disabled"><span>&raquo;</span></li>
                        <?else:?>
                    <li><a href="javascript:void(0);" class="paging" id="<?=$page+1?>">&gt;</a></li>
                    <li><a href="javascript:void(0);" class="paging" id="<?=$total?>">&raquo;</a></li>
                        <?endif?>
                </ul>
            </div>
        <?=form_open('ent/userSave',array('name'=>$t_name.'Form','id'=>$t_name.'Form','class'=>'inputForm form-horizontal','role'=>'form'))?>
        <?=form_hidden(array('table_name'=>$t_name,'uid'=>$uid,'new'=>'1'))?>
        <?foreach($column_name as $c_name => $c_dscrptn):?>
        <div class="form-group col-lg-6">
            <label for="input<?=$c_name?>" class="col-sm-4 control-label"><?=$c_dscrptn?></label>
            <div class="col-sm-8">
            <?=form_input(array('name'=>$c_name,'id'=>'input'.$c_name,'class'=>'form-control','placeholder'=>'请输入'))?>
            </div>
        </div>
        <?endforeach?>
        <p class="text-right"><?=form_button($btn_submit)?></p>
        <?=form_close()?>
    </div>
</div>
</div>
<?endif?>