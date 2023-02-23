<?php 
class UserModel extends Model {

    function __construct(){
        parent::__construct();
    }

    public function create($data){
        $sql = "INSERT INTO user (first_name,last_name,email,password) VALUES (?,?,?,?)";

        $password =  password_hash($data["password"], PASSWORD_BCRYPT);
        return $this->fetchData($sql,[$data['first_name'],$data['last_name'],$data['email'],$password]);
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM user u WHERE u.email = ?";
        return $this->fetchData($sql,[$email]);
    }

}

?>