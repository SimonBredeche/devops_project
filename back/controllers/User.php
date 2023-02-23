<?php 
class User extends Controller {

    public function create(){
        $this->loadModel('User');
        $user = $this->UserModel->getUserByEmail($this->postData["email"]);
        if(count($user) > 0){
            $this->response("Error duplicated email address",200);
        }else{
            $this->UserModel->create($this->postData);
            $this->response("success",200);
        }
    }

    public function login(){
        $this->loadModel('User');
        $user = $this->UserModel->getUserByEmail($this->postData["email"]);
        if(count($user) > 0){
            if(password_verify($this->postData["password"],$user[0]["password"])){
                $ssid = session_id();
                unset($user[0]["password"]);
                $_SESSION["data"] = $user[0];
                $this->response([
                    "session_id" => $ssid,
                    "user_data" => $user[0]
                ],200);
            }else{
                $this->response("Error login",401);

            }
        }
    }

    public function getInfo(){
        $this->loadModel('User');
        if(isset($_SESSION["data"])){
                $this->response([
                    "session_id" => session_id(),
                    "user_data" => $_SESSION["data"]
                ],200);
        }else{
            $this->response("Not logged",401);
        }
        
    }
}

?>