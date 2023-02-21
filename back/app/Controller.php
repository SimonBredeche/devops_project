<?php 
class Controller {

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