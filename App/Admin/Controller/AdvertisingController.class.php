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


    /**
     * 排序
     */
    public function ajaxsorting()
    {
        if(IS_AJAX){
            $id = I('id',0);
            $val['sorting'] = I('val',0);
            $adv_m = M('adv');
            $res = $adv_m->where(array('id'=>$id))->save($val);
            $this->ajaxReturn($res);

        }else{

            $this->error('非法操作！！！！！');
        }
    }


    /**
     * 广告状态/是否新窗口打开
     */
    public function status()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            $data[ I('field') ] = $status = (I('status'))?0:1;
            $adv_m = M('adv');
            $res['res'] = $adv_m->where(array('id'=>$id))->save($data);
            $res['status'] = $status;
            $this->ajaxReturn($res);
        }else{
            $this->error('非法操作！！！');
        }
    }



    // 删除
    public function del()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            $adv_m = M('adv');
            $adv1 = $adv_m->where(array('id'=>$id))->field('img,text')->find();//查询广告图片和  文本图片
            $adv = $adv_m->where(array('id'=>$id))->delete();
            if($adv){
                @unlink('.'.$adv1['img']);
                foreach(sp_getcontent_imgs(htmlspecialchars_decode($adv1['text'])) as $v){
                    @unlink('.'.$v['src']);
                }
            }
            $this->ajaxReturn($adv);
        }else{
            $this->error('非法操作！！！！！');
        }

    }

    /**
     * 批量删除
     */
    public function deletes()
    {
        if(IS_AJAX){
            foreach(I('arr') as $v){
                if($v){
                    $strid .= $v.',';
                }
            }
            $adv_m = M('adv');
            $adv = $adv_m->where('id in ('.substr($strid,0,-1).')')->field('img,text')->select();
            $res = $adv_m->delete(substr($strid,0,-1));
            if($res){
                foreach($adv as $v){
                    @unlink('.'.$v['img']);
                    foreach(sp_getcontent_imgs(htmlspecialchars_decode($v['text'])) as $vv){
                        @unlink('.'.$vv['src']);
                    }
                }
                
            }
            $this->ajaxReturn($res);

        }else{
            $this->error('非法操作！！！！！');
        }

    }


    //上下架
    public function states()
    {
        if(IS_AJAX){
            $data['status'] = I('v',0);
            $arr =  I('arr');
            $i = 0;
            foreach($arr as $k=>$v){
                if($v && is_numeric($v)){
                    if($i > 0){
                        $sql .= ' or id = '.$v;
                    }else{
                        $sql .= 'id = '.$v;
                    }
                    $i++;
                }
            }
            $res = M('adv')->where($sql)->save($data);
            $this->ajaxReturn($res);
        }else{

            $this->error('非法操作！！！');
        }
    }



}

