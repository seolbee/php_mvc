<!DOCTYPE html>
<html lang="ko">

<?php require("head.php"); ?>
<body>
    <?php require("nav.php"); ?>

    <div class="container">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-10">
                <h1>회원가입</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <form action="/register_ok.php" method="post">
                    <div class="form-group">
                        <label for="email">이메일 주소</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="이메일을 입력하세요">
                    </div>
                    <div class="form-group">
                        <label for="nick">닉네임</label>
                        <input class="form-control" type="text" id="nick" name="nick" placeholder="회원 닉네임을 입력하세요">
                    </div>
                    <div class="form-group">
                        <label for="password">비밀번호 입력</label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="비밀번호 입력">
                    </div>
                    <div class="form-group">
                        <label for="password2">비밀번호 확인</label>
                        <input class="form-control" type="password" id="password2" name="password2" placeholder="비밀번호 확인">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">회원가입</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<!-- 10.104.104.125:9090 -->