<?php

class Config_Loader
{
    // Config array
    protected $config = array();
    
    /**
	 * Load config
     * 
	 * @param 	string
     * @desc    load config function, parameter is config name
	 */
    public function load($config)
    {
        if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')){
            $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
            if ( !empty($config) ){
                foreach ($config as $key => $item){
                    $this->config[$key] = $item;
                }
            }
            return true;
        }
        return FALSE;
    }
    
    /**
	 * Get item config
     * 
	 * @param 	string
     * @param 	string
     * @desc    get item config, parameters are config name and default value
	 */
    public function item($key, $defailt_val = '')
    {
        return isset($this->config[$key]) ? $this->config[$key] : $defailt_val;
    }
    
    /**
	 * Set item config
     * 
	 * @param 	string
     * @param 	string
     * @desc    set config item, parameters are config name and value to change
	 */
    public function set_item($key, $val){
        $this->config[$key] = $val;
    }
}