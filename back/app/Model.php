<?php 
require_once(__DIR__."/bd.php");
class Model {
    protected $bd;

    function __construct()
    {
        $this->bd = new bd();
    }

    public function fetchData($sql,$params){
        foreach ($params as $key => $value) {
            $params[$key] = htmlspecialchars($value);
        }
        $this->bd->connect(); 
        $stmt = $this->bd->getco()->prepare($sql);
        $stmt = mysqli_prepare($this->bd->getco(),$sql);
        foreach ($params as $param) {
            $type = is_string($param) ? 's' : 'i';
            $stmt->bind_param($type, $param);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $this->bd->disconnect();
        return is_bool($result) ? $result : $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>