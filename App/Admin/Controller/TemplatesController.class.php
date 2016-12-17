<?php
namespace Admin\Controller;
use Think\Controller;
class TemplatesController extends CommonController 
{
   public function pc()
   {
		$arr = scandir("./Templates/pc/");
         foreach($arr as $key => $val)
         {
                if($val == '.' || $val == '..' )
                    continue;                 
                 $templates[$val] = include "./Templates/pc/$val/config.php";
         }
        $tplconfig = include("./App/Home/Conf/tplconfig.php");     
        $this->assign('templates',$templates);
        $this->assign('tpl',$tplconfig['DEFAULT_THEME']);
        $this->display('/pclist');



   	
   }


   public function mobile()
   {
    $arr = scandir("./Templates/mobile/");
         foreach($arr as $key => $val)
         {
                if($val == '.' || $val == '..' )
                    continue;                 
                 $templates[$val] = include "./Templates/mobile/$val/config.php";
         }
        $this->assign('templates',$templates);
        $this->assign('tpl','default');
        $this->display('/mobilelist');
   }



   public function configpc()
   {
   		$tpl = I('tpl');

   		$str = "<?php
return array(
	
	'VIEW_PATH'				=>		'./Templates/pc/',	//模板位置
	'DEFAULT_THEME'         =>  	'{$tpl}',			//模板主题
);";
	if(!is_writeable("./App/Home/conf/tplconfig.php")){
            exit("文件/Web/Home/conf/tplconfig.php不可写,不能启用魔板,请修改权限!!!");  
		
	}
   		$tplconfig = file_put_contents("./App/Home/conf/tplconfig.php",$str);

   		$this->success("操作成功",U('Admin/Templates/pc'));

   }



  public function configmobile()
   {
      $tpl = I('tpl');

      $str = "<?php
return array(
  
  'VIEW_PATH'       =>    './Templates/mobile/',  //模板位置
  'DEFAULT_THEME'         =>    '{$tpl}',     //模板主题
);";
  if(!is_writeable("./App/Mobile/conf/tplconfig.php")){
            exit("文件/Web/Mobile/conf/tplconfig.php不可写,不能启用魔板,请修改权限!!!");  
    
  }
      $tplconfig = file_put_contents("./App/Mobile/conf/tplconfig.php",$str);

      $this->success("操作成功",U('Admin/Templates/mobile'));

   }



    
}

