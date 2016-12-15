<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController 
{


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
        $user_m = M('admin');
        if(IS_POST){
            if(empty($_POST['name'])){$this->error('用户名不能为空！');}
            if(session('adminuser.name') == 'admin'){ unset($_POST['name']);}
            if(S('icon')){
                    $_POST['icon'] = S('icon');
                    @unlink('.'.session('adminuser.icon'));
                    session('adminuser.icon',S('icon'));
                }
            $data = $user_m->create(null,1);//根据表单提交的POST数据创建数据对象
            if(I('id')){
                $res = $user_m->save($data);
            }else{
                $res = $user_m->add($data);
            }

            S('icon',null);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败！');
            }


    	}else{

            $user = $user_m->where(array('id'=>session('adminuser.id')))->find();
            $this->assign('user',$user);
    		$this->display('/usereditor');
    	}
    }


}