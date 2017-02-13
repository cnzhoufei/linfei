<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController 
{
    public function index()
    {
    	
    }


    public function _empty()
    {
    	echo '404';
    }


    /**
     * 清除缓存
     */
    public function recycling()
    {
        $adv_thumb = './Uploads/thumb/adv';
        $product_thumb = './Uploads/thumb/product';
        $article_thumb = './Uploads/thumb/article';
        $AppRuntimeCache = './App/Runtime/Cache';
        if(is_writeable($product_thumb) && 
            is_writeable($article_thumb) && 
            is_writeable($AppRuntimeCache) &&
            is_writeable($adv_thumb)

            ){
            delFile($product_thumb);
            delFile($article_thumb);
            delFile($AppRuntimeCache);
            delFile($adv_thumb);
        }else{
            $this->success('没有目录权限，无法清除缓存');
        }

        $this->success('成功清除缓存');
    }
}