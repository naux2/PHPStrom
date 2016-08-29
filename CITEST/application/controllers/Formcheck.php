<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/26
 * Time: 上午9:47
 */
class Formcheck extends CI_Controller
{
    /**
     *  表单验证类控制器
     */
    public function index(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        #以下是最low的表单验证,就是确认表单项没有空置,都有内容提交,不考虑提交内容的有效性、一致性;
//        $this->form_validation->set_rules('username', 'Username', 'required');
//        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => 'You must provide a %s.'));
//        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required');
        #-----------------
        # 以下尝试使用一个配置数组实现所有规则的集合,最后使用一个操作语句实现表单验证规则的执行调用
        $config = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'callback_username_check["&"]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => array(
                    'required' => 'You must provide the %s.',
                ),
            ),
            array(
                'field' => 'passconf',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            )
        );
        $this->form_validation->set_rules($config);
        #-----------------


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('myformsuccess');
        }
    }

    public function username_check($str,$sub){
        if(strlen($str) <5 || strlen($str)>12)
        {
            $this->form_validation->set_message('username_check', '{field} 的设置需要满足长度5-12位');
            return FALSE;
        }
        elseif (strpos($str,$sub) <0)
        {
            $this->form_validation->set_message('username_check', (' {field} 设置的复杂度不够,请在任意位置添加符号'.$sub));
            return FALSE;
        }
        else
        {
            return TRUE;
        }


    }


}