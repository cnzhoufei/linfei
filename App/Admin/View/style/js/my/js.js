function mydelete(id,table,field,deletes){
	if(confirm('你确定删除吗？')){
		$.post('/Admin/Admin/del.php', {'id':id ,'table':table, 'field':field}, function(res){
			if(res==1){
				$('#'+deletes).remove();
			}else{
				if(!res){
					showmsg('删除失败！');
					
				}else{
					showmsg(res);
				}
			}
			
		})
		
	}else{
		// showmsg('放弃也是一种收获');
	}

}


/**
*根据类型获取分类
*
*/
function getclass(url,type,classs)
{	
                                        
	var str = '<option value="0">顶级分类</option>';
	$.getJSON(url, {'type':type}, function(data){

		 $.each(data, function(i,item){
		 	str += "<option value='"+item.id+"'>"+item.name+"</option>";
  		});

		 $('#'+classs).html(str);

	})
}

//改变状态
function status(url,id,field,obj)
{
	$.post(url ,{'field':field ,'status':$(obj).val() ,'id':id}, function(res){

		if(res['res']){
			if(res['status']){var color = '#478B47';}else{var color = '#f00';}
			$(obj).val(res['status']);
			$(obj).html(res['msg']);
			$(obj).css('color',color);
		}else{
			showmsg('操作失败！');
		}
	})
}
// //改变状态2
// function status2(url,id,field,obj)
// {
// 	$.post(url ,{'field':field ,'status':$(obj).attr('v') ,'id':id}, function(res){
// 		if(res['res']){
// 			if(res['status']){var pic = "<img src='/App/Admin/View/style/images/yes.png'>";}else{var pic = "<img src='/App/Admin/View/style/images/cancel.png'>";}
// 			$(obj).attr('v',res['status']);
// 			$(obj).html(pic);
// 			window.location.reload();
// 			showmsg('操作成功');
// 		}else{
// 			showmsg('操作失败！');
// 		}
// 	})
// }


//改变状态2
/*	
*table  表名
*id 要操作的数据id
*field 字段名
*obj this
*/
function status2(table,id,field,obj)
{
	$.post('/Admin/Admin/status.php' ,{'table':table,'field':field ,'status':$(obj).attr('v') ,'id':id}, function(res){
		if(res['res']){
			if(res['status']){var pic = "<img src='/App/Admin/View/style/images/yes.png'>";}else{var pic = "<img src='/App/Admin/View/style/images/cancel.png'>";}
			$(obj).attr('v',res['status']);
			$(obj).html(pic);
			window.location.reload();
			showmsg('操作成功');
		}else{
			showmsg('操作失败！');
		}
	})
}


/*
*状态批量操作
*/
function states(v,table,field){
    var tr = $('tbody tr');
    var arr = new Array();
    tr.each(function(i){
        if($(this).attr('x') == '1'){
            arr[i] = $(this).attr('id');
        }
    })

    $.post("/Admin/Admin/states.php",{'table':table ,'field':field ,'v':v, 'arr':arr} ,function(res){
        if(res){
            showmsg('操作成功');
            window.location.reload();
        }else{
            showmsg('操作失败！');
            window.location.reload();
        }
    })

    
}


//排序
function sorting(table,obj,id){

	$.post('/Admin/Admin/ajaxsorting.php' ,{'table':table ,'id':id ,'val':$(obj).val()} ,function(res){

		if(res){

		}else{
			showmsg('操作失败！');
		}
	})
}




function nav(url,v){

	$.post(url,{'v':v} ,function(res){
		// alert(res)
	})
	
}




//选中
function choose(obj)
{
    var x = ($(obj).attr('x') == '1')?'0':'1';
    if(x == '1'){var back = 'background:orange';}else{var back = '';}
    $(obj).find('td').attr('style',back);
    $(obj).attr('x',x);
}

//全选
function quanxuan(){
	 $('tbody tr td').attr('style','background:orange');
    $('tbody tr').attr('x','1');
}


//反选
function fanxuan(){
    var tr = $('tbody tr');
    tr.each(function(){
        var x = ($(this).attr('x') == '1')?'0':'1';
        if(x == '1'){var back = 'background:orange';}else{var back = '';}
        $(this).find('td').attr('style',back);
        $(this).attr('x',x);
    })

}


//取消
function quxiao(){

    $('tbody tr td').attr('style','background:');
    $('tbody tr').attr('x','0');
}





//批量删除
function deletes(table,field){
 if(confirm('你确定删除吗？')){
    var tr = $('tbody tr');
    var arr = new Array();
    tr.each(function(i){
        if($(this).attr('x') == '1'){
            arr[i] = $(this).attr('id');
        }
    })

    $.post("/Admin/Admin/dels.php",{'table':table ,'field':field ,'arr':arr} ,function(res){
        if(res){
            tr.each(function(i){
            if($(this).attr('x') == '1'){
                $(this).remove();
            }
            })
            showmsg('操作成功');
        }else{
            showmsg('操作失败！');
            window.location.reload();
        }
    })

    
}
}



