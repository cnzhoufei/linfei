<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController 
{
    public function index()
    {
    	
    }


    /**
     * 清除缓存
     */
    public function recycling()
    {
        $adv_thumb = './Uploads/thumb/admin/adv';
        $product_thumb = './Uploads/thumb/admin/product';
        $article_thumb = './Uploads/thumb/admin/article';
        $AppRuntimeCache = './App/Runtime/Cache';
        if(is_writeable($product_thumb) && 
            is_writeable($article_thumb) && 
            is_writeable($AppRuntimeCache) &&
            is_writeable($adv_thumb)

            ){
            delFile($product_thumb);
            delFile($article_thumb);
            delFile($AppRuntimeCache);
            delFile($adv_thumb);
        }else{
            $this->success('没有目录权限，无法清除缓存');
        }

        $this->success('成功清除缓存');
    }


    /**
     * 改变状态 0和1切换
     */
    public function status()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            $data[ I('field') ] = $status = (I('status'))?0:1;
            $table = I('table');
            $adv_m = M($table);
            $res['res'] = $adv_m->where(array('id'=>$id))->save($data);
            $res['status'] = $status;
            $this->ajaxReturn($res);
        }else{
            $this->error('非法操作！！！');
        }

    }

    /**
     * 状态 批量操作
     */
    public function states()
    {
        if(IS_AJAX){
            $data[ I('field') ] = I('v',0);
            $table = I('table');
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
            $res = M($table)->where($sql)->save($data);
            $this->ajaxReturn($res);
        }else{

            $this->error('非法操作！！！');
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
            $table = I('table');
            $adv_m = M($table);
            $res = $adv_m->where(array('id'=>$id))->save($val);
            $this->ajaxReturn($res);

        }else{

            $this->error('非法操作！！！！！');
        }
    }



    // 删除单条
    public function del()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            $table = I('table');
            $field = I('field');
            $article_m = M($table);
            $article1 = $article_m->where(array('id'=>$id))->field($field)->find();
            $article = $article_m->where(array('id'=>$id))->delete();
            if($article){
                if($article1['img']){
                    @unlink('.'.$article1['img']);
                }
                if($article1['text']){
                    foreach(sp_getcontent_imgs(htmlspecialchars_decode($article1['text'])) as $v){
                        @unlink('.'.$v['src']);
                    }
                }
            }
            $this->ajaxReturn($article);
        }else{
            $this->error('非法操作！！！！！');
        }

    }

    /**
     * 批量删除
     */
    public function dels()
    {
        if(IS_AJAX){
            foreach(I('arr') as $v){
                if($v){
                    $strid .= $v.',';
                }
            }
            $table = I('table');
            $field = I('field');
            $article_m = M($table);
            $article = $article_m->where('id in ('.substr($strid,0,-1).')')->field($field)->select();
            $res = $article_m->delete(substr($strid,0,-1));
            if($res){
                foreach($article as $v){
                    if($v['img']){
                        @unlink('.'.$v['img']);
                        
                    }

                    if($v['text']){
                        foreach(sp_getcontent_imgs(htmlspecialchars_decode($v['text'])) as $vv){
                            @unlink('.'.$vv['src']);
                        }
                    }
                }
                
            }
            $this->ajaxReturn($res);

        }else{
            $this->error('非法操作！！！！！');
        }

    }

    //修改密码
    public function updatepwd()
    {
        
    }



    public function _empty()
    {
        $this->display('Public/404');
    }


}