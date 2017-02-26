<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends LinFeiController 
{
    public function index()
    {
    	$product = M('article')->select();
    	$this->assign('product',$product);
        $this->display('/index');
    }








    public function gujiananli()
    {
        $data = M('classify')->where(array('url_name'=>ACTION_NAME))->find();
        $arr = explode('/', __SELF__);//将当前url分割成数组
        //如果这个数组大于等于4 并且匹配不到list_ 证明是访问文章页
        if(count($arr) >= 4 && !preg_match('/list_/',__SELF__)){
            $function = $data['type'];
        }else{
            $function = $data['type'].'list';
        }
        $str = $this->$function($data);
        // $dir = './'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
        // if(!file_exists($dir)){mkdir($dir,0777,true);}
        // file_put_contents('.'.__SELF__,$str);
        $this->show($str);

    }

    public function gujianwenhua()
    {
         $data = M('classify')->where(array('url_name'=>ACTION_NAME))->find();
        $arr = explode('/', __SELF__);//将当前url分割成数组
        //如果这个数组大于等于4 并且匹配不到list_ 证明是访问文章页
        if(count($arr) >= 4 && !preg_match('/list_/',__SELF__)){
            $function = $data['type'];
        }else{
            $function = $data['type'].'list';
        }
        $str = $this->$function($data);
        // $dir = './'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
        // if(!file_exists($dir)){mkdir($dir,0777,true);}
        // file_put_contents('.'.__SELF__,$str);
        $this->show($str);
    }

    public function lianxiwomen()
    {
          $data = M('classify')->where(array('url_name'=>ACTION_NAME))->find();
        $arr = explode('/', __SELF__);//将当前url分割成数组
        //如果这个数组大于等于4 并且匹配不到list_ 证明是访问文章页
        if(count($arr) >= 4 && !preg_match('/list_/',__SELF__)){
            $function = $data['type'];
        }else{
            $function = $data['type'].'list';
        }
        $str = $this->$function($data);
        // $dir = './'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
        // if(!file_exists($dir)){mkdir($dir,0777,true);}
        // file_put_contents('.'.__SELF__,$str);
        $this->show($str);
    }


    public function _empty()
    {
        $this->display('/404');
    }
}