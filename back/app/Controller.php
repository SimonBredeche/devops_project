<?php 
class Controller {
    
    protected $postData;

    function __construct()
    {
        $this->postData = json_decode(file_get_contents('php://input'),true);
        if(isset($this->postData["session_id"])){
            session_id($this->postData["session_id"]);
        }

    }


    public function loadModel($model){
        require_once(__DIR__."/../models/$model.php");
        $modelName = $model."Model";
        $this->$modelName = new $modelName();
    }

    
    public function response($data,$status){
        echo json_encode([
            'data' => $data,
            'status' => $status
        ]);
    }
    
}

?>