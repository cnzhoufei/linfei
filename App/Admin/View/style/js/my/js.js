function mydelete(id,url,deletes){
	if(confirm('你确定删除吗？')){
		$.post(url, {'id':id}, function(res){
			if(res==1){
				$('#'+deletes).remove();
			}else{
				if(!res){
					alert('删除失败！');
					
				}else{
					alert(res);
				}
			}
			
		})
		
	}else{

		alert('放弃也是一种收获');
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
			alert('操作失败！');
		}
	})
}


//排序
function sorting(url,obj,id){

	$.post(url ,{'id':id ,'val':$(obj).val()} ,function(res){

		if(res){

		}else{
			alert('操作失败！');
		}
	})
}