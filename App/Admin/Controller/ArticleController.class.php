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
	 * 产品状态
	 */
	public function status()
	{
		if(IS_AJAX){
			$id = (int)I('id',0);
			$data[ I('field') ] = $status = (I('status'))?0:1;
			$articleimg_m = M('article');
			$res['res'] = $articleimg_m->where(array('id'=>$id))->save($data);
			$res['status'] = $status;
			$this->ajaxReturn($res);
		}else{
			$this->error('非法操作！！！');
		}
	}


	//上下架
	public function states()
	{
		if(IS_AJAX){
			$data['status'] = I('v',0);
			$arr =  I('arr');
			$i = 0;
			foreach($arr as $k=>$v){
				if($v && is_numeric($v)){
					if($i > 0){
						$sql .= ' or id = '.$v;
					}else{
						$sql .= 'id = '.$v;
					}
					$i++;
				}
			}
			$res = M('article')->where($sql)->save($data);
			$this->ajaxReturn($res);
		}else{

			$this->error('非法操作！！！');
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
            $classify_m = M('article');
            $res = $classify_m->where(array('id'=>$id))->save($val);
            $this->ajaxReturn($res);

        }else{

            $this->error('非法操作！！！！！');
        }
    }


    // 删除
    public function del()
    {
    	if(IS_AJAX){
    		$id = (int)I('id',0);
    		$article_m = M('article');
    		$article1 = $article_m->where(array('id'=>$id))->field('img,text')->find();
    		$article = $article_m->where(array('id'=>$id))->delete();
    		if($article){
    			@unlink('.'.$article1['img']);
	    		foreach(sp_getcontent_imgs(htmlspecialchars_decode($article1['text'])) as $v){
	    			@unlink('.'.$v['src']);
	    		}
    		}
    		$this->ajaxReturn($article);
    	}else{
    		$this->error('非法操作！！！！！');
    	}

    }

    /**
     * 批量删除
     */
    public function deletes()
    {
    	if(IS_AJAX){
    		foreach(I('arr') as $v){
    			if($v){
    				$strid .= $v.',';
    			}
    		}
    		$article_m = M('article');
    		$article = $article_m->where('id in ('.substr($strid,0,-1).')')->field('img,text')->select();
    		$res = $article_m->delete(substr($strid,0,-1));
    		if($res){
    			foreach($article as $v){
    				@unlink('.'.$v['img']);
    				foreach(sp_getcontent_imgs(htmlspecialchars_decode($v['text'])) as $vv){
    					@unlink('.'.$vv['src']);
    				}
    			}
    			
    		}
    		$this->ajaxReturn($res);

    	}else{
    		$this->error('非法操作！！！！！');
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