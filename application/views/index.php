 <?php
$tables_name_all = $this->config->item('tables_name_all','tables');
$i = $l = 0;
//$btn_update = array('name'=>'update','id'=>$main_data[$i][0]['eid'],'type'=>'button','class'=>'btn btn-warning update','content'=>'更改');
//$btn_delete = array('name'=>'basic','id'=>$main_data[$i][0]['eid'],'type'=>'button','class'=>'btn btn-danger delete','content'=>'删除');
?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">企业列表</div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <?foreach($tables_config['list_column_ent'] as $c_name => $c_dscrptn):?>
                        <td class="col-md-<?=$tables_config['column_width'][$c_name]?>"><?=$c_dscrptn?></td>
                    <?endforeach?>
                </tr>
                </thead>
            <?foreach($main_data[0] as $key => $value):?>
                <tr id="<?=$value['eid']?>" name="view_e" class="list_item">
                    <?foreach($tables_config['list_column_ent'] as $c_name => $c_dscrptn):?>
                        <td><?=$value[$c_name]?></td>
                    <?endforeach?>
                </tr>
            <?$i++?>
            <?endforeach?>
            <?while($i<$limit):?>
                <tr>
                    <td colspan="<?=count($tables_config['list_column_ent'])?>">&nbsp;</td>
                </tr>
            <?$i++?>
            <?endwhile?>
            </table>
            <div class="text-right">
                <a href="view_e" class="btn btn-primary">查看更多</a>
            </div>
        </div>
    </div>
</div>

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
            <?foreach($main_data[1] as $key => $value):?>
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
                <a href="view_p" class="btn btn-primary">查看更多</a>
            </div>
        </div>
    </div>
</div>