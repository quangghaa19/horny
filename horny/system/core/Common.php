<?php if ( ! defined('PATH_SYSTEM') ) die ('Bad requested!');
/**
 * Function run application
 */

function detectURL(){
    // horny/admin.php                            /horny/admin.php/all-products.html
    // horny/admin.php?c=home                     horny/admin/all-products.html
    // horny/admin.php?c=home&a=add               horny/admin/add-product.html
    // horny/admin.php?c=home&a=edit&id={$id}     horny/admin/edit-product-id.html
    // horny/admin.php?c=home&a=save              horny/admin/all-products.html
    // horny/admin.php?c=home&a=delete&id={$id}   horny/admin/all-products.html
    // horny/admin.php?c=home&a=read&id={$id}     horny/admin/detail-product-id.html
    $result = array();

    $path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
    $elements = explode('/', $path);                // Split path on slashes
    $first = array_shift($elements);                    // Pop off the first item
    if( $first==NULL ){
        $result = array('c'=>'home', 'a'=>'view');
    }
    
    switch (array_shift($elements)) {
        case 'all-products.html':
            $result = array('c'=>'home', 'a'=>'view');
            break;
        case 'add-product-form.html':
            $result = array('c'=>'home', 'a'=>'add');
            break;
        case 'edit-product-form.html':
            $result = array('c'=>'home', 'a'=>'edit');
            break;
        case 'detail-product.html':
            $result = array('c'=>'home', 'a'=>'read');
            break;
        case 'just-add-a-new-one.html':
            $result = array('c'=>'home', 'a'=>'save');
            break;
        case 'just-edit-a-product.html':
            $result = array('c'=>'home', 'a'=>'save');
            break;
        case 'just-delete-a-product.html':
            $result = array('c'=>'home', 'a'=>'delete');
            break;
        default:
            $result = array('c'=>'home', 'a'=>'error');
            break;
    }
    
    return $result;
}


function load()
{
    $d = detectURL();

    // Get config in PATH_APPLICATION
    $config = include_once PATH_APPLICATION . '/config/init.php';

    // Default controller
    //$controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
    $controller = $d['c'];

    // Default action
    //$action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];
    $action = $d['a'];

    // Proceed controller name since its name     is  {Name}_Controller
    $controller = ucfirst(strtolower($controller)) . '_Controller';

    // Proceed action name since its name     is  {name}Action
    $action = strtolower($action) . 'Action';
    
    // Check existation of controller file in PATH_APPLICATION
    if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')){
        die ('Cannot find '. $controller . ' in '. PATH_APPLICATION);
    }
    
    // Include FATHER controller
    include_once PATH_SYSTEM . '/core/Controller.php';
    
    // Call SON controller
    require_once PATH_APPLICATION . '/controller/' . $controller . '.php';

    // Check existation
    if (!class_exists($controller)){
        die ('Class ' . $controller . ' is not defined!!');
    }

    // Initiate controller
    $controllerObject = new $controller();

    // Check action in SON controller exist or not
    if ( !method_exists($controllerObject, $action)){
        die ('Action ' . $action . ' do not exists!!!');
    }
    
    // Run application
    $controllerObject->{$action}();
}
