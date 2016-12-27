<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller 
{
    public function index(){

    	$product = M('product')->select();
    	$this->assign('product',$product);
    	// dump($product);


    	$this->display('/index');
    }



    public function chanpin()
    {
    	$this->display('/chanpin');
    }
}