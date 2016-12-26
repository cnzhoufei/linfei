<?php
namespace Admin\Controller;
use Think\Controller;

class ProductController extends CommonController {
	public function index() {

		$product_m = M('product');
		$class = M('classify')->where(array('type' => 'product'))->getField('id,name', true);
		$this->assign('class', $class);
		$product = $product_m->select();

		$this->assign('product', $product);
		$this->display('/productlist');
	}

	public function addproduct() {

		$product_m = M('product');
		$id = I('id', 0);
		if (!is_numeric($id) || $id == 0) {$this->error('非法操作！！！');}
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
				if($res){
					@unlink('.'.$img['img']);
				}
			}else{
				$data['time'] = time();
				$data['newtime'] = time();
				$res = $product_m->add($data);
				
			}

			if (S('productimg')) {
				if($id){$productid = $id;}else{$productid = $res;}
				
				foreach (S('productimg') as $vv) {
					$data2[] = array('productid' => $productid, 'img' => $vv);
				}

				M('productimg')->addAll($data2);
				S('productimg',unll);
			}

			if ($res) {
				$this->success('操作成功');
			} else {
				$this->error('操作失败！');
			}

		} else {

			$product = M('product')->where(array('id' => $id))->find();
			$this->assign('product', $product);
			$class = M('Classify');
			$classifys = $class->where(array('type' => 'product'))->select(); //所以分类
			$productimg = M('productimg')->where(array('productid'=>$id))->select();
			$this->assign('classifys', $classifys);
			$this->assign('productimg', $productimg);
			$this->ueditor('product');
			$this->display('/addproduct');

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
}