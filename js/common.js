var $full_url = "http://" + window.location.host + window.location.pathname;
var $index_url = "http://" + window.location.host + "/eim/ent/";
var $path_name = window.location.pathname;
var $limit = 8;
var $iframe_seq = 1;
$(document).ready(function(){
	$.ajaxSetup({cache:false})
	/**
	* Form checking
	**/
	$(".profileForm").submit(function(e){
		$(this).ajaxSubmit({
            dataType: 'text',
            success: function(data){
            	if(data=='SUCCEED'){
            		alert('修改成功！');
            		window.location.reload(true);
            	}else{
            		alert(data);
            	}
            }
        })
		return false;
	})

	$(".passwordForm").submit(function(e){
		$(this).ajaxSubmit({
            dataType: 'text',
            success: function(data){
            	if(data=='SUCCEED'){
            		alert('修改成功！');
            		window.location.reload(true);
            	}else{
            		alert(data);
            	}
            }
        })
		return false;
	})

	$(".inputForm").submit(function(e){
		$(this).ajaxSubmit({
            dataType: 'text',
            success: function(data){
            	if($("[name='id']").val()==''){
            		window.location.href = $full_url + '?id=' + data;
            	}else{
                	window.location.reload(true);
                }
            }
        })
        return false;
	})

	$(".loginForm").submit(function(e){
		$(this).ajaxSubmit({
            dataType: 'text',
            success: function(data){
            	if(data=='PASS'){
            		alert('登陆成功！');
            		window.location.reload(true);
            	}else{
            		alert('登录失败，请重新登录。');
            	}
            }
        })
        return false;
	})

	$(".update").on('click',function(){
		$id = $(this).attr('id');
		$type = $(this).attr('name');
		window.open($index_url + $type + "?id=" + $id, "_blank");
	})

	$(".delete").on('click',function(){
		if(confirm('确认删除这条记录？')){
			$uid = $(this).attr('id');
			$table_name = $(this).attr('name');
			$url = 'delete';
			$.post($url,
				{table_name: $table_name, id: $uid},
				function(data){
					window.history.go(-1);
				}
			)
		}
	})

	$(".delete_item").on('click',function(){
		$id_list = '';
		$eid = $(this).attr('id');
		$table_name = $(this).attr('name');
		$(".del"+$eid+":checked").each(function(){
			$id_list += $(this).val()+',';
		})
		$id_list = $id_list.slice(0,-1);
		$url = 'delete?a=item';
		$.post($url,
			{table_name: $table_name, id: $id_list},
			function(data){
				window.location.reload(true);
			}
		)
	})
	/**
	* Search button
	**/
	$(".column_sel").on('click',function(){
		$column_name = $(this).attr('id');
		$column_show = $(this).text();
		$("#column_show").html($column_show);
		$("#column").val($column_name);
	})

	$(".serachForm").submit(function(e){
		$(this).ajaxSubmit({
            dataType: 'text',
            success: function(data){
            	window.location.href = $full_url + data;
            }
        })
		return false;
	})
	/**
	* List click
	**/
	var $list_jump = true;
	$(".no_jump").on('click',function(){
		$list_jump = false;
	})
	$(".docx").on('click',function(){
		$id = $(this).attr('id');
		$index = $(this).attr('name');
		$(this).toggle();
		$(this).next().toggle();
		$url =  "http://" + window.location.host + '/eim/docx';
		$.post($url,
			{id: $id, index: $index},
			function(data){
				$data = data.split('|');
				savefile($data[0]);
				$("#"+$data[1]+" .docx").toggle();
				$("#"+$data[1]+" .docx").next().toggle();
			}
		);
	})

	$(".list_item").on('click',function(){
		if($list_jump){
			$id = $(this).attr('id');
			$type = $(this).attr('name');
			window.open($index_url + $type + "?id=" + $id, "_blank");
		}
		$list_jump = true;
	})
	/**
	* Paging
	**/
	$(".paging").click(function(){
		$page = $(this).attr('id');
        paging($page);
    })
    /**
    * Vertical Alignment
    **/
    centeralize();
    $(window).resize(function(){
    	centeralize();
    })
})
/**
 * Common function
 **/
function paging($page){
 	$jump_url = $full_url + '?page=' + $page;
 	$limit = getLocationParam('limit');
 	if($limit!=''){$jump_url += '&limit=' + $limit}
 	window.location.href = $jump_url;
 }

function getLocationParam(param){ 
	var request = { 
		QueryString : function(val) { 
			var uri = window.location.search; 
			var re = new RegExp("" +val+ "=([^&?]*)", "ig"); 
			return ((uri.match(re))?(decodeURI(uri.match(re)[0].substr(val.length+1))):''); 
		} 
	} 
	return request.QueryString(param); 
}

function centeralize(){
	$document_height = $(document).height();
    $row_height = $(".row").height();
    $(".row-padding-0").css('height',($document_height - $row_height) / 2 - 50)
    $(".row-padding-1").css('height',($document_height - $row_height) / 2)
}

function savefile($file_path){
    var hiddenIFrameID = 'hiddenDownloader' + $iframe_seq,
    iframe = document.getElementById(hiddenIFrameID);
    $iframe_seq++;
    if (iframe === null) {
        iframe = document.createElement('iframe');
        iframe.id = hiddenIFrameID;
        iframe.style.display = 'none';
        document.body.appendChild(iframe);
    }
    iframe.src = $file_path;
}