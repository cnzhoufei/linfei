<?php
namespace Install\Controller;
use Think\Controller;
class IndexController extends Controller 
{
   protected function _initialize()
   {
      if(file_exists(__DIR__.'/install.txt')){
        die('你也安装，如果要重新安装，请删除/App/Install/Controller/install.txt');
      }

   }

   public function index()
   {
       $this->display();
   }

   protected function data($post)
   {
        if(!$_POST['ip']){die('数据库地址不能为空！');}
        if(!$_POST['name']){die('数据库名不能为空！');}
        if(!$_POST['root']){die('数据库用户名不能为空！');}
   }


   public function init()
   {  
        if(I('get.anzhuang') != '1'){$this->redirect('index');}
          if(IS_POST){
              $this->data($_POST);
             mysqli_connect($_POST['ip'],$_POST['root'],$_POST['password'],'mysql') or die('数据库链接失败！');
            
              $installpath = './App/Install/conf/dbconfig.php';

            $db = "<?php
            return array(

               'DB_TYPE'                =>      'mysql',                         // 数据库类型
               'DB_HOST'                =>      '".$_POST['ip']."',                  // 服务器地址
               'DB_NAME'                =>      'mysql',                     // 数据库名
               'DB_USER'                =>      '".$_POST['root']."',                          // 用户名
               'DB_PWD'                 =>      '".$_POST['password']."',                      // 密码
               'DB_PREFIX'              =>      '".$_POST['prefix']."',                    // 数据库表前缀
            );
            ";
            if(file_put_contents($installpath, $db)){
                $this->showmsg('初始化完成',"/Install/Index/database.php?ip={$_POST['ip']}&name={$_POST['name']}&root={$_POST['root']}&password={$_POST['password']}&prefix={$_POST['prefix']}&data={$_POST['data']}");
            }else{
               if(!is_writeable($installpath)){
                exit("文件{$installpath}不可写,请修改权限!!!");  
                }
            }


          }else{

            $this->display();
          }

   }

   //创库
   public function database()
   {
            $data = I('get.');
            $db = "<?php
            return array(

               'DB_TYPE'                =>      'mysql',                         // 数据库类型
               'DB_HOST'                =>      '".$data['ip']."',                  // 服务器地址
               'DB_NAME'                =>      '".$data['name']."',                     // 数据库名
               'DB_USER'                =>      '".$data['root']."',                          // 用户名
               'DB_PWD'                 =>      '".$data['password']."',                      // 密码
               'DB_PREFIX'              =>      '".$data['prefix']."',                    // 数据库表前缀
            );
            ";
            $homepath  = './App/Home/conf/dbconfig.php';
            $adminpath = './App/Admin/conf/dbconfig.php';
            $installpath = './App/Install/conf/dbconfig.php';
            M()->execute("create database if not exists `{$data['name']}`;");
            if(file_put_contents($homepath, $db) && file_put_contents($adminpath, $db) && file_put_contents($installpath, $db)){

              $this->showmsg('创建数据库成功,开始创建表',"/Install/Index/table.php?prefix=".$data['prefix']."&i=0&data=".$data['data']);

            }else{
                if(!is_writeable($homepath)){
                exit("文件{$homepath}不可写,请修改权限!!!");  
                }
                if(!is_writeable($adminpath)){
                exit("文件{$adminpath}不可写,请修改权限!!!");  
                }

            }
   }

   //创建表
   public function table()
   {
                $prefix = I('prefix');
                $dir = './Data/LinFei';
                $i = I('i');
                $data = I('data');
                $linfeisql = showsql($dir);
                if(count($linfeisql) > $i){
                    $str = file_get_contents($dir.'/'.$linfeisql[ $i ]);
                    $sql = str_replace('linfei_', $prefix, $str);
                    M()->execute($sql);
                    $i += 1;
                    $this->showmsg(substr($linfeisql[ $i-1 ],0,-4).'创建完成,创建'.substr($linfeisql[ $i ],0,-4),"/Install/Index/table.php?prefix=".$prefix."&i=".$i."&data=".$data);
             }else{
                if($data){
                  $this->showmsg('创建数据',"/Install/Index/datas.php?prefix=".$prefix."&i=0&data=".$data);
                }else{
                  file_put_contents('./App/Install/conf/dbconfig.php','<?php ?>');
                  file_put_contents(__DIR__.'/install.txt', '安装完成');
                  $this->showmsg('安装完成<a href="/Admin/Login/index.php">登录后台</a>');
                  
                }
             }


    }

    //创建数据
    public function datas()
    {

                $prefix = I('prefix');
                $dir = './Data/LinFeidata';
                $i = I('i');
                $linfeisql = showsql($dir);
                if(count($linfeisql) > $i){
                    $str = file_get_contents($dir.'/'.$linfeisql[ $i ]);
                    $sql = str_replace('linfei_', $prefix, $str);
                    M()->execute($sql);
                    $i += 1;
                    $this->showmsg(substr($linfeisql[ $i-1 ],0,-4).'数据创建完成,正则为'.substr($linfeisql[ $i ],0,-4).'创建数据',"/Install/Index/datas.php?prefix=".$prefix."&i=".$i);
             }else{
                
                  file_put_contents('./App/Install/conf/dbconfig.php','<?php ?>');
                  file_put_contents(__DIR__.'/install.txt', '安装完成');
                  $this->showmsg('安装完成<a href="/Admin/Login/index.php">登录后台</a>');
                  
             }

    }



    public function connect()
    {
      $ip = I('ip');
      $root = I('root');
      $password = I('password');
      mysqli_connect($ip,$root,$password,'mysql') or die('数据库链接失败！');
      $data['i'] = 1;
      $data['msg'] = '数据库链接成功';
      $this->ajaxReturn($data);
    }


    public function showmsg($msg,$url=null)
    {
      $this->assign('url',$url);
      $this->assign('msg',$msg);
      $this->display('showmsg');
    }
}