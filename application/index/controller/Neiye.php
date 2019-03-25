<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Response;
use think\Controller;

class Neiye extends Controller
{
    /**
     * 申请书
     */
    public function sqs()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('sqs')->where('isdelete',0)->select();
        $this->view->assign('about',$about);
        return $this->view->fetch();
    }

    /**
     * 下载
     */
    public function download(){
        $id=$this->request->param('id');
        $data=Db::name('sqs')->where('id',$id)->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $url=explode(';',$data['editorValue']);
        $urlNew=explode('"',$url[3]);
        $this->redirect($urlNew[2]);
    }
	public function download1(){
        $id=$this->request->param('id');
        $data=Db::name('zzcl')->where('id',$id)->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $url=explode(';',$data['editorValue']);
        $urlNew=explode('"',$url[3]);
        $this->redirect($urlNew[2]);
    }
    /**
     * 佐证材料
     */
    public function zzcl()
    {
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        $about=Db::name('zzcl')->where('isdelete',0)->select();
        $this->view->assign('about',$about);

        return $this->view->fetch();
    }
    /**
     * 专业设置
     */
    public function zysz()
    {
        $about=Db::name('zysz')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
	 /**
     * 专业建设
     */
    public function zyjse()
    {
        $about=Db::name('zyjse')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    /**
     * 人才培养
     */
    public function rcpy()
    {
        $about=Db::name('rcpy')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);

        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }





    public function dwjg()
    {
        $about=Db::name('dwjg')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }

    public function jgky()
    {
        $about=Db::name('jgky')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }



    //教学资源
    public function jxzy()
    {
        $about=Db::name('jxzy')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }

     //经费保障
    public function jfbz()
    {
        $about=Db::name('jfbz')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }


   //课程设计
    public function kcsj()
    {
        $about=Db::name('kcsj')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
   //课程实施
    public function kcss()
    {
        $about=Db::name('kcss')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    //课程改革
    public function kcgg()
    {
        $about=Db::name('kcgg')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }



    //质量监控
    public function zljk()
    {
        $about=Db::name('zljk')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }

    //质量信誉
    public function zlxy()
    {
        $about=Db::name('zlxy')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    //质量显示度
    public function zlxsd()
    {
        $about=Db::name('zlxsd')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    //服务能力
    public function fwnl()
    {
        $about=Db::name('fwnl')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    //教学管理
    public function jxgl()
    {
        $about=Db::name('jxgl')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }
    //专业优势与特色
    public function zyys()
    {
        $about=Db::name('zyys')->find();
        $about['editorValue']=htmlspecialchars_decode($about['editorValue']);
        $this->view->assign('about',$about);
        //获取关于我们的配置信息
        $data=Db::name('about')->find();
        $data['editorValue']=htmlspecialchars_decode($data['editorValue']);
        $this->view->assign('data',$data);

        return $this->view->fetch();
    }






}
