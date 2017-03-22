<?php
namespace Home\Controller;
use Think\Controller;
class LinFeiController extends PublicController 
{
    protected function home()
    {
        $this->pic();
        $this->friendship();
        return $this->fetch('/index');
    }

    protected function friendship()
    {
        $this->assign('friendship',M('friendship')->where(array('status'=>1))->select());
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

            $cid2 = $class->field("group_concat(id) as s")->where(array('pid'=>$tag['id'],'status'=>1))->select();//查询第二级
            // dump($cid2);exit;
            if($cid2[0]['s']){
                     $cid3 = $class->field("group_concat(id) as s")->where("pid in(".$cid2[0]['s'].") and status = 1")->select();//查询第二级
                     if($cid3[0]['s']){
                        $cid2[0]['s'] .= ',';
                     }
                     $tagid['id'] = $tag['id'].',';
            }else{
                $tagid['id'] = $tag['id'];
            }
        $cid = $tagid['id'].$cid2[0]['s'].$cid3[0]['s'];
        $count = $product_m->where("cid in(".$cid.") and status = 1")->count();
        $num = 12;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $product = $product_m->where("cid in(".$cid.") and status = 1")->order('sorting')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
                $this->related($tag['id'],'product');//相关推荐
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
            if($product){
                //查询模型表
                if($tag['m']){
                    $models = M($tag['m'].'s')->select();
                    $model = M($tag['m'])->where(array('aid'=>$product['id']))->find();
                    $this->assign('models',$models);
                    $this->assign('model',$model);
                    
                }
                //查询产品相册图片
                $product['photo'] = M('productimg')->where(array('productid'=>$product['id']))->select();
                $this->assign('product',$product);
                //上一个产品
                $pre = $product_m->field('name,title,url')->where("id < {$product['id']} and status = 1 and cid = {$product['cid']}")->find();
                $this->assign('pre',$pre);
                //下一个产品
                $next = $product_m->field('name,title,url')->where("id > {$product['id']} and status = 1 and cid = {$product['cid']}")->find();
                $this->assign('next',$next);

                $this->related($tag['id'],'product');//相关推荐
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
            $cid2 = $class->field("group_concat(id) as s")->where(array('pid'=>$tag['id'],'status'=>1))->select();//查询第二级
            if($cid2[0]['s']){
                     $cid3 = $class->field("group_concat(id) as s")->where("pid in(".$cid2[0]['s'].") and status = 1")->select();//查询第二级
                     if($cid3[0]['s']){
                        $cid2[0]['s'] .= ',';
                     }
                     $tagid['id'] = $tag['id'].',';
            }else{
                $tagid['id'] = $tag['id'];
            }
        $cid = $tagid['id'].$cid2[0]['s'].$cid3[0]['s'];
        $count = $article_m->where("cid in(".$cid.") and status = 1")->count();
        $num = 12;
        $Page       = new \Think\Pages($count,$num);
        $show       = $Page->show();
        $article = $article_m->where("cid in(".$cid.") and status = 1")->order('sorting')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->related($tag['id'],'article');//相关推荐
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
                //查询模型表
                if($tag['m']){
                    $models = M($tag['m'].'s')->select();
                    $model = M($tag['m'])->where(array('aid'=>$article['id']))->find();
                }
                //上一个文章
                $pre = $article_m->field('name,title,url')->where("id < {$article['id']} and status = 1 and cid = {$article['cid']}")->find();
                $this->assign('pre',$pre);

                //下一个文章
                $next = $article_m->field('name,title,url')->where("id > {$article['id']} and status = 1 and cid = {$article['cid']}")->find();
                $this->related($tag['id'],'article');//相关推荐
                $this->assign('next',$next);
                $this->assign('models',$models);
                $this->assign('model',$model);
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


    /**
     * 相关 产品，文章 推荐
     */
    protected function related($cid,$field)
    {
        $class = M('classify');
            $cid2 = $class->field("concat(id,',') as s")->where(array('pid'=>$cid,'status'=>1))->select();//查询第二级
            if($cid2){
                     $cid3 = $class->field("concat(id,',') as s")->where("pid in(".substr($cid2[0]['s'],0,-1).") and status = 1")->select();//查询第二级
            }
            
        $cid = $cid.','.$cid2[0]['s'].$cid3[0]['s'];
        $count = M($field)->where("cid in(".substr($cid,0,-1).") and status = 1")->count();
        $n = mt_rand(0,$count - 6);
        $related = M($field)->where("cid in(".substr($cid,0,-1).") and status = 1")->order('sorting')->order('id desc')->limit($n,6)->select();
        $this->assign('related',$related);
        
    }



    public function _empty()
    {
        $this->display('/404');
    }
}