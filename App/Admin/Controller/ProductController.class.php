<?php
namespace Admin\Controller;
use Think\Controller;

class ProductController extends CommonController 
{
	public function index()
	{
		$class = M('classify')->where(array('type' => 'product'))->getField('id,name', true);
		$this->assign('class', $class);
		$product_m = M('product');
		$count = $product_m->count();
		$Page       = new \Think\Page($count,6);
		$show       = $Page->show();
		$product = $product_m->order('sorting')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('count',$count);
		$this->assign('page',$show);
		$this->assign('product', $product);
		$this->display();
	}

	public function addproduct() 
	{
		$product_m = M('product');
		$id = I('id', 0);
		if (IS_POST) {
			if(S('img')){
				$_POST['img'] = S('img');//缩略图
			}
			$data = $product_m->create($datas, 1); //根据表单提交的POST数据创建数据对象
			if (!$data) {
				$erroer = $product_m->getError();
				$this->error($erroer);

			}
			if($id){
				$data['newtime'] = time();
				unset($data['id']);
				$img = $product_m->where(array('id'=>$id))->field('img')->find();//缩略图
				$res = $product_m->where(array('id'=>$id))->save($data);

				if($res && S('img')){
					@unlink('.'.$img['img']);
				}
			}else{
				$data['time'] = time();
				$data['newtime'] = time();
				$res = $product_m->add($data);
				
			}
			S('img',null);
			if (S('productimg')) {
				if($id){$productid = $id;}else{$productid = $res;}
				
				foreach (S('productimg') as $vv) {
					$data2[] = array('productid' => $productid, 'img' => $vv);
				}

				M('productimg')->addAll($data2);
				S('productimg',unll);
			}

			if ($res) {
				$p = $_GET['p']?'?p='.$_GET['p']:'';

				if($id){$productid2 = $id;}else{$productid2 = $res;}//当前产品id
				if($data['custom']){$name_ = $data['custom'];}else{$name_ = 'product_'.$productid2;}//当前产品名称
				$url_name = M('classify')->where(array('id'=>$data['cid']))->getField('url_name');//查询本文章栏目url_name
				$data3['url'] = '/Home/'.$url_name.'/'.$name_.'.html';
				$product_m->where(array('id'=>$productid2))->save($data3);


				//操作模型表
				$class = M('Classify');
				$m = $class->where(array('id'=>$_POST['cid']))->getField('m');
				if($m){
					$model = M($m);
					$aid = ($id)?$id:$res;
					foreach($_POST['model'] as $k=>$v){
						if(is_array($v)){
							foreach($v as $v_){
								$str_ .= $v_.',';
							}
								$data5[$k] = substr($str_, 0 ,-1);
						}else{

								$data5[$k] = $v;
						}
					}
						$data5['aid'] = $aid;
					if($model->where(array('aid'=>$aid))->find()){
						$model->where(array('aid'=>$aid))->save($data5);
					}else{
						$model->add($data5);

					}
				}
				$this->success('操作成功',U('Product/index').$p);
			} else {
				$this->error('操作失败！');
			}

		} else {
			if (!is_numeric($id)){$this->error('非法操作！！！');}
			$product = M('product')->where(array('id' => $id))->find();
			$this->assign('product', $product);
			$class = M('Classify');
			$classifys = $class->where(array('type' => 'product'))->select(); //所以分类
			$productimg = M('productimg')->where(array('productid'=>$id))->select();
			$this->assign('classifys', $classifys);
			$this->assign('productimg', $productimg);
			$this->ueditor('product');
			$this->display();

		}

	}

	/**
	 * 删除商品相册图片
	 */
	public function deleteimg()
	{
		if(IS_AJAX){
			$id = (int)I('id');
			if($id){
				$productimg_m = M('productimg');
				$img = $productimg_m->where(array('id'=>$id))->field('img')->find();
				$res = $productimg_m->where(array('id'=>$id))->delete();
				@unlink('.'.$img['img']);
				if($res){
					$this->ajaxReturn(1);
				}else{
					$this->ajaxReturn(0);
				}

			}
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
			$res = M('product')->where($sql)->save($data);
			$this->ajaxReturn($res);
		}else{

			$this->error('非法操作！！！');
		}
	}



    // 删除
    public function del()
    {
    	if(IS_AJAX){
    		$id = (int)I('id',0);
    		$product_m = M('product');
    		$product1 = $product_m->where(array('id'=>$id))->field('img,text')->find();
    		$product = $product_m->where(array('id'=>$id))->delete();
    		if($product){
    			@unlink('.'.$product1['img']);
	    		foreach(sp_getcontent_imgs(htmlspecialchars_decode($product1['text'])) as $v){
	    			@unlink('.'.$v['src']);
	    		}
	    		$productimg = M('productimg')->where(array('productid'=>$id))->select();
	    		foreach($productimg as $vv){
	    			@unlink('.'.$vv['img']);
	    			M('productimg')->where(array('id'=>$vv['id']))->delete();
	    		}
    		}
    		$this->ajaxReturn($product);
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
    		$product_m = M('product');
    		$product = $product_m->where('id in ('.substr($strid,0,-1).')')->field('img,text')->select();
    		$res = $product_m->delete(substr($strid,0,-1));
    		if($res){
    			foreach($product as $v){
    				@unlink('.'.$v['img']);
    				foreach(sp_getcontent_imgs(htmlspecialchars_decode($v['text'])) as $vv){
    					@unlink('.'.$vv['src']);
    				}
    			}
    			$productimg = M('productimg')->where(array('productid in ('.substr($strid,0,-1).')'))->select();
	    		foreach($productimg as $vvv){
	    			@unlink('.'.$vvv['img']);
	    			M('productimg')->where(array('id'=>$vvv['id']))->delete();
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
    	$product_m = M('product');
    	// if (!$product->autoCheckToken($_GET)){
    	// 	$this->error('请不要重复提交！');
    	// }
		$class = M('classify')->where(array('type' => 'product'))->getField('id,name', true);
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
    	$count = $product_m->where($where)->count();
		$Page       = new \Think\Page($count,6);
		$show       = $Page->show();
		$product = $product_m->where($where)->order('sorting')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('count',$count);
    	$this->assign('page',$show);
    	$this->assign('product',$product);
    	$this->assign('classid',I('class'));
    	$this->assign('url','/Admin/Product/index.php');
    	$this->assign('title',I('title'));
    	$this->assign('name',I('name'));
    	$this->display('index');
    }
}