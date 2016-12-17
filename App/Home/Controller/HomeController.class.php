<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller 
{
    public function index(){



    	$this->display('/index');
    }



    public function chanpin()
    {
    	$this->display('/chanpin');
    }
}