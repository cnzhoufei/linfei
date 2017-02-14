<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertisingController extends CommonController 
{
	/**
	 *广告位列表
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
     * 广告列表
     */
    public function adv()
    {
        $adv_m = M('adv');
        $count = $adv_m->count();
        $Page       = new \Think\Page($count,6);
        $show       = $Page->show();
        $adv = $adv_m->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('adv',$adv);
        $this->display('/advlist');
    }

    /**
     * 添加广告
     */
    public function addadvertising()
    {
        $advertising_m = M('advlocation');//广告位表
    	$adv = M('adv');//广告表
        $id = I('id',0);//广告id
    	// if(!is_numeric($id)){$this->error('非法操作！！！');}//判断GET下的id是否为数字
    	if(IS_POST){
            if(!$_POST['status']){$_POST['status'] = 0;}
            if(!$_POST['blank']){$_POST['blank'] = 0;}
            $_POST['starttime'] = $_POST['starttime']?strtotime($_POST['starttime']):0;
            $_POST['endtime'] = $_POST['endtime']?strtotime($_POST['endtime']):0;
            if(!$_POST['pid']){$this->error('必须选择一个广告位！');}
            $type = substr($_POST['pid'],-1);//广告位类型
            if($type == 1 && S('ggimg')){//广告位为图片类型
                if($id){
                    $img = $adv->where(array('id'=>$id))->getField('img');
                    if($img){@unlink('.'.$img);}
                }
                $_POST['img'] = S('ggimg');
                S('ggimg',null);
            }

            $_POST['pid'] = substr($_POST['pid'],0,-1);
            $data = $adv->create($_POST,1);//根据表单提交的POST数据创建数据对象
            if(!$data){$this->error($adv->getError());}
            if($id){
                $res = $adv->where(array('id'=>$id))->save();
            }else{
                
                $data['addtime'] = time();//添加时间
                $res = $adv->add($data);//添加广告
            }
           if($res){
                $this->success('操作成功',U('Advertising/adv'));
            }else{
                $this->error('操作失败！');
            }
    			
    	}else{

            //查询所有广告位
            $advlocation = $advertising_m->field('id,name,type')->select();
        if($id){

            //查询广告类容
            $adv_data = $adv->where(array('id'=>$id))->find();

            //查询广告类型 1图片 2文本
            $advertising = $advertising_m->where(array('id'=>$adv_data['pid']))->find();
            $adv_data['type'] = $advertising['type'];
    	    $this->assign('ad',$adv_data);

        }
        $this->ueditor('guanggao');//创建编辑器
        $this->assign('advlocation',$advlocation);            
    	$this->display('/addad');
        }
    }




    public function _empty()
    {
        $this->display('Public/404');
    }



}

