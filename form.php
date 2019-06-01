<?php
    require ("db.php");

    if(!isset($_SESSION['user'])){
        $_SESSION['nextPage'] = "form.php";
        msgAndGo("글을 쓰기 위해서는 로그인을 해야합니다.", "login.php");
        exit;
    }

    $mod = 0; // 글 작성모드
    if(isset($_GET['id'])){
        //글 수정 모드
        $mod = $_GET['id'];
        $sql = "SELECT * FROM boards WHERE id = ?";
        $q = $con->prepare($sql);
        $q->execute([ $_GET['id'] ]);
        $data = $q->fetch(PDO::FETCH_OBJ);

        if(!$data){
            echo "존재하지 않는 글입니다.";
            exit;
        }
        
        if($data->writer != $_SESSION['user']->email){
            msgAndBack("권한이 없습니다.");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="ko">
<?php require("head.php") ?>
<style>
    .row > form{
        width: 100%;
        height: 100%;
    }
    .container{
        width: 100%;
        height: 100%;
        padding: 0;
    }
</style>
<body>
    <?php require("nav.php");?>

    <div class="container mt-4">
        <?php if ($mod == 0) : ?>
            <h1 class="display-6">글쓰기</h1>
        <?php else : ?>
            <h1>글 수정</h1>
        <?php endif ?>
        <div class="row justify-content-center mt-4">
            <form action="/process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $mod ?>">
                <div class="form-group">
                    <label for="title">제목</label>
                    <input type="text" class="form-control" name="title" placeholder="제목" value="<?=$mod !=0 ? $data->title:""?>">
                </div>
                <div class="form-group">
                    <label for="writer">작성자</label>
                    <input type="text" class="form-control" name="writer" placeholder="작성자" value="<?=$mod !=0 ? $data->writer:$_SESSION['user']->email ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="content">내용</label>
                    <textarea class="form-control" name="content" placeholder="내용" rows="6"><?=$mod !=0 ? $data->content:""?></textarea>
                </div>
                <input type="file" name="upload"> <br>
                <button type="submit" class="btn btn-outline-success px-2">글쓰기</button>
            </form>
        </div>
    </div>
</body>
</html>