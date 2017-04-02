<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller 
{
   protected function _initialize()
   {
          //网站状态
        if(!M('config')->getField('status'))
          $this->clicks();//点击量
          //如果文件时间小于缓存时间就直接输出静态页面
         if(__SELF__ == '/'){$path = "./Html/Home/index.html";}else{$path = './Html/'.__SELF__;}
         $fieltime = filemtime($path);//读取文件更新时间
          if((time() - $fieltime) < C('HTMLTIME')){
            $str = file_get_contents($path);
            $this->show($str);exit;
          }

        //样式路径
        $this->assign('style','/Templates/Pc/'.C('DEFAULT_THEME'));
        $this->classtop();//顶部分类
        $this->classbottom();//底部分类
        $this->productclass();//产品分类
        $this->articleclass();//文章分类
        $this->custom();
        $this->config();
        $this->recommended();
        $this->news();
        $this->selling();
        $this->recommendeda();
        $this->recommendeds();
        $this->headlines();
        $this->position();

   }


   //点击量
   private function clicks()
   {
        
          $arr = explode('/', __SELF__);//将当前url分割成数组
          //如果这个数组大于等于4 并且匹配不到list_ 证明是访问文章页
          if(count($arr) >= 4 && !preg_match('/list_/',__SELF__)){
            //查看访问的是产品还是文章
            $class = M('classify')->where(array('url_name'=>ACTION_NAME))->getField('type');
            if($class == 'product'){
              $id = str_replace('product_', '', pathinfo(__SELF__)['filename']);
              M('product')->where("id = {$id} or custom = {$id}")->setInc('clicks',1);
            }elseif($class == 'article'){
              $id = str_replace('article_', '', pathinfo(__SELF__)['filename']);
              M('article')->where("id = {$id} or custom = {$id}")->setInc('clicks',1);
            }

        }
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
    * 产品分类 
    */
   private function productclass()
   {
        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,'layer'=>1,'type'=>'product','bottom'=>1))->select();
        foreach($class as &$v){
           $v['son'] = $class2 = $class_m->where(array('status'=>1,'layer'=>2,'pid'=>$v['id'],'type'=>'product','bottom'=>1))->select();
           foreach($class2 as $k=>&$vv){
                $v['son'][$k]['grandson'] = $class_m->where(array('status'=>1,'layer'=>3,'pid'=>$vv['id'],'type'=>'product','bottom'=>1))->select();
           }
        }

       $this->assign('productclass',$class);


   }

   /**
    * 文章分类 
    */
   private function articleclass()
   {

        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,'layer'=>1,'type'=>'article'))->select();
        foreach($class as &$v){
           $v['son'] = $class2 = $class_m->where(array('status'=>1,'layer'=>2,'pid'=>$v['id'],'type'=>'article'))->select();
           foreach($class2 as $k=>&$vv){
                $v['son'][$k]['grandson'] = $class_m->where(array('status'=>1,'layer'=>3,'pid'=>$vv['id'],'type'=>'article'))->select();
           }
        }

       $this->assign('articleclass',$class);


   }



   /**
    * 分类 顶部
    */
   private function classtop()
   {
        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,'top'=>1,'layer'=>1))->select();
        foreach($class as &$v){
           $v['son'] = $class2 = $class_m->where(array('status'=>1,'top'=>1,'layer'=>2,'pid'=>$v['id']))->select();
           foreach($class2 as $k=>&$vv){
                $v['son'][$k]['grandson'] = $class_m->where(array('status'=>1,array('top'=>1),'layer'=>3,'pid'=>$vv['id']))->select();
           }
        }
        // echo '<pre>';
        // print_r($class);exit;
       $this->assign('classtop',$class);
   }


   /**
    * 分类 底部
    */
   private function classbottom()
   {
        $class_m = M('classify');
        $class = $class_m->where(array('status'=>1,'bottom'=>1,'layer'=>1))->select();
        foreach($class as &$v){
           $v['son'] = $class2 = $class_m->where(array('status'=>1,'bottom'=>1,'layer'=>2,'pid'=>$v['id']))->select();
           foreach($class2 as $k=>&$vv){
                $v['son'][$k]['grandson'] = $class_m->where(array('status'=>1,array('bottom'=>1),'layer'=>3,'pid'=>$vv['id']))->select();
           }
        }
       $this->assign('classbottom',$class);
   }



    /**
     * 推荐产品
     */
    private function recommended()
    {
        $product = M('product')->where(array('recommended'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('recommended',$product);
    }


    /**
     * 新品
     */
    private function news()
    {
        $product = M('product')->where(array('new'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('new',$product);
    }



    /**
     * 热卖
     */
    private function selling()
    {
        $product = M('product')->where(array('selling'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('selling',$product);
    }


    /**
     * 推荐
     */
    private function recommendeda()
    {
        $article = M('article')->where(array('recommended'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('recommendeda',$article);

    }


   /**
     * 特荐
     */
    private function recommendeds()
    {
        $article = M('article')->where(array('recommendeds'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('recommendeds',$article);
        
    }


    /**
     * 头条
     */
    private function headlines()
    {
        $article = M('article')->where(array('headlines'=>1,'status'=>1))->order('sorting,id desc')->select();
        $this->assign('headlines',$article);
        
    }



    private function position()
    {
      $str = "<a href='http://{$_SERVER['HTTP_HOST']}'>首页</a> &gt; ";

      $class = M('classify')->field('pid,name,url')->where(array('url_name'=>ACTION_NAME))->find();
      $class1 = M('classify')->field('pid,name,url')->where(array('id'=>$class['pid']))->find();
      if($class1){
        $str .= "<a href='{$class1['url']}'>{$class1['name']}</a> &gt; ";
      }

      $str .= "<a href='{$class['url']}'>{$class['name']}</a> ";
      $this->assign('position',$str);
    }

}