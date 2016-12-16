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



    	$this->display('/classifylist');
    }


    /**
     * 添加分类
     */
    public function addclassifylist()
    {

    	if(IS_POST){


    	}else{


    		$this->display('/addclassifylist');
    	}
    }
}