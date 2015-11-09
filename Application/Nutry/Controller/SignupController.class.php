<?php
/**
 * Created by PhpStorm.
 * User: ToTo
 * Date: 2015/10/13
 * Time: 22:13
 */
namespace Nutry\Controller;
use Think\Controller;
class SignupController extends Controller {
    public function index(){
        $this->display();
    }

    public function signup(){
        $dataArray["name"] = I("post.username");
        $dataArray["phone"] = I("post.phone");
        $dataArray["email"] = I("post.email");
        $dataArray["company"] = I("post.company");
        $dataArray["personnel"] = I("post.personnel");
        $dataArray["referee"] = I("post.referee");
        if(M("signup")->add($dataArray)){
            $this->redirect(U('Signup/sigup_success'));
        }
        else{
            $this->error('报名失败，请重新报名', U('Signup/index'));
        }
    }

    public function lookup(){
        $data = M('signup'); // 实例化Data数据对象
        import('ORG.Util.Page');// 导入分页类
        $count = $data->count();// 查询满足要求的总记录数
        $page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $nowPage = isset($_GET['p'])?$_GET['p']:1;
        $list = $data->order('id desc')->page($nowPage.','.$page->listRows)->select();
        $show = $page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('list',$list);// 赋值数据集
        $this->display(); // 输出模板
    }
}