<?php

namespace App\Controller;

class MainController extends MasterController
{
    public function index(){
        $this -> render("main", ['msg'=>"안녕하세요"]);
    }

}