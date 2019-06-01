<?php
require ("db.php");

$file = null;

if(isset($_FILES['upload']['name']) && $_FILES['upload']['name'] != ""){
    $file = $_FILES['upload'];
}

if($file != null){
    if(strncmp("image/", $file['type'], 6) != 0){
        dump($file);
        //msgAndBack("이미지 파일만 업로드 할 수 있습니다.");
        exit;
    }
}

if(!isset($_SESSION['user'])){
    msgAndGo("로그인한 유저만 글을 쓸 수 있습니다.", "/login.php");
    exit;
}

$title = $_POST['title'];
$writer = $_SESSION['user']->email;
$content = $_POST['content'];

if(trim($title) =="" || trim($writer) =="" || trim($content) ==""){
    msgAndBack("필수 값이 비어있습니다.");
    exit;
}

if($_SESSION['user']->email != $writer){
    msgAndBack("작성자만 바꿀수 있습니다.");
    exit;
}

$id = $_POST['id'];
$title = nl2br(htmlentities($title));
$params = [$title, $writer, $content];

if($id == 0){
    $sql = "INSERT INTO boards(`title`, `writer`, `content`, `wdate`";
    //$sql .=$file != null ? ", img)" :")";
    if($file !=null){
        $sql .=", img) VALUES (?, ?, ?, NOW(), ?)";
        move_uploaded_file($file['tmp_name'], "upload/" . $file['name']);
        $params[] = "upload/" . $file['name'];
    } else{
        $sql .=") VALUES (?, ?, ?, NOW())";
    }
}else{
    // 수정일 경우에는해당 글에 수정 권한이 있는지 체크해야 한다
    $sql = "SELECT * FROM boards WHERE id= ?";

    $result = fetch($con, $sql, [$id]);
    if($result->writer != $_SESSION['user']->email){
        msgAndBack("권한이 없습니다.");
        exit;
    }
    if($file == null){
        $sql = "UPDATE boards SET `title`=?, `writer`=?, `content`=? WHERE id=?";
    } else{
        $sql = "UPDATE boards SET `title`=?, `writer`=?, `content`=?, `img`=? WHERE id=?";
        move_uploaded_file($file['tmp_name'], "upload/" . $file['name']);
        $params[]= "upload/" . $file['name'];
    }
    
    $params[]=$id;
}

$cnt = query($con, $sql, $params);

if($cnt == 1){
    msgAndGo("정상적으로 처리되었습니다.", "list.php");
}else{
    msgAndBack("오류가 발생했습니다");
}
