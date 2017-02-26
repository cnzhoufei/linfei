<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller 
{
   protected function _initialize()
   {
        //样式路径
        $this->assign('style','/Templates/pc/'.C('DEFAULT_THEME'));
        $this->class1();
        $this->class2();
        $this->custom();
        $this->config();

        $this->pic();
        $this->recommended();
        $this->news();
        $this->selling();
        $this->recommendeda();
        $this->recommendeds();
        $this->headlines();

   }


   /**
    * 自定义信息
    */
   private function custom()
   {
      $custom_m = M('custom');
      $custom = $custom_m->select();
      $arr = array();
      foreach($custom as &$v){
        $arr[$v['key']] = $v['val'];
      }
      $this->assign('custom',$arr);
   }


   /**
    * 配置
    */
   private function config()
   {
      $config_m = M('config');
      $config = $config_m->find();
      $this->assign('config',$config);
   }


   /**
    * 分类 顶部
    */
   private function class1()
   {
        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,array('top'=>1),'layer'=>1))->select();
        foreach($class as &$v){
           $v[$v['id']] = $class2 = $class_m->where(array('status'=>1,array('top'=>1),'layer'=>2,'pid'=>$v['id']))->select();
           foreach($class2 as $k=>&$vv){
                $v[$v['id']][$k][$vv['id']] = $class_m->where(array('status'=>1,array('top'=>1),'layer'=>3,'pid'=>$vv['id']))->select();
           }
        }
       $this->assign('classtop',$class);
   }


   /**
    * 分类 底部
    */
   private function class2()
   {
        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,array('bottom'=>1),'layer'=>1))->select();
        foreach($class as &$v){
           $v[$v['id']] = $class2 = $class_m->where(array('status'=>1,array('bottom'=>1),'layer'=>2,'pid'=>$v['id']))->select();
           foreach($class2 as $k=>&$vv){
                $v[$v['id']][$k][$vv['id']] = $class_m->where(array('status'=>1,array('bottom'=>1),'layer'=>3,'pid'=>$vv['id']))->select();
           }
        }
       $this->assign('classtop',$class);
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
     * 推荐产品
     */
    private function recommended()
    {
        $product = M('product')->where(array('recommended'=>1,'status'=>1))->select();
        $this->assign('recommended',$product);
    }


    /**
     * 新品
     */
    private function news()
    {
        $product = M('product')->where(array('new'=>1,'status'=>1))->select();
        $this->assign('new',$product);
    }



    /**
     * 热卖
     */
    private function selling()
    {
        $product = M('product')->where(array('selling'=>1,'status'=>1))->select();
        $this->assign('selling',$product);
    }


    /**
     * 推荐
     */
    private function recommendeda()
    {
        $article = M('article')->where(array('recommended'=>1,'status'=>1))->select();
        $this->assign('recommendeda',$article);

    }


   /**
     * 特荐
     */
    private function recommendeds()
    {
        $article = M('article')->where(array('recommendeds'=>1,'status'=>1))->select();
        $this->assign('recommendeds',$article);
        
    }


    /**
     * 头条
     */
    private function headlines()
    {
        $article = M('article')->where(array('headlines'=>1,'status'=>1))->select();
        $this->assign('headlines',$article);
        
    }

}