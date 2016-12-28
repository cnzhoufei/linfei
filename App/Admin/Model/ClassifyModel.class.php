<?php


namespace Admin\Model;
use Think\Model;

class ClassifyModel extends Model
{



	public function datas($post)
	{

		$post['status'] = ($post['status'])?$post['status']:0;
		$post['top'] = ($post['top'])?$post['top']:0;
		$post['bottom'] = ($post['bottom'])?$post['bottom']:0;
		$post['sorting'] = is_numeric($post['sorting'])?$post['sorting']:0;
		$path = $this->table(C('DB_PREFIX').'classify')->where(array('id'=>$post['pid']))->field('path,layer')->find();
		$path['path'] = ($path)?$path['path']:0;
		$path['layer'] = ($path)?$path['layer']:0;
        $post['path'] = $path['path'].'_';
        $post['layer'] = $path['layer'] + 1;
        $post['time'] = time();

        return $post;
	}

	
		

}
 

