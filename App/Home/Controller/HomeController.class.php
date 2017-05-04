<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends LinFeiController 
{
    public function index()
    {

       
            $str = $this->home();
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/home/index.html',$str);
            $this->show($str);

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

   


    public function chanpinzhongxin()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);
    }


    public function xingzhengqujian()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
         

            $this->show($str);

    }


    public function gexingguanliqu()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
         

            $this->show($str);

    }


    public function chenggonganli()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
         

            $this->show($str);

    }


    public function xinwenzhongxin()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }


    public function guanyuwomen()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }


    public function gongsijianjie()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }


    public function rongyuzizhi()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }


    public function test()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }


    public function zhaoshangjiameng()
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
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,$str);
            $this->show($str);

    }
}