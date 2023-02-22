<?php 
error_reporting( E_ALL );
ini_set( "display_errors", 1 );    
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
require_once(__DIR__.'/app/Controller.php');
require_once(__DIR__.'/app/Model.php');
$params = explode('/',$_SERVER["REQUEST_URI"]);
$controller = $params[1];
$action = isset($params[2]) ? $params[2] : 'get';
$fileName = __DIR__."/controllers/$controller.php";
if(file_exists($fileName)){
    require_once($fileName);
    $controller = new $controller();
    if(method_exists($controller, $action)){
        session_start();
        if(isset($params[3])){
            $controller->$action($params[3]); 
        }else{
            $controller->$action();  
        } 
    }else{
        http_response_code(404);
        echo json_encode([
            'status' => 'error',
            'data' => "unknow method : $controller->$action()"
        ]);
    }
}else{
    //http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'data' => 'unknow route : '.$fileName
    ]);
}
?>