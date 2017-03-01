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
		// dump($maxid);exit;
		$post['path'] = ($path)?$path['path'].'_':'0_';
		$path['layer'] = ($path)?$path['layer']:0;
        // $post['path'] = $path['path'];
        $post['layer'] = $path['layer'] + 1;
        $post['tpl'] = ($post['tpl'])?str_replace('.html', '', $post['tpl']):$post['type'].'list';
        $post['tpl2'] = ($post['tpl2'])?str_replace('.html', '', $post['tpl2']):$post['type'];
        $post['time'] = time();
        $post['url'] = '/Home/'.$post['url_name'].'.html';
        return $post;
	}

	
		

}
 

