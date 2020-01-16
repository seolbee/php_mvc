<?php

namespace App\Controller;

use App\DB;

class BoardController
{
    public function write_ok(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $writer = $_POST['writer'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $file = null;
        if(isset($_FILES['file']['name'])){
            $file = $_FILES['file'];
        }
        if(empty($title) || empty($writer) || empty($category) || empty($content)){
            DB::StopAndBack("비어있는 입력란이 있습니다. 확인해 주세요");
            exit;
        }

        $param = [$title, $writer, $content, $category];

        // if($file != null){
        //     move_uploaded_file($file['temp_name'], "public/upload/". $file['name']);
        //     $param[] = "upload/".$file['name'];
        // }
        if($id > 0){
            $sql = "UPDATE board SET title = ? , writer = ? , content = ?, category = ? WHERE id = ?";
            $param[] = $id;
        } else{
            $sql = "INSERT INTO board(title, writer, content, category, date) VALUES (?, ?, ?, ?, NOW())";
        }
        $cnt = DB::query($sql, $param);
        if($cnt > 0){
            DB::StartAndGO("글쓰기 완료 메인페이지로 이동합니다.", "/");
            exit;
        } else{
            // DB::StopAndBack("db오류로 돌아갑니다.");
            exit;
        }
    }

    public function login_ok(){
        $id = $_POST['id'];
        $password = $_POST['password'];
        if(empty($id) || empty($password)){
            DB::StopAndBack("비어있는 입력란이 있습니다. 확인해 주세요");
            exit;
        }

        $sql = "SELECT * FROM user WHERE id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$id, $password]);
        if(!$user){
            DB::StopAndBack("아이디나 비밀번호를 잘 못 입력하셨습니다. 확인해 주세요");
            exit;
        }
        $_SESSION['user'] = $user;
        DB::StartAndGo("로그인 완료 메인 페이지로 이동합니다.", "/");
    }

    public function register_ok(){
        $id = $_POST['id'];
        $password= $_POST['password'];
        $nicname = $_POST['nicname'];
        if(empty($id) || empty($password) || empty($nicname)){
            DB::StopAndBack("비어있는 입력란이 있습니다. 확인해 주세요");
            exit;
        }
        $sql = "INSERT INTO user(id, password, nicname) VALUES (?, PASSWORD(?), ?)";
        $cnt = DB::query($sql, [$id, $password, $nicname]);
        if($cnt > 0){
            DB::StartAndGo("회원가입 완료 로그인 페이지로 이동합니다.", "/login");
            exit;
        } else{
            DB::StopAndBack("회원가입 도중 오류 돌아갑니다.");
            exit;
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        DB::StartAndGo("로그아웃 완료", '/');
        exit;
    }

    public function delete(){
        $id = $_GET['id'];
        $sql = "DELETE FROM board WHERE id = ?";
        $cnt = DB::query($sql, [$id]);
        if($cnt > 0){
            DB::StartAndGo("삭제 완료", "/");
        } else{
            exit;
            DB::StopAndBack("삭제 중 오류");
        }
    }

    public function category(){
        $id = $_POST['id'];
        $ctname = $_POST['category'];
        
        if($id == 0){
            $sql = "INSERT INTO category(ctname) VALUE (?)";
            $param = [$ctname];
        } else{
            $sql = "UPDATE category SET ctname = ? WHERE id = ?";
            $param = [$ctname, $id];
        }

        $cnt = DB::query($sql, $param);
        if($cnt > 0){
            DB::StartAndGO("완료", "/");
            exit;
        } else{
            exit;
        }
    }

    public function categoryDelete(){
        $id = $_GET['id'];
        $sql = "SELECT category.*, board.* FROM category, board WHERE category.id = ? AND category.ctname = board.category";
        $fetch = DB::fetchAll($sql, [$id]);
        if($fetch){
            DB::StopAndBack("이미 사용하고 있는 카테고리 이므로 삭제 하지 못합니다.");
            exit;
        }
        $sql = "DELETE FROM category WHERE id = ?";
        $cnt = DB::query($sql, [$id]);
        if($cnt > 0){
            DB::StopAndBack("카테고리 삭제");
        } else{
            exit;
        }
    }

    public function password_update(){
        $pw = $_POST['password'];
        $sql = "UPDATE user SET password = PASSWORD(?) WHERE id = ?";
        $cnt = DB::query($sql, [$pw, "admin"]);
        if($cnt > 0){
            DB::StartAndGo("비밀번호 변경 완료", "/");
            exit;
        } else{
            DB::StopAndBack("DB오류");
            exit;
        }
    }
}