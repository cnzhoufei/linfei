<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends CommonController 
{
    public function index(){

    	$product_m = M('product');
    	$product = $product_m->select();

    	$this->assign('product',$product);

    	$this->display('/productlist');
    }



    public function addproduct()
    {

    	$product_m = M('product');
    	if(IS_POST){
    		$_POST['img'] = S('img');
    		$_POST['time'] = time();
    		$data = $product_m->create($datas,1);//根据表单提交的POST数据创建数据对象
           	if(!$data){$erroer = $product_m->getError(); $this->error($erroer);}
           	$res = $product_m->add($data);
           	if($res){
           		$this->success('操作成功');
           	}else{
           		$this->error('操作失败！');
           	}

    	}else{

    		$class = M('Classify');
    		$classifys = $class->where(array('type'=>'product'))->select();
    		$this->assign('classifys',$classifys);
            $this->ueditor('product');
	    	$this->display('/addproduct');
    		
    	}

    }
}