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
}