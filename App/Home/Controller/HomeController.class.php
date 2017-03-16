<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends LinFeiController 
{
    public function index()
    {
        $fieltime = filemtime('./Html/home/index.html');//读取文件更新时间
        if((time() - $fieltime) > C('HTMLTIME') || !file_exists('./Html/home/index.html')){
            $str = $this->home();
            $dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            file_put_contents('./Html/home/index.html',$str);
        }else{
            $str = file_get_contents('./Html/home/index.html');
        }

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
        $fieltime = filemtime('./Html/'.__SELF__);//读取文件更新时间
        if((time() - $fieltime) > C('HTMLTIME')){
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
         }else{
            
            $str = file_get_contents('./Html/'.__SELF__);
        }

            $this->show($str);
    }


    public function xingzhengqujian()
    {
        $fieltime = filemtime('./Html/'.__SELF__);//读取文件更新时间
        if((time() - $fieltime) > C('HTMLTIME')){
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
         }else{
            
            $str = file_get_contents('./Html/'.__SELF__);
        }

            $this->show($str);

    }


    public function gexingguanliqu()
    {
       $fieltime = filemtime('./Html/'.__SELF__);//读取文件更新时间
        if((time() - $fieltime) > C('HTMLTIME')){
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
         }else{
            
            $str = file_get_contents('./Html/'.__SELF__);
        }

            $this->show($str);

    }


    public function chenggonganli()
    {
       $fieltime = filemtime('./Html/'.__SELF__);//读取文件更新时间
        if((time() - $fieltime) > C('HTMLTIME')){
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
         }else{
            
            $str = file_get_contents('./Html/'.__SELF__);
        }

            $this->show($str);

    }
}