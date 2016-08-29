<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/26
 * Time: 下午1:27
 */
class Img extends CI_Controller
{
    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost:7175/CITEST/index.php/formcheck/index';
        $config['total_rows'] = 200;
        $config['per_page'] = 20;
        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);

        echo $this->pagination->create_links();


        $config['image_library'] = 'gd2';
        $config['source_image'] = './application/uploads/1.jpg';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']     = 75;
        $config['height']   = 50;

        $this->load->library('image_lib', $config);

        if(!$this->image_lib->resize())
        {
            echo $this->image_lib->dispaly_errors();
        }
    }


    public function water()
    {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = './application/uploads/1.jpg';
        $config['wm_text'] = 'Copyright 2016 - 汇锦城足球俱乐部';
        $config['wm_type'] = 'overlay';
       // $config['wm_font_path'] = './system/fonts/texb.ttf';
       // $config['wm_font_size'] = '48';
        //$config['wm_font_color'] = 'ffffff';
        $config['wm_vrt_alignment'] = 'center';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '20';


        $this->image_lib->initialize($config);

       if(! $this->image_lib->watermark())
       {
           echo $this->image_lib->diaplay_errors();
       }

    }


}