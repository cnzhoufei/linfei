<?php

namespace Admin\Controller;
use Think\Controller;
class ConfigController extends CommonController 
{
	public function index()
	{
		if(IS_POST){

			dump(S('fiel'.session('adminuser.id')));exit;
			$config_m = M('config');
			$_POST['time'] = time();
			$_POST['status'] = I('status',0);
			$data = $config_m->create(null,1);//根据表单提交的POST数据创建数据对象
			if(!$data){
				$erroer = $config_m->getError();
				$this->error($erroer);
			}

			if($_POST['id']){
				$res = $config_m->save($data);
			}else{

				$res = $config_m->add($data);
			}
			if($res){
				$this->success('操作成功');
			}else{
				$this->error('操作失败！');
			}


		}else{
			$config = M('config')->find();
			$this->assign('config',$config);
			$this->display('/config');
		}
	}




	
}