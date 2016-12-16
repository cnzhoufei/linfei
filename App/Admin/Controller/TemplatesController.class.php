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
		// dump($template_config);
		  // $this->assign('tpl',$tpl);      

        // $tplconfig = include("./Web/Home/Conf/tplconfig.php");        
        // $this->assign('default_theme',$tplconfig['DEFAULT_THEME']);
        $this->assign('templates',$templates);
        $this->assign('tpl','default');
        $this->display('/pclist');
        // dump($tplconfig);



   	
   }


   public function mobile()
   {
    $arr = scandir("./Templates/pc/");
         foreach($arr as $key => $val)
         {
                if($val == '.' || $val == '..' )
                    continue;                 
                 $templates[$val] = include "./Templates/pc/$val/config.php";
         }
    
        $this->assign('templates',$templates);
        $this->assign('tpl','default');
        $this->display('/pclist');
   }



   public function changeTemplate()
   {
   		$key = I('key');
   		$t = I('t','pc');

   		$tpl = ($t == 'pc')?'Home':'Mobile';

   		$str = "<?php
return array(
	
	'TMPL_FILE_DEPR'		=>		'_',				//模板链接符
	'VIEW_PATH'				=>		'./Templates/{$t}/',	//模板位置
	'DEFAULT_THEME'         =>  	'{$key}',			//模板主题
);";
	if(!is_writeable("./Web/$tpl/conf/tplconfig.php")){
            return "文件/Web/$tpl/conf/tplconfig.php不可写,不能启用魔板,请修改权限!!!";  
		
	}
   		$tplconfig = file_put_contents("./Web/$tpl/conf/tplconfig.php",$str);

   		$this->success("操作成功!!!",U('Admin/Templates/index',array('t'=>$t)));

   }



    
}

