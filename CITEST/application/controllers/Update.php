<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/24
 * Time: 下午2:19
 */
class Update extends CI_Controller
{
    public function __construct()
    {
        #构建函数 --继承父类构造方法
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


    public function index(){
        $this->load->view('upload_form', array('error' => 'empty ', 'upload_data'=>array('name'=>'upload youre image')));
    }

    public function do_upload()
    {
        $config['upload_path']      = './application/uploads/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 1000;
        $config['max_width']        = 1024;
        $config['max_height']       = 1024;

        $this->load->library('upload', $config);

        #修改了教程中例子,使得上传图片成功后,并不调用一个新的页面,而是所有信息和提示都在同一个页面中完成,上传完成后自动进入下一次操作的模式,提高用户的友好度。
        if ( ! $this->upload->do_upload('userfile'))
        {
           // $error = 'wrong image ';
           // $data = array('name'=>'you can upload again');
            /*
             * load->view 操作,如果向页面传递多个参数,目前看来必须使用如下文所示的传参方式,
             * 满足  key => value 的形式 ,分别 传递多个参数
             * 在被加载的 view中, key的命名规则必须和传递的 Key保持一致,类型也要符合运算和调用格式
             */
            $this->load->view('upload_form', array('error' => 'error 404 ', 'upload_data'=>array('name'=>'upload youre image')));
        }
        else
        {
           // $error =' upload success';
          //  $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_form',array('error' => ' upload success ','upload_data'=> $this->upload->data()));
        }
    }
}