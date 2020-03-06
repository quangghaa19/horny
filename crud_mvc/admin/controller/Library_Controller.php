<?php if ( ! defined('PATH_SYSTEM') ) die ('Bad requested!');

// THIS CLASS IS NOT USED YET

class Library_Controller extends Controller
{
    public function indexAction()
    {
        // Tạo mới thư viện
        $this->library->load('upload');
        
        // Gọi đến phương thức upload
        $this->library->upload->upload();
    }
}