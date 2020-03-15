<?php if ( !defined('PATH_SYSTEM') ) die ('Bad requested!');

class Controller
{
    // View Object
    protected $view     = NULL;
    
    // Model object
    protected $model    = NULL;
    
    // Library object
    protected $library  = NULL;
    
    // Helper Object
    protected $helper   = NULL;
    
    // Config Object
    protected $config   = NULL;
    
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

        // Loader Library
        require_once PATH_SYSTEM . '/core/loader/Library_Loader.php';
        $this->library = new Library_Loader();

        // Load Helper
        require_once PATH_SYSTEM . '/core/loader/Helper_Loader.php';
        $this->helper = new Helper_Loader();

        // Loader View
        require_once PATH_SYSTEM . '/core/loader/View_Loader.php';
        $this->view = new View_Loader();
        
        // Loader Model
        require_once PATH_SYSTEM . '/core/loader/Model_Loader.php';
        $this->model = new Model_Loader();
    }
}
