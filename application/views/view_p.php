<?php
$i = $l = 0;
$btn_update = array('name'=>'input_p','id'=>$main_data[$i][0]['pid'],'type'=>'button','class'=>'btn btn-warning update','content'=>'更改');
$btn_delete = array('name'=>'ent_basic','id'=>$main_data[$i][0]['pid'],'type'=>'button','class'=>'btn btn-danger delete','content'=>'删除');

if($pid):?>
<?/**************************************************************企业资料****************************************************************/?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading"><?=array_shift($tables_name_person)?></span></div>
    <div class="panel-body">
        <p class="text-right"><?=form_button($btn_delete)?></p>
        <table class="table table-bordered  table-striped">
        <?foreach($tables_config['person_basic_column'] as $c_name => $c_dscrptn):?>
            <?=$l%2==0?'<tr>':''?>
            <td><?=$c_dscrptn?></td>
            <td><?=$main_data[$i][0][$c_name]?></td>
            <?=$l%2==1?'</tr>':''?>
            <?$l++?>
        <?endforeach?>
        </table>
        <p class="text-right"><?=form_button($btn_update)?></p>
    </div>
</div>
<?$i++?>
<?foreach($tables_name_person as $t_name => $t_dscrptn):?>
<?$column_name = $tables_config[$t_name.'_column'];?>
<div class="panel panel-default">
    <div class="panel-heading"><?=$t_dscrptn?></div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <tr>
                <?if(!empty($main_data[$i])){
                    echo '<td><button type="button" class="btn btn-danger delete_item" name="'.$t_name.'" id="'.$main_data[$i][0]['pid'].'">删除</button></td>';}
                ?>
                <?foreach($column_name as $c_name => $c_dscrptn):?>
                <td><?=$c_dscrptn?></td>
                <?endforeach?>
            </tr>
            <?if(!empty($main_data[$i])):?>
                <?foreach ($main_data[$i] as $key => $value):?>
                <tr>
                    <td><?=form_checkbox(array('name'=>'del'.$value['pid'],'class'=>'del'.$value['pid'],'value'=>$value['id']))?></td>
                    <?foreach($column_name as $c_name => $c_dscrptn):?>
                    <td><?=$value[$c_name]?></td>
                    <?endforeach?>
                </tr>
                <?endforeach?>
            <?else:?>
                <tr><td colspan="<?=count($column_name)?>" class="text-center"><strong>暂无记录</strong></td></tr>
            <?endif?>
        </table>
    </div>
</div>
<?$i++?>
<?endforeach?>
</div>
<?else:?>
<?/**************************************************************企业列表****************************************************************/?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">个人列表</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <?foreach($tables_config['list_column_person'] as $c_name => $c_dscrptn):?>
                        <td class="col-md-<?=$tables_config['column_width'][$c_name]?>"><?=$c_dscrptn?></td>
                    <?endforeach?>
                </tr>
                </thead>
            <?foreach($main_data as $key => $value):?>
                <tr id="<?=$value['pid']?>" name="view_p" class="list_item">
                    <?foreach($tables_config['list_column_person'] as $c_name => $c_dscrptn):?>
                        <td><?=$value[$c_name]?></td>
                    <?endforeach?>
                </tr>
            <?$i++?>
            <?endforeach?>
            <?while($i<$limit):?>
                <tr>
                    <td colspan="<?=count($tables_config['list_column_person'])?>">&nbsp;</td>
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
        </div>
    </div>
</div>
<?endif;?>
<?/*************************************************************【end】****************************************************************/?>