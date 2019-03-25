<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use app\common\model\Order as OrderModel;
use think\Db;

class Order extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    /**
     * 列表
     */
    public function index(){
        //根据条件查询
        $map=[];
        if ($this->request->param("user_id")) {
            $map['user_id'] = ["like", "%" . $this->request->param("user_id") . "%"];
        }
        if ($this->request->param("order_no")) {
            $map['order_no'] = ["like", "%" . $this->request->param("order_no") . "%"];
        }
        if (Null != $this->request->param("order_status")) {
            $map['order_status'] = ["eq", $this->request->param("order_status")];
        }

        $listRows = 10;
        $list = Db::name('order')->order('id desc')->where($map)->paginate($listRows, false, ['query' => $this->request->get()]);
        $listnum = Db::name('order')->field('id')->where($map)->select();
        $count = count($listnum);
        $this->view->assign('list', $list);
        $this->view->assign("count", $count);
        $this->view->assign("page", $list->render());

        $model=new OrderModel();
        $orderStatus=$model->getOrderStatus();
        $payMode=$model->getPayMode();
        $this->view->assign('orderStatus',$orderStatus);
        $this->view->assign('payMode',$payMode);
        return $this->view->fetch();
    }
    /**
     * 添加
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            // 写入数据
            try {
                $new = $this->request->post();
                $new['create_time']=time();
                $new['isdelete']=0;
                $info = Db::name('order')->insert($new);
                // 提交事务
                if($info){
                    return ajax_return_adv('添加成功');
                }else{
                    return ajax_return_adv('添加失败');
                }
            } catch (\Exception $e) {
                return ajax_return_adv_error($e->getMessage());
            }
        } else {
            $model=new OrderModel();
            $orderStatus=$model->getOrderStatus();
            $payMode=$model->getPayMode();
            $this->view->assign('orderStatus',  $orderStatus);
            $this->view->assign('payMode',$payMode);
            return $this->view->fetch();

        }

    }
    /**
     * 修改
     * @return mixed
     */
    public function edit()
    {
        $id=$this->request->param('id');
        if ($this->request->isAjax()) {
            $data = $this->request->post();
            $data['update_time']=time();
            $goods = Db::name('order')->where('id', $id)->update($data);
            if ($goods) {
                return ajax_return_adv('修改成功');
            } else {
                return ajax_return_adv('修改失败');
            }
        } else {
            //获取到该数据的值
            if (!$id) {
                throw new Exception("缺少参数ID");
            }
            $list =  Db::name('order')->where('id', $id)->find();
            if (!$list) {
                throw new HttpException(404, '该记录不存在');
            }
            $this->view->assign('list', $list);
            $model=new OrderModel();
            $orderStatus=$model->getOrderStatus();
            $payMode=$model->getPayMode();
            $this->view->assign('orderStatus',  $orderStatus);
            $this->view->assign('payMode',$payMode);
            return $this->view->fetch();

        }
    }
}
