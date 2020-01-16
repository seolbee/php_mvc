<?php

namespace App\Controller;

use App\DB;

class MainController extends MasterController
{
    public function index(){
        if(!isset($_GET['page'])||!is_numeric($_GET['page'])){
            $page = 1;
        } else{
            $page = $_GET['page'];
        }

        $sql = "SELECT COUNT(*) AS cnt FROM board";
        $cnt = DB::FETCH($sql)->cnt;

        $endPage = ceil($cnt / 5);

        $sql = "SELECT * FROM board Limit ". ($page - 1) * 5 . " , 5";
        $data = DB::fetchAll($sql);
        $this -> render("main", "main", ['data'=>$data, 'endPage'=> $endPage, 'page'=>$page]);
    }

    public function write(){
        $sql = "SELECT * FROM category";
        $category = DB::fetchAll($sql);
        $this-> render("write", "write", ['data'=> "", 'category'=> $category]);
    }

    public function login(){
        $this->render("login", "login");
    }

    public function register(){
        $this->render("register", "register");
    }

    public function view(){
        $id = $_GET['id'];
        $sql = "UPDATE board SET click = click+1 WHERE id = ?";
        DB::query($sql, [$id]);
        $sql = "SELECT * FROM board WHERE id = ?";
        $data = DB::fetch($sql, [$id]);
        $this->render("view", "", $data);
    }

    public function admin(){
        $sql = "SELECT * FROM category";
        $fetch = DB::fetchAll($sql);
        $this->render("admin", "admin", ['category' => $fetch]);
    }

    public function update(){
        $id = $_GET['id'];
        $sql = "SELECT * FROM board WHERE id = ?";
        $data = DB::fetch($sql, [$id]);
        $sql = "SELECT * FROM category";
        $category = DB::fetchAll($sql);
        $this->render("write", "write", ['data' => $data, 'category'=>$category]);
    }

    public function ajax(){
        $sql = "SELECT * FROM board ORDER BY click DESC";
        $fetch = DB::fetchAll($sql);

        echo json_encode($fetch, JSON_UNESCAPED_UNICODE);
    }
}