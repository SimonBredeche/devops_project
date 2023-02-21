<?php 
class Product extends Controller {

    public function get($id = null){
        $this->loadModel('Product');
        $data = $this->ProductModel->get($id);
        $this->response($data,200);
    }
}

?>