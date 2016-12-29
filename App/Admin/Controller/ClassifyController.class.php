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
               $type = 'news';
                break;
            
            default:
                $type = 'cover';
                break;
        }
        $pid = I('pid',0);
        $layer = I('layer',1);
        $classify_m = D('classify');
        $classify = $classify_m->where(array('type'=>$type,'pid'=>$pid,'layer'=>$layer))->order('sorting')->select();
        foreach($classify as &$v){
            $v['pclass'] = $classify_m->where(array('pid'=>$v['id']))->count();
        }
        $this->assign('classify',$classify);
    	$this->display('/classifylist');
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
                unset($data['url_name']);
                $res = $classify_m->save($data);
           }else{
                if(!$_POST['url_name']){$data['url_name'] = pinyin($_POST['name'],1);}
                $res = $classify_m->add($data);
           }
           if($res){
                $this->success('操作成功',U('classify/index').'?type=1');
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
            $this->ueditor('class');
            $this->assign('cid',$cid);
            $this->assign('classifys',$classifys);
            $this->assign('classify',$classify);
    		$this->display('/addclassify');
    	}
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