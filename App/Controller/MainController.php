<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        $this -> render("main");
    }
}