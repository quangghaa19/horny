<?php

class View_Loader
{
    /**
     * @desc Save view variable
	 */
    private $__content = array();
    
    /**
	 * Load view
     * 
	 * @param 	string
     * @param   array
     * @desc    load-view function, parameters are view name and datas that view needs
	 */
    public function load($view, $data) 
    {
        // 
        extract($data);
        
        // Convert view into variable
        ob_start();
        require_once PATH_APPLICATION . '/view/' . $view . '.php'; // Gọi giao diện cần hiển thị
        $content = ob_get_contents();
        ob_end_clean();
        
        // 
        $this->__content[] = $content;
    }
    
    /**
	 * Show view
     * 
     * @desc    show all views
	 */
    public function show()
    {
        foreach ($this->__content as $html){
            echo $html;
        }
        
    }
}