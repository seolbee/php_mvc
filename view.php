<?php
    require("db.php");

    $sql = "SELECT * FROM boards WHERE id = ?";

    $q = $con->prepare($sql);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo "잘못된 접근입니다.";
        exit;
    }
    
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_OBJ);

    if(!$data){
        echo "존재하지 않는 글입니다.";
        exit;
    }
    // dump($data->writer);
    // exit;
?>
<!DOCTYPE html>
<html lang="ko">
<?php require("head.php") ?>
<style>
    .container{
        padding:0;
    }
    .row{
        padding: 30px 15px;
        border-radius: 5px;
        border: 1px solid #aaa;
        box-shadow: 1px 1px 3px 0px #aaa;
        width: 100%;
    }
</style>
<body>
    <?php require ("nav.php")?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="pt-2"><?= $data->title ?></h1>
            </div>
            <div class="card-body">
                <div class="content">
                    <?php if($data->img != "") :?>
                        <img src="/<?= $data->img ?>" alt="첨부이미지"> <br>
                    <?php endif; ?>
                    <?= nl2br(htmlentities($data->content))?>
                </div>
            </div>
        </div>
        <?php if ((isset($_SESSION['user'])) && ($data->writer == $_SESSION['user']->email || $_SESSION['user']->email == "admin")) : ?>
        <div class="btn-group mt-4">
            <a class="btn btn-outline-dark btn-sm" href="/form.php?id=<?= $data->id ?>"> 수정하기</a>
            <a class="btn btn-outline-dark btn-sm" href="/delet.php?id=<?= $data->id ?>"> 삭제하기</a>
            <a class="btn btn-outline-dark btn-sm" href="/list.php">목록 보기</a>
        </div>
        <?php elseif(!isset($_SESSION['user']) || $data->writer != $_SESSION['user']->email) : ?>
        <a class="btn btn-outline-dark btn-sm mt-4" href="/list.php">목록 보기</a> 
        <?php endif;?>
    </div>
</body>
</html>