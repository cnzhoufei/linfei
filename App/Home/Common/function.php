<?php



/**
 * 产品缩略图
 */
function homeimg($id,$width,$height,$table)
{
	if(!$id || !is_numeric($id)){return '';}
	$path = "/Uploads/thumb/home/{$table}/".$id;
	$thumb_name ="/{$id}_{$width}_{$height}";
  
    if(file_exists('.'.$path.$thumb_name.'.jpg'))  return $path.$thumb_name.'.jpg'; 
    if(file_exists('.'.$path.$thumb_name.'.jpeg')) return $path.$thumb_name.'.jpeg'; 
    if(file_exists('.'.$path.$thumb_name.'.gif'))  return $path.$thumb_name.'.gif'; 
    if(file_exists('.'.$path.$thumb_name.'.png'))  return $path.$thumb_name.'.png'; 
	if(!is_dir('.'.$path)){mkdir('.'.$path,0777,true);}
	$productimg = M("$table")->where(array('id'=>$id))->field('img')->find();
    if(!file_exists('.'.$productimg['img'])){$productimg['img'] = '/Public/images/linfei.png';}
	$image = new \Think\Image(); 
	$image->open('.'.$productimg['img']);
	$type = $image->type(); 
	$image->thumb($width, $height,2)->save('.'.$path.$thumb_name.'.'.$type);
	//如果是产品或文章添加水印
    if($table == 'article' || $table == 'product' || $table == 'productimg'){
        
        $watermark = M('watermark')->find();
        if($watermark['status1']){
            if($watermark['type']){
            $image->open('.'.$path.$thumb_name.'.'.$type)->water('.'.$watermark['tupin'],$watermark['location'],$watermark['transparent'])->save('.'.$path.$thumb_name.'.'.$type);//图片水印
            }else{
            $image->open('.'.$path.$thumb_name.'.'.$type)->text($watermark['wenzi'],'./msyhbd.ttc',20,'#000',$watermark['location'])->save('.'.$path.$thumb_name.'.'.$type); //文字水印
            }
        }
    }
	return $path.$thumb_name.'.'.$type;
}




