<?php
namespace Install\Controller;
use Think\Controller;
class PublicController extends Controller 
{
   protected function _initialize()
   {
        //样式路径
        $this->assign('style','/Templates/pc/'.C('DEFAULT_THEME'));
        $this->class1();
        $this->class2();
        $this->custom();
        $this->config();

        $this->recommended();
        $this->news();
        $this->selling();
        $this->recommendeda();
        $this->recommendeds();
        $this->headlines();

   }



}