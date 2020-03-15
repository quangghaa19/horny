<?php if( !defined('PATH_SYSTEM') ) die ('Bad requested!');
 
// THIS CLASS IS NOT USED YET
 
class View_Controller extends Controller
{
    public function indexAction()
    {

    	$data = array(
            'title' => 'Chào mừng các bạn đến với freetuts.net'
        );

        // Load view
        $this->view->load('home', $data);
        //$this->view->load('view_2', $data);
        // Show view
        $this->view->show();
    }
}