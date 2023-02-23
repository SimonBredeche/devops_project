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
        $sql = "SELECT 	
                    p.*,
                    c.name as category_name,
                    c.id as category_id
                FROM product p
                LEFT JOIN category c ON c.id = p.id_category
                $condition";

        $params = [];
        if($id != null){
            array_push($params,$id);
        }
        return $this->fetchData($sql,$params);
    }

}

?>