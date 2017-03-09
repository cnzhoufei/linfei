<?php
namespace Admin\Controller;
use Think\Controller;
class BackupController extends CommonController 
{
    public function index()
    {



    }



    public function bac()
    {
        if(IS_POST){
            // dump($_POST);
            $tables = I('tables');
           
            $time = date("Y-m-d-H-i-s",time());
            mkdir('./Data/backupdata/'.$time,0777,true);
            foreach($tables as $v){
                system("mysqldump -uroot -p123 linfei {$v} > ./Data/backupdata/{$time}/{$v}.sql");
                
            }



        }else{
            echo '<pre>';
           print_r(M()->query('SHOW FULL COLUMNS FROM linfei_admin;'));

            // $tables = M()->query('show tables');
            // foreach($tables as $v){
            //     $table[] = $v['tables_in_linfei'];
            // }

            // $this->assign('tables',$table);

            // $this->display('/bac');
        }
    }
}