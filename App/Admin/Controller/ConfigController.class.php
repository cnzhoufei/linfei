<?php

namespace Admin\Controller;
use Think\Controller;
class ConfigController extends CommonController 
{
	/**
	 * 网站信息
	 */
	public function index()
	{
		if(IS_POST){
			$logo = $_POST['logo'];//当前logo路径
			$config_m = M('config');
			if(S('logo')){$_POST['logo'] = S('logo');@unlink('.'.$logo);}
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
            S('logo',null);
			if($res){
				$this->success('操作成功');
			}else{
				$this->error('操作失败！');
			}


		}else{
			$config = M('config')->find();
			$this->assign('config',$config);
			$this->display();
		}
	}



	/**
	 * 自定义列表
	 */
	public function custom()
	{
		$custom_m = M('custom');
		$custom = $custom_m->select();
		$this->assign('custom',$custom);
		$this->display();
	}


	/**
	 * 添加修改自定义
	 */
	public function reditorcustom()
	{
		$this->assign('url','/Admin/Config/custom.php');
		$customid = I('customid',0);
		if(!is_numeric($customid)){$this->error('非法操作！');}//判断id是否为数字
		$custom_m = M('custom');
		if(IS_POST){
			$customid = I('post.customid',0);
			if(!$_POST['key']){$this->error('key 不能为空！');}
			$_POST['time'] = time();
			$data = $custom_m->create(null,1);//根据表单提交的POST数据创建数据对象
			if (!$data){$this->error($custom_m->getError());}
			if($customid){
				$res = $custom_m->where(array('id'=>$customid))->save($data);
			}else{
				$res = $custom_m->add($data);
			}
			if($res){
				$this->success('提交成功',U('Config/custom'));
			}else{
				$this->error('提交失败！请重新提交！');
			}
		}else{
			$custom = $custom_m->where(array('id'=>$customid))->find();
			$this->assign('custom',$custom);
			$this->display();
		}
	}


	/**
	 * 删除自定义
	 */
	public function deletecustom()
	{
		if(IS_AJAX){
			$id = I('id');
			$res = M('custom')->where(array('id'=>$id))->delete();
			if($res){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}else{
			$this->_empty();
		}
	}


	/**
	 * 邮箱配置
	 */
	public function email()
	{

		if(IS_POST){
			if(!is_writeable("./App/Admin/conf/emailconfig.php")){$this->error('/App/Admin/conf/emailconfig.php不可写，请修改权限！');}
			$mail_debug = I('post.MAIL_DEBUG',0);
			$str = "<?php 
return array(
   /*配置邮件发送服务器*/
    'MAIL_HOST'             =>      '".$_POST['MAIL_HOST']."',      /*smtp服务器的名称、smtp.163.com*/
    'MAIL_SMTPAUTH'         =>      TRUE,                           /*启用smtp认证*/
    'MAIL_DEBUG'            =>      {$mail_debug},         			/*是否开启调试模式*/
    'MAIL_USERNAME'         =>      '".$_POST['MAIL_USERNAME']."',  /*邮箱名称*/
    'MAIL_FROM'             =>      '".$_POST['MAIL_FROM']."',      /*发件人邮箱*/
    'MAIL_FROMNAME'         =>      '".$_POST['MAIL_FROMNAME']."',  /*发件人昵称*/
    'MAIL_PASSWORD'         =>      '".$_POST['MAIL_PASSWORD']."',  /*发件人邮箱的密码*/
    'MAIL_CHARSET'          =>      'utf-8',                        /*字符集*/
    'MAIL_ISHTML'           =>      TRUE,                           /*是否HTML格式邮件*/
	);";


   		$res = file_put_contents("./App/Admin/conf/emailconfig.php",$str);
   		if($res){
   			$this->success("配置成功");
   		}else{
   			$this->error("配置失败！！！");
   		}

		}else{

			$emailconfig = include "/App/Admin/conf/emailconfig.php";
			$this->assign('emailconfig',$emailconfig);
			$this->display();
		}
	}

	/**
	 * 水印管理
	 */
	public function watermark()
	{

		$watermark_m = M('watermark');
		if(IS_POST){
			$_POST['status1'] = ($_POST['status1'])?$_POST['status1']:0;
			$_POST['status2'] = ($_POST['status2'])?$_POST['status2']:0;
			if(S('tupin')){$_POST['tupin'] = S('tupin');}
			$data = $watermark_m->create(null,1);//根据表单提交的POST数据创建数据对象
			if (!$data){$this->error($watermark_m->getError());}
			unset($data['id']);
			if($_POST['id']){
				$res = $watermark_m->where(array('id'=>$_POST['id']))->save($data);
				if(S('tupin')){
					$tupin = $watermark_m->where(array('id'=>$id))->find();
					@unlink('.'.$tupin['tupin']);
				}
			}else{
				$res = $watermark_m->add($data);
			}
			S('tupin',null);
			if($res){
				$this->success('提交成功');
			}else{
				$this->error('提交失败！请重新提交！');
			}
		}else{

			$watermark = $watermark_m->find();
			$this->assign('watermark',$watermark);
			$this->display();
		}

	}

	/**
	 * 菜单样式
	 */
	public function navstyle()
	{
		if(IS_AJAX){
			$data['navstyle'] = (I('v'))?0:1;
			$config = M('config');
			$id = $config->field('id')->find();
			$res = $config->where(array('id'=>$id['id']))->save($data);
			$this->ajaxReturn($res);
		}else{
			$this->error('非法操作！');	
		}	

	}


	/**
	 * url模式
	 */
	public function settingurl()
	{	
		$model = M('config');
		if(IS_POST){
			$data = $model->create($_POST,1);//根据表单提交的POST数据创建数据对象
			if (!$data){$this->error($model->getError());}
			$res = $model->save($data);
			if($res){
   				$this->success("操作成功");
			}else{
				$this->error('操作失败！');
			}

		}else{
			$url = $model->field('id,url')->find();
			$this->assign('url',$url);
			$this->display();
		}
	}

	/**
	 * 缓存时间设置
	 */
	public function cache()
	{
		if(IS_POST){
			$time = $_POST['cache']?$_POST['cache']:0;
			$str = "<?php
            return array(
            	'HTMLTIME' =>{$_POST['cache']},
            );";
			if(file_put_contents('./App/Home/Conf/htmltime.php', $str)){
				$this->success('设置成功');
			}else{
				$this->error('设置失败！');
			}


		}else{

			$str = include "./App/Home/Conf/htmltime.php";
			$this->assign('cache',$str['HTMLTIME']);
			$this->display();
		}
	}




	public function _empty()
	{
		$this->display('Public/404');
	}

}