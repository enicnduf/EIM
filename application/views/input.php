<?php
$tables_name_all = $this->config->item('tables_name_all','tables');
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'提交保存');
$i = 0;
?>
<div class="container">
<?/*************************************************************企业基本信息****************************************************************/?>
<div class="panel panel-primary">
    <div class="panel-heading"><?=array_shift($tables_name_all)?></div>
    <div class="panel-body">
        <?=form_open('ent/inputSave',array('name'=>'BasicForm','id'=>'BasicForm','class'=>'inputForm form-horizontal','role'=>'form'))?>
        <?=form_hidden(array('table_name'=>'basic','eid'=>$eid))?>
        <table>
            <tr><td>
        <?foreach($this->config->item('basic_column','tables') as $key => $value):?>
            <label for="input<?=$value?>" class="col-sm-2 control-label"><?=$key?></label>
            <div class="col-sm-4">
            <?=form_input(array('name'=>$value,'id'=>'input'.$value,'class'=>'form-control',
                                'placeholder'=>'请输入','value'=>$main_data[$i][0][$value]))?>
            </div>
        <?endforeach?>
            </td></tr>
        </table>
        <p class="text-right"><?=form_button($btn_submit)?></p>
        <?=form_close()?>
    </div>
</div>
<?$i++?>
<?/*************************************************************企业详细信息****************************************************************/?>
<?if($eid):?>
<?foreach($tables_name_all as $key => $value):?>
<?$column_name = $this->config->item($key.'_column','tables');?>
<div class="panel panel-info">
    <div class="panel-heading"><?=$value?></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <?if(!empty($main_data[$i])){
                    echo '<td><button type="button" class="btn btn-danger delete_item" name="'.$key.'" id="'.$main_data[$i][0]['eid'].'">删除</button></td>';}
                ?>
                <?foreach($column_name as $key2 => $value2):?>
                <td><?=$key2?></td>
                <?endforeach?>
            </tr>
            <?if(!empty($main_data[$i])):?>
                <?foreach ($main_data[$i] as $key1 => $value1):?>
                <tr>
                    <td><?=form_checkbox(array('name'=>'del'.$value1['eid'],'class'=>'del'.$value1['eid'],'value'=>$value1['id']))?></td>
                    <?foreach($column_name as $key2 => $value2):?>
                    <td><?=$value1[$value2]?></td>
                    <?endforeach?>
                </tr>
                <?endforeach?>
            <?else:?>
                <tr><td colspan="<?=count($column_name)?>" class="text-center"><strong>暂无记录</strong></td></tr>
            <?endif?>
        </table>
        <?=form_open('ent/inputSave',array('name'=>$key.'Form','id'=>$key.'Form','class'=>'inputForm form-horizontal','role'=>'form'))?>
        <?=form_hidden(array('table_name'=>$key,'eid'=>$eid,'new'=>'1'))?>
        <table>
            <tr><td>
        <?foreach($column_name as $key2 => $value2):?>
            <label for="input<?=$value2?>" class="col-sm-2 control-label"><?=$key2?></label>
            <div class="col-sm-4">
            <?=form_input(array('name'=>$value2,'id'=>'input'.$value2,'class'=>'form-control','placeholder'=>'请输入'))?>
            </div>
        <?endforeach?>
            </td></tr>
        </table>
        <p class="text-right"><?=form_button($btn_submit)?></p>
        <?=form_close()?>
    </div>
</div>
<?$i++?>
<?endforeach?>
<?endif?>
<?/*************************************************************【end】****************************************************************/?>
</div>