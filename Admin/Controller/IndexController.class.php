<?php
namespace Admin\Controller;

use Admin\Extend\Auth;
use Think\Controller;

class IndexController extends Controller {

    public function index(){
        $test = D('user');
        $s = $test->select();
        dump($s);
        $this->assign('re',$s);
        $this->display();
    }

    public function test()
    {
//        Auth::createTable();
        Auth::set();
    }
}