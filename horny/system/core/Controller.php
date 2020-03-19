<?php if ( !defined('PATH_SYSTEM') ) die ('Bad requested!');

class Controller
{
    // View Object
    protected $view     = NULL;
    // Config Object
    protected $config   = NULL;
    // Data form
    
    /**
	 * Construct function
     * @desc   Load necessary libraries
	 */
    public function __construct() 
    {
        // Loader config
        require_once PATH_SYSTEM . '/core/loader/Config_Loader.php';
        $this->config   = new Config_Loader();
        $this->config->load('config');

        // Loader View
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader();
        
    }
}
