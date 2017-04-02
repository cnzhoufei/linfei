<?php
namespace Admin\Controller;

use Think\Controller;
class LoginController extends Controller 
{

	/**
	 * 登录
	 */
	public function index()
	{
		if(IS_POST){
			$post = I('post.');
			// 验证验证码
             $verify = new \Think\Verify(); 
             $code = $verify->check($post['code']);
             if(!$code){
                $this->redirect('Login/index',array('error'=>'验证码错误！'));
             }
             $mode = M('Admin');
             if($uname = $mode->where(array('name'=>$post['name']))->find()){
                 $pwd = md5(md5($post['passwd']).$uname['pwdstr']);
                 $res = $mode->where(array('name'=>$post['name'],'pwd'=>$pwd))->field('name,logintime,time,loginip,tel,email,icon,id')->find();

                 if($res){
                    session('adminuser',$res);
                    $this->redirect('Index/index');
                 }else{
                    $this->redirect('Login/index',array('error'=>'用户名或密码错误！'));
                 }

             }else{
                $this->redirect('Login/index',array('error'=>'用户名不存在！'));
             }


             
		}else{
            if(session('adminuser')){$this->error('你也登陆！','/Admin/Index/index');}
            if(!session('__login__')){$this->error('你访问的页面不存在！','/Home/index.html');exit;}
			$this->display();
		}
	}



	/**
     * 退出登录
     */
    public function logout()
    {
        session('adminuser',null);
        $this->redirect('Admin/Login/index');
    }




	/**
     * 验证码
     */
    public function code()
    {
        $config = array('fontSize' => 30,'useCurve' => false,);
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }


    public function _empty()
    {
    	$this->display('Public/404');
    }
   





    
}