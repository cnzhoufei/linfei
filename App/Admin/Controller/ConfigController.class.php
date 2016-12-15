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
			$this->display('/config');
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
		$this->display('/custom');
	}


	/**
	 * 添加修改自定义
	 */
	public function reditorcustom()
	{
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
			$this->display('/reditorcustom');
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
			if(!is_writeable("./App/Common/conf/emailconfig.php")){$this->error('/App/Common/conf/emailconfig.php不可写，请修改权限！');}
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


   		$res = file_put_contents("./App/Common/conf/emailconfig.phpp",$str);
   		if($res){
   			$this->success("配置成功");
   		}else{
   			$this->error("配置失败！！！");
   		}

		}else{

			$emailconfig = include "/App/Common/conf/emailconfig.php";
			$this->assign('emailconfig',$emailconfig);
			$this->display('/email');
		}
	}




















	public function _empty()
	{
		$this->display('Public/404');
	}

}