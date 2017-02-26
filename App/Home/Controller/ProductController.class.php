<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends PublicController 
{
    /**
     * 产品列表
     */
    public function lists()
    {
        $product_m = M('product');
        $count = $product_m->where(array('status'=>1,'cid'=>$_GET['cid']))->count();
        $Page       = new \Think\Pages($count,1);
        $show       = $Page->show();
        $product = $product_m->where(array('status'=>1,'cid'=>$_GET['cid']))->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('product', $product);
    	$this->display('/product');
    }



}