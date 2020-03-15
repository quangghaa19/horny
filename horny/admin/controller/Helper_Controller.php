<?php if ( ! defined('PATH_SYSTEM') ) die ('Bad requested!');

// THIS CLASS IS NOT USED YET


class Helper_Controller extends Controller
{
    public function indexAction()
    {
        // Load heloer
        $this->helper->load('string');
        
        // Gọi đến hàm string_to_int
        echo string_to_int('freetuts.net');
    }
}