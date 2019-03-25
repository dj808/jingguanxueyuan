<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);
use app\admin\Controller;
use think\Db;

class Sqs extends Controller
{
    /**
     * 申请书显示
     */
    use \app\admin\traits\controller\Controller;

   /*  public  function index(){
        $list= Db::name('sqs')->where('isdelete',0)->select();
        $this->view->assign('list',$list);
        return $this->view->fetch();
    }
 */
    /**
     * 申请书添加
     */
    public function add(){
        $controller = $this->request->controller();

        if($this->request->isPost()){
            //写入数据
            try{
                $new=$this->request->post();
                $new['create_time']=time();
                $list= Db::name('sqs')->insert($new);
                if($list){
                    return ajax_return_adv('添加成功');
                }else{
                    return ajax_return_adv('添加失败');
                }
            }catch(\Exception $e){
                return ajax_return_adv_error($e->getMessage());
            }
        }else{
            $id = $this->request->param('id');
            $info = $this->getModel($controller)->find($id);
            $this->view->assign('list',$info);
            return  $this->view->fetch();
        }
    }

    /**
     * 申请书编辑
     */
    public function edit(){
        $id=$this->request->param('id');
        if ($this->request->isAjax()) {
            $data = $this->request->post();
            $new['update_time']=time();
            $goods = Db::name('sqs')->where('id', $id)->update($data);
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
            $vo =  Db::name('sqs')->where('id', $id)->find();
            if (!$vo) {
                throw new HttpException(404, '该记录不存在');
            }
            $this->view->assign('list', $vo);

            return $this->view->fetch();
        }
    }

    
}
