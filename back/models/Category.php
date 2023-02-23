<?php 
class CategoryModel extends Model {

    function __construct(){
        parent::__construct();
    }

    public function get($id = null){
        $condition = "";
        if($id != null){
            $condition = "WHERE c.id = ? ";
        }
        $sql = "SELECT *
                FROM category c
                $condition";

        $params = [];
        if($id != null){
            array_push($params,$id);
        }
        return $this->fetchData($sql,$params);
    }

}

?>