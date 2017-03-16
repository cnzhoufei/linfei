<?php
namespace Home\Controller;
use Think\Controller;
class LinFeiController extends PublicController 
{
    protected function home()
    {
        $this->pic();
    	return $this->fetch('/index');
    }




    /**
     *轮播图
     */
    private function pic()
    {
        $pic_m = M('pic');
        $pic = $pic_m->where(array('status'=>1))->select();
        $this->assign('pic',$pic);
    }




    /**
     * 产品列表
     */
    protected function productlist($tag)
    {
        if(!$tag['id']){$this->_empty();}
        $product_m = M('product');
        $class = M('classify');
            $cid2 = $class->field("concat(id,',') as s")->where(array('pid'=>$tag['id'],'status'=>1))->select();//查询第二级
            if($cid2){
                     $cid3 = $class->field("concat(id,',') as s")->where("pid in(".substr($cid2[0]['s'],0,-1).") and status = 1")->select();//查询第二级
            }
            
        $cid = $tag['id'].','.$cid2[0]['s'].$cid3[0]['s'];
            
        $count = $product_m->where("cid in(".substr($cid,0,-1).") and status = 1")->count();
        $num = 1;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $product = $product_m->where("cid in(".substr($cid,0,-1).") and status = 1")->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
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
        if(!$tag['id']){$this->_empty();}
        $article_m = M('article');
        $class = M('classify');
            $cid2 = $class->field("concat(id,',') as s")->where(array('pid'=>$tag['id'],'status'=>1))->select();//查询第二级
            if($cid2){
                     $cid3 = $class->field("concat(id,',') as s")->where("pid in(".substr($cid2[0]['s'],0,-1).") and status = 1")->select();//查询第二级
            }
            
        $cid = $tag['id'].','.$cid2[0]['s'].$cid3[0]['s'];
        $count = $article_m->where("cid in(".substr($cid,0,-1).") and status = 1")->count();
        $num = 12;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $article = $article_m->where("cid in(".substr($cid,0,-1).") and status = 1")->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
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