<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 分类管理
 */
class ClassifyController extends CommonController 
{
	/**
	 * 分类列表
	 */
    public function index()
    {
        switch (I('type')) {
            case '1':
               $type = 'product';
                break;
            case '2':
               $type = 'article';
                break;
                case '3':
               $type = 'cover';
                break;
            
            default:
                $type = '';
                break;
        }
        $pid = I('pid',0);
        $layer = I('layer',1);
        $classify_m = D('classify');
        if(!$type){

            $classify = $classify_m->order('sorting')->select();
        }else{
            $classify = $classify_m->where(array('type'=>$type,'pid'=>$pid,'layer'=>$layer))->order('sorting')->select();
            
            // dump($classify);exit;
        }
        foreach($classify as &$v){
            $v['pclass'] = $classify_m->where(array('pid'=>$v['id']))->count();//查询是否有字类
            if($v['type'] == 'product'){$model = M('product');}elseif($v['type'] == 'article'){$model = M('article');}
            if($v['type'] != 'cover'){
            $v['product'] = $model->where(array('cid'=>$v['id']))->count();//查询分类下的文章
                
            }
                
           
        }
        $this->assign('classify',$classify);
    	$this->display();
    }


    /**
     * 添加修改分类
     */
    public function addclassify()
    {
        $classify_m = D('classify');
        if(IS_POST){
        if(!$_POST['name']){$this->error('分类名称不能为空！');}
        if(!$_POST['m_name']){$_POST['m_name'] = $_POST['name'];}
        
           $datas = $classify_m->datas($_POST);
           $data = $classify_m->create($datas,1);//根据表单提交的POST数据创建数据对象
           if(!$data){$erroer = $classify_m->getError(); $this->error($erroer);}

           if($_POST['id']){
                $urlname = $classify_m->where(array('id'=>$_POST['id']))->getField('url_name');
                $data['path'] = $data['path'].$_POST['id'];
                $res = $classify_m->save($data);
           }else{
                if(!$_POST['url_name']){$data['url_name'] = pinyin($_POST['name'],1);}
                $maxid = M()->query('select max(id) as max from '.C('DB_PREFIX').'classify');//查询最大id
                $data['path'] = $data['path'].$maxid[0]['max']+1;
                
                $res = $classify_m->add($data);
           }
           if($res){
                if($_POST['id']){
                        $res2 = $this->addclassfile($data['url_name'],2,$urlname);
                }else{
                     $res2 = $this->addclassfile($data['url_name'],1);
                     if(!$res2){
                        $classify_m->where(array('id'=>$res))->delete();
                     }
                }
                if($res2){
                    $this->success('操作成功',U('classify/index'));
                }else{
                    $this->error('操作失败！！！');
                }
           }else{
                $this->error('操作失败！！！');
           }

        }else{

            $id = I('classid');
            if($id && !is_numeric($id)){$this->error('非法操作！！！！！');}
            if($id){
                $classify = $classify_m->where('id ='.$id)->find();
                $classifys = $classify_m->where("layer != 3 and type = '".$classify['type']."'")->field(array('id','name','pid','layer','concat(path,id)'=>'bpath'))->order('bpath')->select();
            }else{

                $classifys = $classify_m->where("layer != 3 and type = 'product'")->field(array('id','name','pid','layer','concat(path,id)'=>'bpath'))->order('bpath')->select();
            }
            $m = substr(file_get_contents('./Public/model.md'),0,-1);
            $this->assign('m',explode(',', $m));
            $this->ueditor('class');
            $this->assign('cid',$cid);
            $this->assign('classifys',$classifys);
            $this->assign('classify',$classify);
    		$this->display();
    	}
    }



    protected function addclassfile($urlname,$status,$originally='')
    {
        //添加方法
         $filepath = './App/Home/Controller/HomeController.class.php';
         if(!is_writeable($filepath)){
            echo  "文件{$filepath}不可写,请修改权限!!!";  exit;
        }
        $replace = <<<zhoufei


    public function {$urlname}()
    {



        \$fieltime = filemtime('./Html/'.__SELF__);//读取文件更新时间
        if((time() - \$fieltime) > 10){
            \$data = M('classify')->where(array('url_name'=>ACTION_NAME))->find();
            \$arr = explode('/', __SELF__);//将当前url分割成数组
            //如果这个数组大于等于4 并且匹配不到list_ 证明是访问文章页
            if(count(\$arr) >= 4 && !preg_match('/list_/',__SELF__)){
                \$function = \$data['type'];
            }else{
                \$function = \$data['type'].'list';
            }
            \$str = \$this->\$function(\$data);
            \$dir = './Html/'.CONTROLLER_NAME.'/'.ACTION_NAME;//文件夹路径
            if(!file_exists(\$dir)){mkdir(\$dir,0777,true);}
            file_put_contents('./Html/'.__SELF__,\$str);
         }else{
            \$str = file_get_contents('./Html/'.__SELF__);
        }

            \$this->show(\$str);

    }
}
zhoufei;
                $subject = file_get_contents($filepath);
                if($status == 1){
                    $str = preg_replace('/\}$/', $replace, $subject,1,$count);//添加
                }else{
                    if(!preg_match("/".$originally."/",$subject)){
                        $str = preg_replace('/\}$/', $replace, $subject,1,$count);//添加
                    }else{
                        if($originally != $urlname){
                        $str = preg_replace("/".$originally."\(\)/", $urlname.'()', $subject,1,$count);//修改
                        }else{
                            return 1;
                        }
                    }
                }
                $res = file_put_contents($filepath, $str);
                return $res;

    }


    /**
     * 选择栏目模板
     */
    public function SelectTemplets()
    {
        $path = I('path');
        $tplname = I('tplname');//列表模板还是文章页模板
        $dir = showdir($path);
        $dirarr = explode('/', $path);
        foreach($dirarr as $k=>$v){
            if($k < (count($dirarr) - 1)){
                $top .= $v.'/';
            }

        }
        $this->assign('tplname',$tplname);
        $this->assign('top',substr($top,0,-1));//上级目录
        $this->assign('path',$path);//当前目录
        $this->assign('dir',$dir);//文件目录
        $this->display();

    }


    /**
     * 根据类型获取分类
     */
    public function ajaxclass()
    {
        if(IS_AJAX){
            $type = I('type','product');
            $classify_m = M('classify');
            $classifys = $classify_m->where(array('layer != 3','type'=>$type))->field(array('id','name','pid','layer','concat(path,id)'=>'bpath'))->order('bpath')->select();
            $this->ajaxReturn($classifys);

        }else{

            $this->error('非法操作！！！！！'); 
        }

    }



    /**
     * 改变状态
     */
    public function ajaxstatus()
    {
        if(IS_AJAX){
            $id = I('id',0);
            $field = I('field','i');
            $res['status'] = $status[ $field ] = (I('status') == 1)?0:1;
            $classify_m = M('classify');
            $res['res'] = $classify_m->where(array('id'=>$id))->save($status);
            $res['msg'] = ($res['status'])?'开启':'关闭';
            $this->ajaxReturn($res);
        }else{

            $this->error('非法操作！！！！!');
        }
    }


    /**
     * 排序
     */
    public function ajaxsorting()
    {
        if(IS_AJAX){
            $id = I('id',0);
            $val['sorting'] = I('val',0);
            $classify_m = M('classify');
            $res = $classify_m->where(array('id'=>$id))->save($val);
            $this->ajaxReturn($res);

        }else{

            $this->error('非法操作！！！！！');
        }
    }



    /**
     * 删除
     */
    public function ajaxdelete()
    {
        if(IS_AJAX){
            $id = (int)I('id',0);
            $classify_m = M('classify');
            $res1 = $classify_m->where(array('pid'=>$id))->find();
            if($res1){$this->ajaxReturn('有子级，不能删除！');}

            $article = M('article')->where(array('cid'=>$id))->find();
            if($article){$this->ajaxReturn('此分类还有文章不能删除！');}

            $product = M('product')->where(array('cid'=>$id))->find();
            if($product){$this->ajaxReturn('此分类还有产品不能删除！');}

            $class = $classify_m->where(array('id'=>$id))->field('text')->find();
            $res = $classify_m->where(array('id'=>$id))->delete();
            if($res){
                foreach(sp_getcontent_imgs(htmlspecialchars_decode($class['text'])) as $v){
                    @unlink('.'.$v['src']);
                }
            }
            $this->ajaxReturn($res);
        }else{
            $this->error('非法操作！！！！！');
        }
    }



    public function _empty()
    {
        $this->display('/404');
    }
}