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
		if (IS_POST) {
			$_POST['img'] = S('img');
			$_POST['time'] = time();
			$data = $product_m->create($datas, 1); //根据表单提交的POST数据创建数据对象
			if (!$data) {
				$erroer = $product_m->getError();
				$this->error($erroer);

			}
			// dump($data);exit;
			$res = $product_m->add($data);

			if (S('productimg')) {
				foreach (S('productimg') as $vv) {
					$data2[] = array('productid' => $res, 'img' => $vv);
				}

				M('productimg')->addAll($data2);
			}

			if ($res) {
				$this->success('操作成功');
			} else {
				$this->error('操作失败！');
			}

		} else {

			$id = I('id', 1);
			if (!is_numeric($id)) {$this->error('非法操作！！！');}
			$product = M('product')->where(array('id' => $id))->find();
			$this->assign('product', $product);
			$class = M('Classify');
			$classifys = $class->where(array('type' => 'product'))->select(); //所以分类
			$this->assign('classifys', $classifys);
			$this->ueditor('product');
			$this->display('/addproduct');

		}

	}
}