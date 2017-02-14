<?php
namespace Admin\Controller;
use Think\Controller;

class ArticleController extends CommonController 
{
	public function index()
	{
		$class = M('classify')->where(array('type' => 'news'))->getField('id,name', true);
		$this->assign('class', $class);
		$article_m = M('article');
		$count = $article_m->count();
		$Page       = new \Think\Page($count,6);
		$show       = $Page->show();
		$article = $article_m->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('count',$count);
		$this->assign('page',$show);
		$this->assign('article', $article);
		$this->display('/articlelist');
	}

	public function addarticle() 
	{
		$article_m = M('article');
		$id = I('id', 0);
		if (IS_POST) {
			if(S('img')){
				$_POST['img'] = S('img');//缩略图
			}
			$data = $article_m->create($datas, 1); //根据表单提交的POST数据创建数据对象
			if (!$data) {
				$erroer = $article_m->getError();
				$this->error($erroer);

			}
			if($id){
				$data['newtime'] = time();
				unset($data['id']);
				$img = $article_m->where(array('id'=>$id))->field('img')->find();//缩略图
				$res = $article_m->where(array('id'=>$id))->save($data);
				if($res && S('img')){
					@unlink('.'.$img['img']);
				}
			}else{
				$data['time'] = time();
				$data['newtime'] = time();
				$res = $article_m->add($data);
				
			}
			S('img',null);
			
			if ($res) {
				$this->success('操作成功',U('article/index'));
			} else {
				$this->error('操作失败！');
			}

		} else {
			if (!is_numeric($id)){$this->error('非法操作！！！');}
			$article = M('article')->where(array('id' => $id))->find();
			$this->assign('article', $article);
			$class = M('Classify');
			$classifys = $class->where(array('type' => 'news'))->select(); //所以分类
			$this->assign('classifys', $classifys);
			$this->ueditor('article');
			$this->display('/addarticle');

		}

	}

	

    /**
     * 搜索
     */
    public function search()
    {
    	$article_m = M('article');
    	// if (!$article->autoCheckToken($_GET)){
    	// 	$this->error('请不要重复提交！');
    	// }
		$class = M('classify')->where(array('type' => 'news'))->getField('id,name', true);
		$this->assign('class', $class);
		if(I('name')){
    		$where['name']  = array('like', '%'.I('name').'%');
		}
		if(I('title')){
    		$where['title']  = array('like','%'.I('title').'%');
		}
    	$where['_logic'] = 'or';
    	if(I('class')){
    	if(I('name') || I('title')){
    		$map['_complex'] = $where;
    	}
    	$map['cid']  = array('eq',I('class'));
    	$where = $map;

    	}
    	$count = $article_m->where($where)->count();
		$Page       = new \Think\Page($count,6);
		$show       = $Page->show();
		$article = $article_m->where($where)->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('count',$count);
    	$this->assign('page',$show);
    	$this->assign('article',$article);
    	$this->assign('classid',I('class'));
    	$this->assign('title',I('title'));
    	$this->assign('name',I('name'));
    	$this->display('/articlelist');
    }
}