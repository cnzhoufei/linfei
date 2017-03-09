<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller 
{
    public function _initialize()
    {
    	if(!session('adminuser')){$this->redirect('Login/index');}
    	$this->assign('adminmenu',adminmenu());
    	$this->assign('url',$_SERVER['REDIRECT_URL']);
        $this->assign('navstyle',navstyle());
        $this->navsnum();
        $this->permissions();//权限

    }


    //编辑器
    /**
    //<script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
     * 
     */
    public function ueditor($name)
    {
    	$this->assign('ueditorinit',"
    <script type='text/javascript' charset='utf-8' src='/Public/ueditor/ueditor.config.js'></script>
    <script type='text/javascript' charset='utf-8' src='/Public/ueditor/ueditor.all.min.js'> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type='text/javascript' charset='utf-8' src='/Public/ueditor/lang/zh-cn/zh-cn.js'></script>
    <script>var ue = UE.getEditor('{$name}');</script>");

    }

    public function navsnum()
    {
        $this->assign('navnum',M('config')->getField('navstyle'));
    }

    /**
     * 权限
     */
    protected function permissions()
    {
        $groupid = M('admin')->where(array('id'=>session('adminuser.id')))->getField('group');
        $group = M('group')->where(array('id'=>$groupid))->getField('permissions');
        //要排除的方法
        $arr = array('Index@index');
        if($group == 'all'){
            return true;
        }else{
            if(in_array(CONTROLLER_NAME.'@'.ACTION_NAME,$arr)){//排除方法
               return true;
            }elseif(IS_AJAX){//排除ajax请求
               return true;
            }else{
                 $group = explode(',', $group);
                 if(!in_array(CONTROLLER_NAME.'@'.ACTION_NAME, $group)){
                    $this->error('您没有操作权限!',U('Index/index'));
                 }  
            }
          
        }
    }


    
}