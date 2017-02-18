<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends PublicController 
{
    public function index()
    {

    	$product = M('article')->select();
    	$this->assign('product',$product);
        $this->pic();
        $this->recommended();
        $this->news();
        $this->selling();
        $this->recommendeda();
        $this->recommendeds();
        $this->headlines();


    	$this->display('/index');
    }

    /**
     *轮播图
     */
    private function pic()
    {
        $pic_m = M('pic');
        $pic = $pic_m->where(array('status'=>1))->select();
        $this->assign('pic',$pic);
    }


    /**
     * 推荐产品
     */
    private function recommended()
    {
        $product = M('product')->where(array('recommended'=>1,'status'=>1))->select();
        $this->assign('recommended',$product);
    }


    /**
     * 新品
     */
    private function news()
    {
        $product = M('product')->where(array('new'=>1,'status'=>1))->select();
        $this->assign('new',$product);
    }



    /**
     * 热卖
     */
    private function selling()
    {
        $product = M('product')->where(array('selling'=>1,'status'=>1))->select();
        $this->assign('selling',$product);
    }


    /**
     * 推荐
     */
    private function recommendeda()
    {
        $article = M('article')->where(array('recommended'=>1,'status'=>1))->select();
        $this->assign('recommendeda',$article);

    }


   /**
     * 特荐
     */
    private function recommendeds()
    {
        $article = M('article')->where(array('recommendeds'=>1,'status'=>1))->select();
        $this->assign('recommendeds',$article);
        
    }


    /**
     * 头条
     */
    private function headlines()
    {
        $article = M('article')->where(array('headlines'=>1,'status'=>1))->select();
        $this->assign('headlines',$article);
        
    }


    /**
     * 产品
     */
    public function product()
    {
        // $product_m = M('product');
        // $product = $product_m->where(array('status'=>1))->find();
        // dump($product);
        // $p = 'iii';
        // $this->display("/{$p}");


         $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, "http://{$_SERVER['HTTP_HOST']}/Home/index.html");
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //执行命令
        $data = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        //显示获得的数据
        // echo ($data);
        // dump($_SERVER);
        $a = pathinfo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        dump($a);
        // http://www.linfei.com/home/product/2.html
    }






    public function _empty()
    {
        $this->display('/404');
    }
}