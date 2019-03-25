<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Db;
use app\common\model\LogEnquiry as LogEnquiryModel;

class LogEnquiry extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected static $isdelete = false;


    /**
     * 列表
     */
    public function index(){
        //根据条件查询
        $map=[];
        if ($this->request->param("user_id")) {
            $map['user_id'] = ["like", "%" . $this->request->param("user_id") . "%"];
        }

        $listRows = 10;
        $list = Db::name('log_enquiry')->order('id desc')->where($map)->paginate($listRows, false, ['query' => $this->request->get()]);
        $listnum = Db::name('log_enquiry')->field('id')->where($map)->select();
        $count = count($listnum);
        $this->view->assign('list', $list);
        $this->view->assign("count", $count);
        $this->view->assign("page", $list->render());

        $model=new LogEnquiryModel();
        $carType= $model->getCarType();
        $insureType= $model->getInsureType();
        $this->view->assign('carType', $carType);
        $this->view->assign('insureType', $insureType);
        return $this->view->fetch();
    }

    
}
