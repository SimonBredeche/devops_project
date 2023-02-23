<?php 
class Category extends Controller {

    
    public function get($id = null){
        $this->loadModel('Category');
        $data = $this->CategoryModel->get($id);
        $this->response($data,200);
    }
}

?>