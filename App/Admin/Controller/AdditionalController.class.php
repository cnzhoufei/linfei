<?php
namespace Admin\Controller;
use Think\Controller;
class AdditionalController extends CommonController 
{
    public function index()
    {

       $str = file_get_contents('./Public/model.md');
       $arr = explode(',', substr($str,0,-1));
       foreach($arr as $k=>&$v){
        $tab[$k]['name']  = $v;
        $tab[$k]['names']  = C('DB_PREFIX').$v;
       }
       $this->assign('tab',$tab);
        $this->display();
    }

    public function add()
    {
        if(IS_POST){

            if(!$_POST['name'])$this->error('表名不能为空！');
            //创建表
            $tabs = M()->query("show tables");
            foreach($tabs as $k=>$v){
                foreach($v as $vv){
                $tables[] = $vv;
                }
            }
            if(in_array(C('DB_PREFIX').$_POST['name'],$tables)){
               $this->error('该表也存在！'); 
            }
            $tabname = C('DB_PREFIX').$_POST['name'];
            
            //添加模型关联表
            $sqls = "create table if not exists `{$tabname}s`(
                    `id` int unsigned not null auto_increment primary key,
                    `type` varchar(255) COMMENT '表单类型',
                    `instructions` varchar(255) COMMENT '中文说明',
                    `field` varchar(255) COMMENT '字段名称',
                    `value` varchar(255) COMMENT '值'
                    )engine=innodb default charset=utf8;";
                    $res = M()->execute($sqls);
            if($res == 0){
                $m = M($_POST['name'].'s');   
                //添加数据
                $post = $_POST;
                unset($post['name']);
                unset($post['__hash__']);
                 foreach($post as &$vv){
                        $data['type'] = $vv['type'];
                        $data['field'] = $vv['field'];
                        $data['instructions'] = $vv['instructions'];
                        $data['value'] = $vv['value'];
                        $ress = $m->add($data);
                        if(!$ress){$this->error('添加失败！');}
                        switch ($vv['type']) {
                            case 'HTML':
                                $vv['type'] = 'text';
                                break;
                            case 'radio':
                                $vv['type'] = 'tinyint(2)';
                                break;
                            case 'checkbox':
                                $vv['type'] = 'char(50)';
                                break;
                            case 'option':
                                $vv['type'] = 'tinyint(3)';
                                break;
                            
                            default:
                                $vv['type'] = $vv['type'];
                                break;
                        }
                }

                //创建模型表
                $sql = "create table if not exists `{$tabname}`(
                    `id` int unsigned not null auto_increment primary key,
                    `aid` int not null COMMENT '文章产品id',";
                foreach($post as $vvv){
                    $sql .= "`{$vvv['field']}` {$vvv['type']},";
                }
                $sql = substr($sql,0,-1);
                $sql .= ")engine=innodb default charset=utf8;";
                $tares = M()->execute($sql);
                if($tares == 0){
                    $str = file_get_contents('./Public/model.md');
                    $str .= $_POST['name'].',';
                    file_put_contents('./Public/model.md', $str);
                    $this->success('创建成功','/Admin/Additional/index.php');
                }else{
                    $this->error('创建失败！');
                }

            }else{

                $this->error('创建表失败！');
            }

        }else{

        $this->display();
            
        }

    }


    /**
     * 修改
     */
    public function modify()
    {
        C('TOKEN_ON',false);
        if(IS_POST){
        $post = $_POST;
         unset($post['name']); 
         $model = M($_POST['name'].'s');
            foreach($post as $k=>$vv){
                $data['id'] = $k;
                $data['type'] = $vv['type'];
                $data['field'] = $vv['field'];
                $data['instructions'] = $vv['instructions'];
                $data['value'] = $vv['value'];
                if($model->where(array('id'=>$k))->find()){
                    $model->save($data);
                }else{
                    $model->add($data);
                }
            }
            $datas = $model->select();
           $res = M()->query('desc '.C('DB_PREFIX').$_POST['name']);
           unset($res[ 0 ]);
           unset($res[ 1 ]);
           $res = array_values($res);
           foreach($datas as &$vd){
            switch ($vd['type']) {
                            case 'HTML':
                                $vd['type'] = 'text';
                                break;
                            case 'radio':
                                $vd['type'] = 'tinyint(2)';
                                break;
                            case 'checkbox':
                                $vd['type'] = 'char(50)';
                                break;
                            case 'option':
                                $vd['type'] = 'tinyint(3)';
                                break;
                            
                            default:
                                $vd['type'] = $vd['type'];
                                break;
                        }
           }
           $tbname = C('DB_PREFIX').$_POST['name'];
           foreach($datas as $kk=>$vvv){
                if(isset($res[ $kk ])){
                    if($vvv['type'] != $res[ $kk ]['type']){
                        //修改字段类型
                        M()->execute("alter table `{$tbname}` modify `{$vvv['field']}` {$vvv['type']};");
                    }else if($vvv['field'] != $res[ $kk ]['field']){
                        //修改字段名称
                        M()->execute("alter table `{$tbname}` change {$res[$kk]['field']} {$vvv['field']} {$vvv['type']};");
                    }
                }else{

                    M()->execute("alter table `{$tbname}` add `{$vvv['field']}` {$vvv['type']};");
                }
           }

           $this->success();

        }else{
            $tab = I('tab',0);
            $data = M($tab.'s')->select();
            $this->assign('data',$data);
            $this->display();
        }

    }


    public function _empty()
    {
    	$this->display('Public/404');
    }
}