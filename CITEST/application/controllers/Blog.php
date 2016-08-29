<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/23
 * Time: 下午1:47
 */
class Blog extends  CI_Controller
{
    public function index()
    {
        //$this->load->view('templates/header');
        //echo "show the controller info<br>";
        //echo "hello world";
        //$this->load->view('templates/footer');
        $data['todo_list'] = array('Clean House', 'Call Mom', 'Run Errands');


        //$this->load->view('blogview', $data);
        $data['title'] = "数组参数";
        $data['heading'] = "这里是页面文本内容";

        $this->load->view('myview', $data);

        $urlpart = $this->uri->slash_segment(2,'leading');
        echo $urlpart;

        echo "<br>";
        $default = array('name', 'gender', 'location', 'type', 'sort');
        $array = $this->uri->uri_to_assoc(3, $default);
        var_dump($array);


        echo "-----segment array-------<br>";
        $array2 = $this->uri->segment_array();
        var_dump($array2);
        #echo $array['name'];

        $ustr = $this->uri->ruri_string();
        var_dump($ustr);

        echo $this->benchmark->elapsed_time();
    }

    public function show()
    {
         echo "this is the blog(controller)'s second method";

    }

    public function welcome($name,$level){
        echo "Welcome ".$level." : ".$name ."!<br>";
        echo "use argument by Url part";
    }


    public function cache(){
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        if($this->cache->apc->is_supported())
        {
            echo "apc support";
        }
        else{
            echo "No support APC";
        }

    }

    public function date($y,$m)
    {
        $prefs = array(                                # 加载日期类库的参数
            'start_day'    => 'saturday',
            'month_type'   => 'long',
            'day_type'     => 'short',
            'show_other_days' => TRUE,
            'show_next_prev'  => TRUE,
            'next_prev_url'   => 'http://localhost:7175/CITEST/index.php/blog/date'
        );

        $this->load->library('calendar',$prefs);
        $data = array(
            3  => 'http://www.baidu.com',
            7  => 'http://localhost:7175/CITEST/index.php/blog/index'
        );
        echo $this->calendar->generate($y,$m,$data);

//        echo "<br>";
//        $prefs2['template'] = array(
//            'table_open'           => '<table class="calendar">',
//            'cal_cell_start'       => '<td class="day">',
//            'cal_cell_start_today' => '<td class="today">'
//        );
//
//        $this->load->library('calendar', $prefs2);

    }

    public function date2(){
        $prefs['template'] = array(
            'table_open'           => '<table class="calendar">',
            'cal_cell_start'       => '<td class="day">',
            'cal_cell_start_today' => '<td class="today">'
        );

        $this->load->library('calendar', $prefs);

        echo $this->calendar->generate();
        for($i = 1; $i<13;$i++)
        {
            $str = $this->calendar->get_month_name(2);
            echo $i;
            echo " : ";
            echo $str;
            echo "<br>";
        }



    }
    public function day()
    {
        $this->load->library('calendar');

        echo $this->calendar->generate();
//        for($i = 1; $i<13;$i++)
//        {
//            $str = $this->calendar->get_month_name(2);
//            echo $i;
//            echo " : ";
//            echo $str;
//            echo "<br>";
//        }
        $dayes= $this->calendar->get_day_names('long');
        var_dump($dayes);

        $str = $this->calendar->get_month_name('05');   #真是个奇葩的函数啊,10-12可以直接通过 int型参数获取,小于10月的月份名称,参数必须是0X的字符串格式。
        var_dump($str);

        print_r($this->calendar->adjust_date(1339, 2014));

        $this->config->load('My_config.php',false,false);  #第二个参数false 用于保证所有的分布式配置文件最后的参数都保存在config数组中,统一使用,否则
        #将根据配置文件的名字进行独立的配置数组保存和使用 ; 第三个参数是针对配置文件准确性的出错提示设置。

        $pstr = $this->config->item('personal');
        var_dump($pstr);
    }

    public function key()
    {
        $this->load->library('encryption');
        $key = bin2hex($this->encryption->create_key(16));
        echo $key;

        echo "-------------------<br>";
        $config['encryption_key'] = hex2bin($key);

        $this->encryption->initialize(
            array(
                'cipher' => 'aes-256',
                'mode' => 'ctr',
                'key' => '<a 32-character random string>'
            )
        );

        # 在期望实现数据的加密和解密功能之前,少许 i 安完成上节代码处置的 初始化操作,设定加密算法 模式和 密钥
        $plain_text = 'This is a plain-text message!';
        $ciphertext = $this->encryption->encrypt($plain_text);
        echo $ciphertext."<br>";
// Outputs: This is a plain-text message!
        echo $this->encryption->decrypt($ciphertext);
    }

}