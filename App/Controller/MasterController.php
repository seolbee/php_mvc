<?php

namespace App\Controller;

class MasterController{
    public function render($page, $active, $data =[]){
        require (__ROOT . "/views/header.php");
        require __ROOT . "/views/". $page . ".php";
        require __ROOT . "/views/footer.php";
    }
}