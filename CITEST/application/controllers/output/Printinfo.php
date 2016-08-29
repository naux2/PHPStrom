<?php

/**
 * Created by PhpStorm.
 * User: naux
 * Date: 16/8/23
 * Time: 下午2:14
 */
class Printinfo extends CI_Controller
{
//    public $str = "";
//    public function __construct()
//    {
//        parent::__construct();
//        // Your own constructor code
//       // $str = "<h3>this is the 构造函数 !!!!</h3>";
//
//    }


    private function p()
    {
        echo "if you can see this sectence,i am wrong!";
    }

    public function PP($info = null)
    {
        if($info == null)
        {
            echo $this->str."----this is what you sent to the server";

        }
        else{
            echo $info."----this is what you sent to the server";

        }

    }


}