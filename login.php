<!DOCTYPE html>
<html lang="ko">
<?php require("head.php"); ?>
<body>
    <?php require("nav.php");?>

    <div class="container">
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-md-10 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>로그인</h4>
                    </div>
                    <div class="card-body">
                        <form action="/login_ok.php" method="post">
                            <div class="form-group">
                                <label for="email">이메일</label>
                                <input class="form-control" type="text" name="email" id="email" placeholder="이메일 입력">
                            </div>
                            <div class="form-group">
                                <label for="password">비밀번호</label>
                                <input class="form-control" name="password" type="password" id="password" placeholder="비밀번호 입력">
                            </div>

                            <button type="submit" class="btn btn-outline-success">로그인</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- 10.104.104.125:9090 -->
</body>
</html>