<?php

class Helper_Loader
{
    /**
	 * Load helper
     * 
	 * @param 	string
     * @desc    Load-helper function, parameter is helper's name
	 */
    public function load($helper)
    {
        $helper = ucfirst($helper) . '_Helper';
        require_once(PATH_SYSTEM . '/helper/' . $helper . '.php');
    }
}