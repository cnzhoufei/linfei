<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController 
{


    public function index()
    {
    	$level = I('level',0);
    	if($level){
            $users = M()->query("select a.id,a.name,a.time,a.tel,a.email,a.icon,a.status,g.name as gname from __ADMIN__ as a inner join __GROUP__ as g where a.group = g.id");
    	}
    	$this->assign('users',$users);
    	$this->assign('level',$level);
    	$this->display();
    }


    public function editor()
    {
        $uid = I('get.uid',0);
        if(!is_numeric($uid)){$this->error('非法操作！！！');}
        if(session('adminuser.id')  != 1 && $uid == 1){$this->error('非法操作！！！');}
        if(session('adminuser.id')  != $uid && session('adminuser.id') != 1){$this->error('非法操作！！！');}
        $user_m = M('admin');
        if(IS_POST){
            if(empty($_POST['name'])){$this->error('用户名不能为空！');}
            if(session('adminuser.name') == 'admin'){ unset($_POST['name']);}
            if(S('icon')){
                    $_POST['icon'] = S('icon');
                    @unlink('.'.session('adminuser.icon'));
                    session('adminuser.icon',S('icon'));
                }

            $data = $user_m->create(null,1);//根据表单提交的POST数据创建数据对象
            if(!$data){
                $error = $user_m->getError();
                $this->error($error);
            }
            if($data['pwd']){
                $data = createpwd($data);
            }else{
                unset($data['pwd']);
            }
            $res = $user_m->where(array('id'=>$uid))->save($data);
            S('icon',null);
            if($res){
                $this->success('操作成功');
            }else{
                $this->error('操作失败！');
            }


    	}else{

            $group = M('group');
            $groups = $group->getField('id,name');
            $user = $user_m->where(array('id'=>$uid))->find();
            $this->assign('groups',$groups);
            $this->assign('user',$user);
    		$this->display('addadmin');
    	}
    }


    //添加管理员
    public function addadmin()
    {
        if(IS_POST){
            $admin_m = D('admin');
            if(S('icon')){$_POST['icon'] = S('icon');}
            $datas = $admin_m->datas($_POST);
            $data = $admin_m->create($datas);
            if(!$data){
                $erroer = $admin_m->getError();
                $this->error($erroer);
            }else{
                $data['addtime'] = time();
                $res = $admin_m->add($data);
                S('icon',null);
                if($res){
                $this->success('操作成功');
                }else{
                    $this->error('操作失败！');
                }
            }

        }else{
            $group = M('group');
            $groups = $group->getField('id,name');
            if(session('adminuser.id') != 1){unset($groups['1']);}
            $this->assign('groups',$groups);
            $this->display();
        }
    }

    //管理组列表
    public function grouplist()
    {
        $group = M('group');
        $grouplist = $group->select();
        $this->assign('grouplist',$grouplist);
        $this->display();
    }
    //添加管理组
    public function addgroup()
    {
            $id = I('get.id',0);
            if (!is_numeric($id) || $id == 1){$this->error('非法操作！！！');}
            $group = M('group');
        if(IS_POST){
            if(!$_POST['name']){ $this->error('组名不能为空！');}
            $_POST['permissions'] = implode(',',$_POST['permissions']);
            $data = $group->create($_POST);
            if(!$data){
                $error = $group->getError();
                $this->error($error);
            }
            if($id){
                $res = $group->where(array('id'=>$id))->save($data);
            }else{
                $data['addtime'] = time();
                $res = $group->add($data);
                
            }
            if($res){
                $this->success('操作成功');
                }else{
                    $this->error('操作失败！');
            }

        }else{
            if($id){
                $group2 = $group->where(array('id'=>$id))->find();
                $grouplist = explode(',', $group2['permissions']);
                $this->assign('grouplist',$grouplist);
                $this->assign('group',$group2['name']);

            }
            
            $this->assign('url','/Admin/User/grouplist.php');
            $this->assign('adminmenu',permissions());
            $this->display();
        }
    }




    // 删除单条
    public function del()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            if($id == 1){$this->ajaxReturn('系统管理员不得删除！');}
            if(session('adminuser.id') != 1){$this->ajaxReturn('非法操作！！！');}
            $table = I('table');
            $field = I('field');
            $article_m = M($table);
            $article1 = $article_m->where(array('id'=>$id))->field($field)->find();
            $article = $article_m->where(array('id'=>$id))->delete();
            if($article){
                if($article1['img']){
                    @unlink('.'.$article1['img']);
                }
                if($article1['text']){
                    foreach(sp_getcontent_imgs(htmlspecialchars_decode($article1['text'])) as $v){
                        @unlink('.'.$v['src']);
                    }
                }
            }
            $this->ajaxReturn($article);
        }else{
            $this->error('非法操作！！！！！');
        }

    }


}