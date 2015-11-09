<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        $weixin = A('Weixin/Index');
//        $weixin->getToken();
        R('Weixin/Index/getToken');
        $this->display();
    }
}