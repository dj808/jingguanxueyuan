<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Response;
use think\Controller;

class Tiaojian extends Controller
{
    /**
     * 办学理念
     */
    public function bxnl()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('bxnl')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }

    /**
     * 培养模式
     */
    public function pyms()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('pyms')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }
    /**
     * 教学方法
     */
    public function jxff()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('jxff')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }
    /**
     * 师资队伍
     */
    public function szdw()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('szdw')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }

    /**
     * 实践教学
     */
    public function sjjx()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('sjjx')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }

    /**
     * 办学保障
     */
    public function bxbz()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('bxbz')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }
    /**
     * 学生质量
     */
    public function xszl()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('xszl')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }




}
