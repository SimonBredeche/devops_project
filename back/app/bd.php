<?php
class bd{

    private $co;
    private $host;
    private $user;
    private $passwd;
    private $bdd;

    
    function __construct()
    {
        $this->host = "192.168.152.137";
        $this->user = "demo";
        $this->bdd = "demo_devops";
        $this->passwd = "demo";
    }

    public function getco(){
        return $this->co;
    }

    public function connect(){
        $this->co = mysqli_connect($this->host , $this->user , $this->passwd, $this->bdd,3306);
    }

    public function disconnect(){
        mysqli_close($this->co);
    } 

}


?>