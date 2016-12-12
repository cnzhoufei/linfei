<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller 
{
    public function _initialize()
    {
    	if(!session('adminuser')){$this->redirect('Login/login');}
    	// $this->assign('nav',getcolumn());
    }
}