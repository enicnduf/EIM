<?php
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'提交修改');
?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">修改资料</div>
        <div class="panel-body">
            <?=form_open('/sys/profile',array('name'=>'profileForm','id'=>'profileForm','class'=>'profileForm form-horizontal','role'=>'form'))?>
	        <?=form_hidden(array('table_name'=>'sys_user'))?>
	        <div class="form-group">
	            <label for="inputName" class="col-sm-3 control-label">姓名</label>
	            <div class="col-sm-9">
	            	<div class="input-group">
			            <span class="input-group-addon glyphicon glyphicon-lock"></span>
			            <?=form_input(array('name'=>'name','id'=>'inputName','class'=>'form-control',
			                                'placeholder'=>'请输入','value'=>$main_data['name']))?>
                	</div>
	            </div>
        	</div>
        	<div class="form-group">
	            <label for="inputDept" class="col-sm-3 control-label">部门</label>
	            <div class="col-sm-9">
	            	<div class="input-group">
	            		<span class="input-group-addon glyphicon glyphicon-lock"></span>
			            <?=form_input(array('name'=>'dept','id'=>'inputDept','class'=>'form-control',
			                                'placeholder'=>'请输入','value'=>$main_data['dept']))?>
                    </div>
	            </div>
	        </div>
	        <p class="text-right"><?=form_button($btn_submit)?></p>
	        <?=form_close()?>
        </div>
    </div>
</div>