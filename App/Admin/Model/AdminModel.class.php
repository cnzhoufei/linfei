<?php


namespace Admin\Model;
use Think\Model;

class AdminModel extends Model
{
	 protected $_validate = array(     
	 array('name','require','用户名不能为空！'), //默认情况下用正则进行验证 
	 array('name','','帐号名称已经存在！',0,'unique',1), 
	 array('pwd','require','密码名不能为空！',6), 
	);

	public function datas($post)
	{
		$post['pwdstr'] = md5(createluan('15'));
		$post['pwd'] = md5(md5($post['pwd']).$post['pwdstr']);
        return $post;
	}

	
		

}
 

