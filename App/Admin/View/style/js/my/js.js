function mydelete(id,url,deletes){
	if(confirm('你确定删除吗？')){
		$.post(url, {'id':id}, function(res){
			if(res){
				$('#'+deletes).remove();
			}else{

				alert('删除失败！');
			}
			
		})
		
	}else{

		alert('放弃也是一种收获');
	}

}
