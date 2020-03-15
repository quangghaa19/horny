<?php

class Model_Loader
{   
    /**
	 * Load model
     * 
	 * @param 	string
     * @desc    load model function, parameters are model's name and các biến truyền vào hàm khởi tạo
	 */
    public function load($model, $args)
    {
        // Load if model is not loaded
        if (empty($this->{$model})){
            $class = ucfirst($model) . '_Model';
            require_once(PATH_APPLICATION . '/model/' . $class . '.php');
            $this->{$model} = new $class($args);
        }
    }
}