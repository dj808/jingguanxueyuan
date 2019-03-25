<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;
use think\Db;

class Rule extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];
    protected static $isdelete = false;

    /**
     * 显示页
     * @return mixed
     */
    public  function index(){
        $list = Db::name('rule')->find();
        $this->view->assign('list', $list);
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
                $info = Db::name('rule')->insert($new);
                // 提交事务
                if($info){
                    return ajax_return_adv('添加成功','current');
                }else{
                    return ajax_return_adv('添加失败','current');
                }
            } catch (\Exception $e) {
                return ajax_return_adv_error($e->getMessage());
            }
        } else {
            return $this->view->fetch('admin/rule/index');

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
            $goods = Db::name('rule')->where('id', $id)->update($data);
            if ($goods) {
                return ajax_return_adv('修改成功','current');
            } else {
                return ajax_return_adv('修改失败','current');
            }
        } else {
            //获取到该数据的值
            if (!$id) {
                throw new Exception("缺少参数ID");
            }
            $list =  Db::name('rule')->where('id', $id)->find();
            if (!$list) {
                throw new HttpException(404, '该记录不存在');
            }
            $this->view->assign('list', $list);
            return $this->view->fetch('admin/rule/index');
        }
    }

    
}
