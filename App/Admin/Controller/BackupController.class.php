<?php
namespace Admin\Controller;
use Think\Controller;
class BackupController extends CommonController 
{
    public function index()
    {
        $back = showdir('./Data/backupdata');
        $this->assign('back',$back);
        $this->display();
    }



    /**
     * 备份前准备
     */
    public function bac()
    {
        if(IS_POST){
            if(count($_POST['tables']) > 0){
                // $site = M()->query("select concat(round(sum(data_length)/(1024*1024),2) + round(sum(index_length)/(1024*1024),2),'MB') as 'DB Size' from tables where table_schema='".C('DB_NAME')."';");
                M()->execute('FLUSH TABLES WITH READ LOCK;');//锁住所有表    
                S('backupdatatables',I('tables'));//缓存要备份的表
                S('time',date("Y-m-d-H-i-s",time()));//缓存备份时间
                mkdir('./Data/backupdata/'.S('time').'/structure',0777,true);//创建表结构目录
                mkdir('./Data/backupdata/'.S('time').'/insertinto',0777,true);//创建表数据目录
                // 开始去备份表结构
                $this->success('初始化成功!',U('structure'));
            }else{
                $this->error('最少选择一个表！');
            }
          
        }else{
            $tables = M()->query('show tables');
            foreach($tables as $v){
                foreach($v as $vv){
                    $table[] = $vv;
                }
            }
            $this->assign('tables',$table);
            $this->display();
        }
    }



    /**
     * 备份表结构
     */
    public function structure()
    {
        $i = I('i',0);
        $str = "
-- ----------------------------
-- Table structure for ".S('backupdatatables')[ $i ]."
-- ----------------------------
DROP TABLE IF EXISTS `".S('backupdatatables')[ $i ]."`;
";
        if($i < count(S('backupdatatables'))){
            $tables = S('backupdatatables')[ $i ];
            $tab = M()->query("SHOW CREATE TABLE {$tables};");//建表语句
            if($tab){
                $str .= trim($tab[0]['create table']);
                $res = file_put_contents("./Data/backupdata/".S('time')."/structure/".$tables.md5(uniqid()).".sql", $str);
                    if($res){
                        $i += 1;
                         $this->showmsg($tables.'备份成功,开始备份'.S('backupdatatables')[$i],'/Admin/Backup/structure.php?i='.$i);
                     }else{
                        $this->myexit();
                        $this->showmsg($tables.'写入文件失败！');
                     }
                    
            }else{
                $this->myexit();
                $this->showmsg($tables.'备份失败！');
            }
        }else{
                $this->showmsg('表结构备份完成，开始备份数据','/Admin/Backup/bakinsertinto.php');
        }

    }


    /**
     * 备份数据
     */
    public function bakinsertinto()
    {
        $i = I('i',0);
        $limit = I('limit',0);
        $tab = str_replace(C('DB_PREFIX'), '', S('backupdatatables')[ $i ]);
        $tabs = S('backupdatatables')[ $i ];
        $str = '
-- ----------------------------
-- Records of '.$tabs.'
-- ----------------------------
';      
        $model = M($tab);
        if($i < count(S('backupdatatables'))){
            $count = $model->count();//查询当前表数据总数
            if($count > 500){
                $data = $model->limit(($limit * 500).',500')->select();
                $limit += 1;
            }else{
                $data = $model->select();
            }
            if($data){
                foreach($data as $v){
                    $str .= "INSERT INTO `".$tabs."` VALUES ('".implode("', '",$v)."');\r\n";
                }
                $res = file_put_contents("./Data/backupdata/".S('time')."/insertinto/".$tabs.'_'.md5(uniqid()).'_'.$count."_.sql", $str);
                if($res){
                    $ii = $i;
                    if($count < 500){
                        $ii += 1;

                        $this->showmsg($tabs.'数据备份成功，开始备份'.S('backupdatatables')[ $ii ].'表数据！','/Admin/Backup/bakinsertinto.php?i='.$ii.'&limit='.$limit);
                    }else{
                        $this->showmsg($tabs.' 表数据量大正则执行分卷备份！完成第'.$limit.'卷！','/Admin/Backup/bakinsertinto.php?i='.$ii.'&limit='.$limit);
                    }
                }else{
                    $this->myexit();
                    $this->showmsg($tabs.'数据备份失败！');
                }
            }else{
                $i += 1;
                $this->showmsg($tabs.'表没有数据，开始备份'.S('backupdatatables')[ $i ].'表数据！','/Admin/Backup/bakinsertinto.php?i='.$i.'&limit=0'); 
            }
        }else{
                 S('backupdatatables',null);//缓存要备份的表
                 S('time',date("Y-m-d-H-i-s"),null);//缓存备份时间
                 M()->execute('unlock tables;');//解除锁
                $this->showmsg('备份完成！');
        }

    }


    /**
     * 显示结果
     */
    public function showmsg($msg='提示信息！',$urls='')
    {

        $this->assign('msg',$msg);
        $this->assign('urls',$urls);
        $this->assign('url','/Admin/Backup/bac.php');
        $this->display('showmsg');
    }


    protected function myexit()
    {   
         delFile('./Data/backupdata/'.S('time'));
         rmdir('./Data/backupdata/'.S('time'));
         S('backupdatatables',null);//缓存要备份的表
         S('time',date("Y-m-d-H-i-s"),null);//缓存备份时间
         M()->execute('unlock tables;');//解除锁
    }



    public function sqllist()
    {
        if(IS_POST){
                foreach($_POST['structure'] as $kx=>$vx){
                    $table_s[] = $kx;
                    $structure[] = $vx;
                }
                if(count($table_s) > 0){
                    $insertinto = I('post.insertinto');//数据文件
                    S('bakname',I('post.name'));//文件夹名
                    S('tables',$table_s);//要备份的表
                    S('structure',$structure);//表语句文件
                    //过略掉没有表语句的insertinto 语句sql
                    foreach($insertinto as $kkx=>$vvx){
                        foreach($table_s as $v_s){
                            if(preg_match("/$v_s/", $vvx)){
                               $into[] = $vvx;
                            }
                        }
                    }

                    S('insertinto',array_values(array_unique($into)));//数据sql文件 去除重复 重新从零开始
                   $this->showmsg('准备完成，开始恢复表结构！',"/Admin/Backup/mystructure.php?i=0");
                }else{
                    $this->error('请至少选择一个表');
                }


        }else{

            $tables = M()->query('show tables;');
            foreach($tables as $v){
                foreach($v as $vv){
                    $tab[]  = $vv;
                }
            }
            $tabs = str_replace(C('DB_PREFIX'),'',$tab);
            $name = I('get.name');
            if(!$name){$this->error('非法操作！');}
            $insertinto = showdir('./Data/backupdata/'.$name.'/insertinto');
            foreach($insertinto as &$vc){
                foreach($tabs as $vb){
                    if(preg_match("/{$vb}/", $vc['name'])){
                        $vc['class_name'] = $vb;
                    }
                    
                }
            }

            $structure = showdir('./Data/backupdata/'.$name.'/structure');
            foreach($structure as &$vz){
                foreach($tabs as $ve){
                    if(preg_match("/{$ve}/", $vz['name'])){
                        $vz['class_name'] = $ve;
                    }
                    
                }
            }
            $this->assign('structure',$structure);
            $this->assign('insertinto',$insertinto);
            $this->assign('name',$name);
            $this->assign('url','/Admin/Backup/index.php');
            $this->display();
        }
    }


    /**
     * 恢复表结构
     */
    public function mystructure()
    {
        $i = I('i',0);
        if($i < count(S('structure'))){

            $path = './Data/backupdata/'.S('bakname').'/structure/';
            $sql = file_get_contents($path.S('structure')[$i]);
            if(M()->execute($sql) === 0){
                $ii = $i + 1;
                $this->showmsg(S('structure')[$i].'恢复成功，开始恢复'.S('structure')[$ii],'/Admin/Backup/mystructure.php?i='.$ii);
            }else{
                $this->showmsg(S('structure')[$i].'恢复失败！');
            }
        }else{
            $this->showmsg('表结构恢复完成！看开始恢复数据！','/Admin/Backup/myinsertinto.php');
        }

    }



    public function myinsertinto()
    {
        $i = I('i',0);
        if($i < count(S('insertinto'))){

            $path = './Data/backupdata/'.S('bakname').'/insertinto/';
            $sql = file_get_contents($path.S('insertinto')[$i]);
            if(M()->execute($sql)){
                $ii = $i + 1;
                $this->showmsg(S('insertinto')[$i].'恢复成功，开始恢复'.S('insertinto')[$ii],'/Admin/Backup/myinsertinto.php?i='.$ii);
            }else{
                $this->showmsg(S('structure')[$i].'恢复失败！');

            }
        }else{
            $this->showmsg('数据恢复完成！');
        }
    }
}