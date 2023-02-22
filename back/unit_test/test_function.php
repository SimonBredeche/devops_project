<?php 
require_once(__DIR__."/../app/Helper");
$helper = new Helper();
$result = $helper->sum(4,5);
if($result == 9){
    echo "Succes ! \n";
}else{
    echo "Echo error ! \n";
}

?>