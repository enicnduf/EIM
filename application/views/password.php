<?php
$btn_submit = array('name'=>'submit','id'=>'submit','type'=>'submit','class'=>'btn btn-primary','content'=>'提交修改');
?>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">修改密码</div>
        <div class="panel-body">
            <?=form_open('/sys/password',array('name'=>'passwordForm','id'=>'passwordForm','class'=>'passwordForm form-horizontal','role'=>'form'))?>
	        <?=form_hidden(array('table_name'=>'sys_user'))?>
	        <div class="form-group">
	            <label for="inputOldpassword" class="col-sm-3 control-label">原密码</label>
	            <div class="col-sm-9">
	            	<div class="input-group">
			            <span class="input-group-addon glyphicon glyphicon-lock"></span>
			            <?=form_password(array('name'=>'oldpassword','id'=>'inputOldpassword','class'=>'form-control',
			                                'placeholder'=>'请输入'))?>
                	</div>
	            </div>
        	</div>
        	<div class="form-group">
	            <label for="inputNewpassword" class="col-sm-3 control-label">新密码</label>
	            <div class="col-sm-9">
	            	<div class="input-group">
	            		<span class="input-group-addon glyphicon glyphicon-lock"></span>
			            <?=form_password(array('name'=>'newpassword','id'=>'inputNewpassword','class'=>'form-control',
			                                'placeholder'=>'请输入'))?>
                    </div>
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="inputNewpassword2" class="col-sm-3 control-label">重复新密码</label>
	            <div class="col-sm-9">
	            	<div class="input-group">
	            		<span class="input-group-addon glyphicon glyphicon-lock"></span>
			            <?=form_password(array('name'=>'newpassword2','id'=>'inputNewpassword2','class'=>'form-control',
			                                'placeholder'=>'请输入'))?>
                    </div>
	            </div>
	        </div>
	        <p class="text-right"><?=form_button($btn_submit)?></p>
	        <?=form_close()?>
        </div>
    </div>
</div>