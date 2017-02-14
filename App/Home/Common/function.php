<?php



/**
 * 广告缩略图
 */
function advimg($id,$width,$height)
{
    if(!$id || !is_numeric($id)){return '';}
    $path = '/Uploads/thumb/home/adv/'.$id;
    $thumb_name ="/{$id}_{$width}_{$height}";
  
    if(file_exists('.'.$path.$thumb_name.'.jpg'))  return $path.$thumb_name.'.jpg'; 
    if(file_exists('.'.$path.$thumb_name.'.jpeg')) return $path.$thumb_name.'.jpeg'; 
    if(file_exists('.'.$path.$thumb_name.'.gif'))  return $path.$thumb_name.'.gif'; 
    if(file_exists('.'.$path.$thumb_name.'.png'))  return $path.$thumb_name.'.png'; 
    if(!is_dir('.'.$path)){mkdir('.'.$path,0777,true);}
    $productimg = M('adv')->where(array('id'=>$id))->field('img')->find();
    if(!file_exists('.'.$productimg['img'])){$productimg['img'] = '/Public/images/linfei.png';}
    $image = new \Think\Image(); 
    $image->open('.'.$productimg['img']);
    $type = $image->type(); 
    $image->thumb($width, $height,2)->save('.'.$path.$thumb_name.'.'.$type);
    return $path.$thumb_name.'.'.$type;
}



/**
 * 产品缩略图
 */
function productimg($id,$width,$height)
{
	if(!$id || !is_numeric($id)){return '';}
	$path = '/Uploads/thumb/home/product/'.$id;
	$thumb_name ="/{$id}_{$width}_{$height}";
  
    if(file_exists('.'.$path.$thumb_name.'.jpg'))  return $path.$thumb_name.'.jpg'; 
    if(file_exists('.'.$path.$thumb_name.'.jpeg')) return $path.$thumb_name.'.jpeg'; 
    if(file_exists('.'.$path.$thumb_name.'.gif'))  return $path.$thumb_name.'.gif'; 
    if(file_exists('.'.$path.$thumb_name.'.png'))  return $path.$thumb_name.'.png'; 
	if(!is_dir('.'.$path)){mkdir('.'.$path,0777,true);}
	$productimg = M('product')->where(array('id'=>$id))->field('img')->find();
    if(!file_exists('.'.$productimg['img'])){$productimg['img'] = '/Public/images/linfei.png';}
	$image = new \Think\Image(); 
	$image->open('.'.$productimg['img']);
	$type = $image->type(); 
	$image->thumb($width, $height,2)->save('.'.$path.$thumb_name.'.'.$type);
	//添加水印
	$watermark = M('watermark')->find();
	if($watermark['status1']){
		if($watermark['type']){
		$image->open('.'.$path.$thumb_name.'.'.$type)->water('.'.$watermark['tupin'],$watermark['location'],$watermark['transparent'])->save('.'.$path.$thumb_name.'.'.$type);//图片水印
		}else{
		$image->open('.'.$path.$thumb_name.'.'.$type)->text($watermark['wenzi'],'./msyhbd.ttc',20,'#000',$watermark['location'])->save('.'.$path.$thumb_name.'.'.$type); //文字水印
		}
	}
	return $path.$thumb_name.'.'.$type;
}



/**
 * 文章缩略图
 */
function articletimg($id,$width,$height)
{
    if(!$id || !is_numeric($id)){return '';}
    $path = '/Uploads/thumb/home/article/'.$id;
    $thumb_name ="/{$id}_{$width}_{$height}";
  
    if(file_exists('.'.$path.$thumb_name.'.jpg'))  return $path.$thumb_name.'.jpg'; 
    if(file_exists('.'.$path.$thumb_name.'.jpeg')) return $path.$thumb_name.'.jpeg'; 
    if(file_exists('.'.$path.$thumb_name.'.gif'))  return $path.$thumb_name.'.gif'; 
    if(file_exists('.'.$path.$thumb_name.'.png'))  return $path.$thumb_name.'.png'; 
    if(!is_dir('.'.$path)){mkdir('.'.$path,0777,true);}
    $productimg = M('article')->where(array('id'=>$id))->field('img')->find();
    if(!file_exists('.'.$productimg['img'])){$productimg['img'] = '/Public/images/linfei.png';}
    $image = new \Think\Image(); 
    $image->open('.'.$productimg['img']);
    $type = $image->type(); 
    $image->thumb($width, $height,2)->save('.'.$path.$thumb_name.'.'.$type);
    //添加水印
    $watermark = M('watermark')->find();
    if($watermark['status2']){
        if($watermark['type']){
        $image->open('.'.$path.$thumb_name.'.'.$type)->water('.'.$watermark['tupin'],$watermark['location'],$watermark['transparent'])->save('.'.$path.$thumb_name.'.'.$type);//图片水印
        }else{
        $image->open('.'.$path.$thumb_name.'.'.$type)->text($watermark['wenzi'],'./msyhbd.ttc',20,'#000',$watermark['location'])->save('.'.$path.$thumb_name.'.'.$type); //文字水印
        }
    }
    return $path.$thumb_name.'.'.$type;
}
