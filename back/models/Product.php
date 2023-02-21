<?php 
class ProductModel extends Model {

    function __construct(){
        parent::__construct();
    }

    public function get($id = null){
        $condition = "";
        if($id != null){
            $condition = "WHERE p.id = ? ";
        }
        $sql="SELECT * FROM product p $condition";
        $params = [];
        if($id != null){
            array_push($params,$id);
        }
        return $this->fetchData($sql,$params);
    }

}

?>