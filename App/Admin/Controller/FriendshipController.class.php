<?php
namespace Admin\Controller;
use Think\Controller;
class FriendshipController extends CommonController 
{
	/**
	 * 友情链接列表
	 */
    public function index()
    {
    	$friendship_m = M('friendship');
        $count = $friendship_m->count();
        $Page       = new \Think\Page($count,6);
        $show       = $Page->show();
        $friendship = $friendship_m->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('friendship',$friendship);
    	$this->display();
    }



    /**
     * 添加友情链接
     */
    public function addfriendship()
    {
    	$friendship_m = M('friendship');
    	$id = I('id');
    	if(IS_POST){
            $data = $friendship_m->create($_POST,1);//根据表单提交的POST数据创建数据对象
    		if($id){
    			if(S('friendshipimg')){
    				$img = $friendship_m->where(array('id'=>$id))->getField('img');
    				if($img){@unlink('.'.$img);}
    				$data['img'] = S('friendshipimg');
    			}
    			$res = $friendship_m->where(array('id'=>$id))->save($data);
    		}else{
	    		$data['img'] = S('friendshipimg');
	    		$data['addtime'] = time();
            	$res = $friendship_m->add($data);
    			
    		}
            if(!$data){$friendship_m->getError();}
           S('friendshipimg',null);
            if($res){

            	$this->success('操作成功',U('friendship/index'));
            }else{
            	$this->error('操作失败！');
            }

    	}else{
    		$friendship = $friendship_m->where(array('id'=>$id))->find();
    		$this->assign('friendship',$friendship);
    		$this->display();
    	}
    }






    public function _empty()
    {
    	$this->display('Public/404');
    }
}