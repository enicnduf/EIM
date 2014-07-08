<?php
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'提交保存');
$i = 1;
?>
<div class="container">
<?/*************************************************************企业基本信息****************************************************************/?>
<div class="panel panel-primary">
    <div class="panel-heading"><?=array_shift($tables_name_ent)?></div>
    <div class="panel-body">
        <?=form_open('ent/inputSave',array('name'=>'BasicForm','id'=>'BasicForm','class'=>'inputForm form-horizontal','role'=>'form'))?>
        <?=form_hidden(array('table_name'=>'ent_basic','index'=>'eid','id'=>$eid))?>
        <?foreach($tables_config['ent_basic_column'] as $c_name => $c_dscrptn):?>
        <div class="form-group col-lg-6">
            <label for="input<?=$value?>" class="col-sm-4 control-label"><?=$c_dscrptn?></label>
            <div class="col-sm-8">
            <?=form_input(array('name'=>$c_name,'id'=>'input'.$c_name,'class'=>'form-control',
                                'placeholder'=>'请输入','value'=>$main_data[0][0][$c_name]))?>
            </div>
        </div>
        <?endforeach?>
        <p class="text-right"><?=form_button($btn_submit)?></p>
        <?=form_close()?>
    </div>
</div>
<?/*************************************************************企业详细信息****************************************************************/?>
<?if($eid):?>
<?foreach($tables_name_ent as $t_name => $t_dscrptn):?>
<?$column_name = $tables_config[$t_name.'_column'];?>
<div class="panel panel-info">
    <div class="panel-heading"><?=$value?></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <?if(!empty($main_data[$i])){
                    echo '<td><button type="button" class="btn btn-danger delete_item" name="'.$t_name.'" id="'.$main_data[$i][0]['eid'].'">删除</button></td>';
                }?>
                <?foreach($column_name as $c_name => $c_dscrptn):?>
                <td><?=$c_dscrptn?></td>
                <?endforeach?>
            </tr>
            <?if(!empty($main_data[$i])):?>
                <?foreach ($main_data[$i] as $key => $value):?>
                <tr>
                    <td><?=form_checkbox(array('name'=>'del'.$value['eid'],'class'=>'del'.$value['eid'],'value'=>$value['id']))?></td>
                    <?foreach($column_name as $c_name => $c_dscrptn):?>
                    <td><?=$value[$c_name]?></td>
                    <?endforeach?>
                </tr>
                <?endforeach?>
            <?else:?>
                <tr><td colspan="<?=count($column_name)?>" class="text-center"><strong>暂无记录</strong></td></tr>
            <?endif?>
        </table>
        <?=form_open('ent/inputSave',array('name'=>$t_name.'Form','id'=>$t_name.'Form','class'=>'inputForm form-horizontal','role'=>'form'))?>
        <?=form_hidden(array('table_name'=>$t_name,'eid'=>$eid,'new'=>'1'))?>
        <?foreach($column_name as $c_name => $c_dscrptn):?>
        <div class="form-group col-lg-6">
            <label for="input<?=$c_name?>" class="col-sm-2 control-label"><?=$c_dscrptn?></label>
            <div class="col-sm-4">
            <?=form_input(array('name'=>$c_name,'id'=>'input'.$c_name,'class'=>'form-control','placeholder'=>'请输入'))?>
            </div>
        </div>
        <?endforeach?>
        <p class="text-right"><?=form_button($btn_submit)?></p>
        <?=form_close()?>
    </div>
</div>
<?$i++?>
<?endforeach?>
<?endif?>
<?/*************************************************************【end】****************************************************************/?>
</div>