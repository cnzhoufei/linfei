<?php
namespace Admin\Controller;
use Think\Controller;
class UploadsController extends CommonController 
{
    

	public function uploads()
    {

        if(IS_POST){

             $upload = new \Think\Upload();// 实例化上传类    
             $upload->maxSize   =     3145728 ;// 设置附件上传大小    
             $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
             $upload->savePath  =      ''; // 设置附件上传目录    // 上传文件     
             $info   =   $upload->upload();  
             if(!$info) {// 上传错误提示错误信息        
             $this->error($upload->getError());    
             }else{// 上传成功   

             	if($_GET['num'] == 1){
             		S($_GET['name'],'/Uploads/'.$info[0]['savepath'].$info[0]['savename'],300);
             	}else{

	             	$filepath = array();     
	               	foreach($info as $v){

	               		$filepath[] = '/Uploads/'.$v['savepath'].$v['savename'];
	               	}

	               S($_GET['name'],$filepath,300);
             		
             	}
            }

        }else{

        	$num = I('num',0);//上传图片数量
        	$name = I('name');//图片字段名
        	$id = I('id');//立即显示图片都容器id
        	$this->assign('id',$id);
        	$this->assign('num',$num);
        	$this->assign('name',$name);
            $this->display();
        }

    }


    public function uploads1()
    {
 		if(IS_POST){
	    	$filename = I('filename');
	    	$upload = new \Think\Upload();// 实例化上传类    
	    	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
	    	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
	    	$upload->savePath  =      ''; // 设置附件上传目录    // 上传单个文件     
	    	$info   =   $upload->uploadOne($_FILES['logo']);    
	    	if(!$info) {// 上传错误提示错误信息        
	    	$this->error($upload->getError());    
	    	}else{// 上传成功 获取上传文件信息         
	    		echo $info['savepath'].$info['savename'];    
	    	}
	    }else{


            $this->display('uploads');
        }
    }

}