<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController 
{

	// public function _initialize()
	// {
	// 	$this->assign('controller','用户管理');
	// }




    public function index()
    {
    	$level = I('level',0);
    	if($level){
    		$users = M('admin')->field(array('id,name,time,tel,email,icon'))->select();
    	}
    	$this->assign('users',$users);
    	$this->assign('level',$level);
    	$this->display('/userlist');
    }



    public function editor()
    {
    	if(IS_POST){
            $_POST['logo'] = S('file'.session('adminuser.id'))[0];
            dump($_POST);


    	}else{


    		// $this->ueditor('editor');
    		$this->display('/usereditor');
    	}
    }


}