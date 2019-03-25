<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Response;
use think\Controller;

class Index extends Controller
{
    /**
     * 前端首页控制器
     */
    public function index()
    {
      //获取关于我们的配置信息
         $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        //获取轮播图
        $banner=Db::name('banner')->where('isdelete',0)->select();
        $this->view->assign('banner',$banner);
        return $this->view->fetch();

    }
    public function index2()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        //获取轮播图
        $banner=Db::name('banner')->where('isdelete',0)->select();
        $this->view->assign('banner',$banner);

        //专业介绍
        $zyjs=Db::name('zyjs')->find();
        $zyjs['editorValue']=htmlspecialchars_decode( $zyjs['editorValue']);
        $this->view->assign('zyjs', $zyjs);

        //获取导航栏
        $group=Db::name('admin_group')->where('id','EGT',4)->select();
        $this->view->assign('group', $group);

        //专业负责人
        $zyfzr=Db::name('zyfzr')->find();
        $zyfzr['editorValue']=htmlspecialchars_decode($zyfzr['editorValue']);
        $this->view->assign('zyfzr', $zyfzr);

        //精品课程
        $jpkc=Db::name('jpkc')->where('isdelete',0)->select();
        $this->view->assign('jpkc', $jpkc);
        //成果展示
        $cgzs=Db::name('cgzs')->where('isdelete',0)->select();
        $this->view->assign('cgzs',$cgzs);
        //团队人员
        $zytd=Db::name('zytd')->where('isdelete',0)->select();
        $this->view->assign('zytd',$zytd);

        return $this->view->fetch();

    }

}
