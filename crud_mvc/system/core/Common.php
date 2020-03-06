<?php if ( ! defined('PATH_SYSTEM') ) die ('Bad requested!');
/**
 * Function run application
 */
function load()
{
    // Get config in PATH_APPLICATION
    $config = include_once PATH_APPLICATION . '/config/init.php';

    // Default controller
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];

    // Default action
    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];

    // Proceed controller name since its name     is  {Name}_Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';

    // Proceed action name since its name     is  {name}Action
    $action = strtolower($action) . 'Action';
    
    // Check existation of controller file in PATH_APPLICATION
    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
        die ('Cannot find controller in PATH_APPLICATION');
    }
    
    // Include FATHER controller
    include_once PATH_SYSTEM . '/core/Controller.php';
    
    // Call SON controller
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';

    // Check existation
    if (!class_exists($controller)){
        die ('Không tìm thấy controller');
    }

    // Initiate controller
    $controllerObject = new $controller();

    // Check action in SON controller exist or not
    if ( !method_exists($controllerObject, $action)){
        die ('Không tìm thấy action');
    }
    
    // Run application
    $controllerObject->{$action}();
}
