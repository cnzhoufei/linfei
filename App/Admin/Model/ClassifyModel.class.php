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
		$post['sorting'] = ($post['sorting'])?$post['sorting']:0;
		$path = $this->table(C('DB_PREFIX').'classify')->where(array('id'=>$post['pid']))->field('path,layer')->find();
		$path['path'] = ($path)?$path['path']:0;
		$path['layer'] = ($path)?$path['layer']:0;
        $sql = 'select max(id) as lastid from '.C('DB_PREFIX').'classify';
        $last_id = M()->query($sql);//查询上一次最大id
        $post['path'] = $path['path'].'_'.($last_id[0]['lastid']+1);
        $post['layer'] = $path['layer'] + 1;
        $post['url'] = '/home/'.$post['url_name'].'.html';
        $post['time'] = time();

        return $post;
	}

	
		

}
 

