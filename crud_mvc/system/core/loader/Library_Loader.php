<?php if ( !defined('PATH_SYSTEM') ) die ('Bad requested!');

class Library_Loader
{
    /**
	 * Load library
     * 
	 * @param 	string
     * @param 	array
     * @desc    load-library function, parameters are library's name and arguments in construct 
                function if it has
	 */
    public function load($library, $agrs = array())
    {
        // Load if not
        if ( empty($this->{$library}) )
        {
            // Proceed library's name
            $class = ucfirst($library) . '_Library';
            require_once(PATH_SYSTEM . '/library/' . $class . '.php');
            $this->{$library} = new $class($agrs);
        }
    }
}