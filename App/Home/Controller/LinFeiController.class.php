<?php
namespace Home\Controller;
use Think\Controller;
class LinFeiController extends PublicController 
{
    public function index()
    {

    	$product = M('article')->select();
    	$this->assign('product',$product);
        

        $this->display('/index');
    	// return $this->fetch('/'.$t);
    }



    /**
     * 产品列表
     */
    protected function productlist($tag)
    {
        $product_m = M('product');
        $count = $product_m->where(array('status'=>1,'cid'=>$tag['id']))->count();
        $num = 5;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $product = $product_m->where(array('status'=>1,'cid'=>$tag['id']))->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $show = str_replace('list/', 'list_', $show);
        $this->assign('page',$show);
        $this->assign('product', $product);
        $this->assign('productlist',$tag);
       return $this->fetch("/{$tag['tpl']}");
    }

    /**
     * 产品页
     */
    protected function product($tag)
    {
        $id = str_replace('product_', '', pathinfo(__SELF__)['filename']);
        if($id){
            $where['id']  = $id;
            $where['custom']  = $id;
            $where['_logic'] = 'or';
            $map['_complex'] = $where;
            $map['cid']  = array('eq',$tag['id']);
            $map['status']  = array('eq',1);
            $product_m = M('product');
            $product = $product_m->where($map)->find();
            // dump($tag);exit;
            if($product){
                $this->assign('product',$product);
                $this->assign('productlist',$tag);
                return $this->fetch("/{$tag['tpl2']}");
            }else{
                $this->_empty();exit;
            }
        }else{

            $this->_empty();exit;
        }
    }


     /**
     * 文章列表
     */
    protected function articlelist($tag)
    {
        $article_m = M('article');
        $count = $article_m->where(array('status'=>1,'cid'=>$tag['id']))->count();
        $num = 5;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $article = $article_m->where(array('status'=>1,'cid'=>$tag['id']))->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $show = str_replace('list/', 'list_', $show);
        $this->assign('page',$show);
        $this->assign('articlelist',$tag);
        $this->assign('article', $article);
       return $this->fetch("/{$tag['tpl']}");
    }


    /**
     * 文章页
     */
    protected function article($tag)
    {
        $id = str_replace('article_', '', pathinfo(__SELF__)['filename']);
        if($id){
            $where['id']  = $id;
            $where['custom']  = $id;
            $where['_logic'] = 'or';
            $map['_complex'] = $where;
            $map['cid']  = array('eq',$tag['id']);
            $map['status']  = array('eq',1);
            $article_m = M('article');
            $article = $article_m->where($map)->find();
            if($article){
                $this->assign('article',$article);
                $this->assign('articlelist',$tag);
                return $this->fetch("/{$tag['tpl2']}");
            }else{
                $this->_empty();exit;
            }
        }else{

            $this->_empty();exit;
        }
    }

    /**
     * 单页
     */
    protected function coverlist($tag)
    {
        $this->assign('coverlist',$tag);
        return $this->fetch("/{$tag['tpl']}");

    }



    public function _empty()
    {
        $this->display('/404');
    }
}