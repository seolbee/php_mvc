<?php require("db.php"); ?>
<!DOCTYPE html>
<html lang="ko">
<?php require("head.php") ?>
<style>
    .jumbotron{
        width: 100%;
        height: 100%;
    }
</style>
<body>
<?php require("nav.php") ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="jumbotron mt-5 bg-light shadow">
                <h1 class="display-4 mb-4">자유게시판</h1>
                <p class="lead">이곳은 자유게시판 입니다.</p>
                <hr class="my-4">
                <p>'게시판 가보기'를 클릭하고 게시판 구경하다 가세요.</p>
                <a class="btn btn-outline-primary btn-lg" href="/list.php" role="button">게시판 가보기</a>
            </div>
        </div>
    </div>
</body>
</html>