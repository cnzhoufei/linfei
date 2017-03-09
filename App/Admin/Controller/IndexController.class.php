<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController 
{
    public function index()
    {
       

    	$mysql = M()->query("SELECT VERSION() as version");//数据库版本
    	//gd库
    	if(function_exists("gd_info")){
			$gd = gd_info();
			$sys_info['gdinfo'] 	= $gd['GD Version'];
		}else {
			$sys_info['gdinfo'] 	= "未知";
		}
    	$this->assign('serverInfo',array(
    		array('name'=>'版本号','v'=>'v1.0'),
    		array('name'=>'服务器系统','v'=>PHP_OS),
    		array('name'=>'PHP版本','v'=>PHP_VERSION),
    		array('name'=>'数据库版本','v'=>$mysql[0]['version']),
    		array('name'=>'服务器软件','v'=>$_SERVER['SERVER_SOFTWARE']),
    		array('name'=>'最大上传许可','v'=>@ini_get('file_uploads') ? ini_get('upload_max_filesize') :'unknown'),
    		array('name'=>'服务器域名/IP','v'=>$_SERVER['HTTP_HOST'].'('.$_SERVER['SERVER_ADDR'].')'),
    		array('name'=>'最大占用内存','v'=>ini_get('memory_limit')),
    		array('name'=>'最大执行时间','v'=>@ini_get("max_execution_time").'s'),
    		array('name'=>'安全模式','v'=>(boolean) ini_get('safe_mode') ? 'YES' : 'NO'),
    		array('name'=>'Zlib支持','v'=>function_exists('gzclose') ? 'YES' : 'NO'),
    		array('name'=>'Curl支持','v'=>function_exists('curl_init') ? 'YES' : 'NO'),
    		array('name'=>'GD 版本','v'=>$sys_info['gdinfo'])
    		));
        $this->display('/index');
    }


    public function _empty()
    {
    	echo '404';
    }
}