<?php
namespace Admin\Controller;
use Think\Controller;
class PicController extends CommonController 
{
	/**
	 * 轮播图列表
	 */
    public function index()
    {
    	$pic_m = M('pic');
        $count = $pic_m->count();
        $Page       = new \Think\Page($count,6);
        $show       = $Page->show();
        $pic = $pic_m->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('pic',$pic);
    	$this->display();
    }



    /**
     * 添加轮播图
     */
    public function addpic()
    {
    	$pic_m = M('pic');
    	$id = I('id');
    	if(IS_POST){
            $data = $pic_m->create($_POST,1);//根据表单提交的POST数据创建数据对象
    		if($id){
    			if(S('picimg')){
    				$img = $pic_m->where(array('id'=>$id))->getField('img');
    				if($img){@unlink('.'.$img);}
    				$data['img'] = S('picimg');
    			}
    			$res = $pic_m->where(array('id'=>$id))->save($data);
    		}else{
	    		$data['img'] = S('picimg');
	    		$data['addtime'] = time();
            	$res = $pic_m->add($data);
    			
    		}
            if(!$data){$pic_m->getError();}
            S('picimg',null);
            if($res){

            	$this->success('操作成功',U('Pic/index'));
            }else{
            	$this->error('操作失败！');
            }

    	}else{
    		$pic = $pic_m->where(array('id'=>$id))->find();
    		$this->assign('pic',$pic);
    		$this->display();
    	}
    }




   



    public function _empty()
    {
    	$this->display('Public/404');
    }
}