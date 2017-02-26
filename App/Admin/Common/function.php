<?php

//后台菜单
function adminmenu()
{
	return array(
		array('name'=>'系统设置','icon'=>'icon-cogs','child'=>
				array(
					array('name'=>'网站信息','c'=>'Config','f'=>'index'),
					array('name'=>'自定义信息','c'=>'Config','f'=>'custom'),
					array('name'=>'URL模式','c'=>'Config','f'=>'settingurl'),
					// array('name'=>'积分设置','c'=>'','f'=>''),
					array('name'=>'邮件设置','c'=>'Config','f'=>'email'),
					array('name'=>'水印设置','c'=>'Config','f'=>'watermark'),
					// array('name'=>'QQ登录设置','c'=>'','f'=>''),
					// array('name'=>'UCENTER设置','c'=>'','f'=>''),
					// array('name'=>'注册字段设置','c'=>'','f'=>''),
					// array('name'=>'清除缓存','c'=>'','f'=>''),
				),
			),
			array('name'=>'分类管理','icon'=>'icon-tags','child'=>
				array(
					array('name'=>'分类列表','c'=>'Classify','f'=>'index','p'=>''),
					array('name'=>'添加分类','c'=>'Classify','f'=>'addclassify'),
				),
			),
			array('name'=>'产品管理','icon'=>'icon-desktop','child'=>
				array(
					array('name'=>'产品列表','c'=>'Product','f'=>'index'),
					array('name'=>'添加产品','c'=>'Product','f'=>'addproduct'),
					array('name'=>'产品评论','c'=>'Product','f'=>''),
				),
			),
			array('name'=>'内容管理','icon'=>'icon-book','child'=>
				array(
					array('name'=>'文章列表','c'=>'Article','f'=>'index'),
					array('name'=>'添加文章','c'=>'Article','f'=>'addarticle'),
				),
			),
			array('name'=>'用户管理','icon'=>'icon-group','child'=>
				array(
					array('name'=>'用户列表','c'=>'User','f'=>'index'),
					array('name'=>'添加用户','c'=>'','f'=>''),
					array('name'=>'商品评论','c'=>'','f'=>''),
				),
			),
			array('name'=>'广告管理','icon'=>'icon-bullhorn','child'=>
				array(
					array('name'=>'广告位列表','c'=>'Advertising','f'=>'index'),
					array('name'=>'广告列表','c'=>'Advertising','f'=>'adv'),
					array('name'=>'添加广告','c'=>'Advertising','f'=>'addadvertising'),
				),
			),
			array('name'=>'轮播图管理','icon'=>'icon-picture','child'=>
				array(
					array('name'=>'轮播图列表','c'=>'Pic','f'=>'index'),
					array('name'=>'添加轮播图','c'=>'Pic','f'=>'addpic'),
				),
			),
			array('name'=>'友链管理','icon'=>'icon-link','child'=>
				array(
					array('name'=>'友链列表','c'=>'Friendship','f'=>'index'),
					array('name'=>'添加友链','c'=>'Friendship','f'=>'addfriendship'),
				),
			),
			array('name'=>'活动专场','icon'=>'icon-tasks','child'=>
				array(
					array('name'=>'专场列表','c'=>'','f'=>''),
					array('name'=>'添加专场','c'=>'','f'=>''),
				),
			),
			array('name'=>'模板管理','icon'=>'icon-adjust','child'=>
				array(
					array('name'=>'PC模板','c'=>'Templates','f'=>'pc'),
					array('name'=>'手机模板','c'=>'Templates','f'=>'mobile'),
				),
			),
		);
}


// //系统设置
// function config()
// {
// 	return array(
// 		//单标签
// 		'text'=>array(
// 				array('type'=>'text','key'=>'网站名称','name'=>'webname','val'=>'webname'),
// 				array('type'=>'text','key'=>'网站标题','name'=>'title','val'=>'title'),
// 		),
// 		//对标签
// 		'textarea'=>array(
// 				array('type'=>'textarea','key'=>'统计代码','name'=>'statistical','val'=>'statistical'),
// 		),
// 		//嵌套
// 		'select'=>array(

// 				array('type'=>'select','key'=>'统计代码','name'=>'select','val'=>array(
// 						array('type'=>'option','name'=>'1','val'=>'1'),
// 						array('type'=>'option','name'=>'2','val'=>'2'),
// 						array('type'=>'option','name'=>'3','val'=>'3'),

// 					)),
// 		),
		


// 		);
// }

/**
 * 左边菜单缩放
 */
function navstyle()
{
	return array(
		'style1'=>array('sidebar','sidebar menu-min'),
		'style2'=>array('icon-double-angle-left','icon-double-angle-right'),
		);
}




/**
 * 缩略图
 */
function adminimg($id,$width,$height,$table)
{
	if(!$id || !is_numeric($id)){return '';}
	$path = "/Uploads/thumb/admin/{$table}/".$id;
	$thumb_name ="/{$id}_{$width}_{$height}_admin";
    if(file_exists('.'.$path.$thumb_name.'.jpg'))  return $path.$thumb_name.'.jpg'; 
    if(file_exists('.'.$path.$thumb_name.'.jpeg')) return $path.$thumb_name.'.jpeg'; 
    if(file_exists('.'.$path.$thumb_name.'.gif'))  return $path.$thumb_name.'.gif'; 
    if(file_exists('.'.$path.$thumb_name.'.png'))  return $path.$thumb_name.'.png'; 
	if(!is_dir('.'.$path)){mkdir('.'.$path,0777,true);}
	$productimg = M("$table")->where(array('id'=>$id))->field('img')->find();
	if(!file_exists('.'.$productimg['img']) || !$productimg['img']){$productimg['img'] = '/Public/images/linfei.png';}
	$image = new \Think\Image();
	$image->open('.'.$productimg['img']);
	$type = $image->type(); 
	$image->thumb($width, $height,2)->save('.'.$path.$thumb_name.'.'.$type);
	return $path.$thumb_name.'.'.$type;
}





// 递归删除文件夹
function delFile($dir,$file_type='') {
	if(is_dir($dir)){
		$files = scandir($dir);
		//打开目录 //列出目录中的所有文件并去掉 . 和 ..
		foreach($files as $filename){
			if($filename!='.' && $filename!='..'){
				if(!is_dir($dir.'/'.$filename)){
					if(empty($file_type)){
						unlink($dir.'/'.$filename);
					}else{
						if(is_array($file_type)){
							//正则匹配指定文件
							if(preg_match($file_type[0],$filename)){
								unlink($dir.'/'.$filename);
							}
						}else{
							//指定包含某些字符串的文件
							if(false!=stristr($filename,$file_type)){
								unlink($dir.'/'.$filename);
							}
						}
					}
				}else{
					delFile($dir.'/'.$filename);
					rmdir($dir.'/'.$filename);
				}
			}
		}
	}else{
		if(file_exists($dir)) unlink($dir);
	}
}


 function showdir($path){
             $dh = opendir($path);//打开目录
             $i = 0;
             while(($d = readdir($dh)) != false)
             {
                 //逐个文件读取，添加!=false条件，是为避免有文件或目录的名称为0
                 if($d=='.' || $d == '..'){//判断是否为.或..，默认都会有

                 continue;
                 }
                 if(is_dir($path.'/'.$d)){//如果为目录
                 	$data[$i]['icon'] = 'icon-folder-close';

                 }else{
                 	$data[$i]['icon'] = 'icon-list-alt';

                 	$data[$i]['size'] = sprintf("%.2f",(filesize($path.'/'.$d) / 1024)).'KB';
                 	$data[$i]['gb'] = 'onclick="'."gb('".$d."');".'";';
                 }
                 	$data[$i]['path'] = $path.'/'.$d;
                 	$data[$i]['name'] = $d;
                 	$data[$i]['time'] = date('Y-m-d H:i:s',filemtime($path.'/'.$d));
                 	$i++;
                 //如果为文件就删除
             }

             return $data;
    }