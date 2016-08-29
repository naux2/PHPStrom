<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/23
 * Time: 下午12:07
 */
class Pages extends  CI_Controller
{
    public function  View($page = 'home'){
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}