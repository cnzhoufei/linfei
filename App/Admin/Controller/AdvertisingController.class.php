<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertisingController extends CommonController 
{
	/**
	 *广告列表
	 */
    public function index()
    {
    	$advertising_m = M('advlocation');
    	$advertising = $advertising_m->select();
    	$array = array(1=>'图片',2=>'文本');
    	foreach($advertising as &$v){
    		$v['type'] = $array[ $v['type'] ];
    	}

    	$this->assign('ad',$advertising);
    	$this->display('/advlocationlist');
    }

    /**
     * 添加广告
     */
    public function addadvertising()
    {
    	$advertising_m = M('advertising');
    	$id = I('id');
    	if(!is_numeric($id)){$this->error('非法操作！！！');}
    	if(IS_POST){
    		$data = $advertising_m->create($datas,1);//根据表单提交的POST数据创建数据对象
    		dump($data);
    			
    	}else{

    	$advertising = $advertising_m->where(array('id'=>$id))->find();
    	if($advertising['type'] == 2){
	    	$this->ueditor('guanggao');
    	}
	    $this->assign('ad',$advertising);
    	$this->display('/addadvertising');
    }
    	}
}

