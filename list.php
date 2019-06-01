<?php
    require ("db.php");
    $page = isset($_GET['p']) ? $_GET['p'] : 1;

    if(!is_numeric($page)){
        $page = 1;
    }

    $sql = "SELECT COUNT(*) As cnt FROM boards";

    $data = fetch($con, $sql);
    $totalCnt = $data->cnt;
    $ppn = 5;
    $totalPage = ceil($totalCnt / $ppn);
    $cpp = 5;
    $endPage = ceil($page / $cpp)* $cpp;
    $startPage = $endPage - $cpp + 1;

    $prev = true;
    $next = true;
    if($endPage >= $totalPage){
        $endPage = $totalPage;
        $next = false;
    }
    if($startPage == 1){
        $prev = false;
    }
    
    $sql = "SELECT * FROM boards ORDER BY id DESC LIMIT " . ($page-1)*5 . ", 5";
    $list = fetchAll($con, $sql);

    // $q = $con->query($sql);

    //  $q->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="ko">
<?php require("head.php") ?>
<body>
    <?php require ("nav.php")?>
    <div class="container mt-3">
        <h1 class="display-6">게시판 리스트</h1>
        <div class="row justify-content-center mt-4">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>글번호</th>
                        <th width="60%">제목</th>
                        <th>글쓴이</th>
                        <th>작성일</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($list as $idx=> $item) :
                ?>
                    <tr>
                        <td><?= $idx+1 ?></td>
                        <td>
                            <a href="/view.php?id=<?= $item->id ?>" class="text-decoration-none">
                                <?= $item->title ?>
                            </a>
                        </td>
                        <td><?= $item->writer ?></td>
                        <td><?= $item->wdate ?></td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
        <a href="./form.php" class="btn btn-outline-primary btn-sm">글쓰기</a>
        <nav aria-label="Page navigation example">
            <ul class="pagination  justify-content-center">
            <li class="page-item <?= $prev ? "" : "disabled"?>"><a class="page-link" href="/list.php?p=<?= $startPage - 1?>" tabindex="-1">이전</a></li>
            <?php for($i = 1; $i<=$totalPage; $i++) : ?>
                <li class="page-item <?= $i == $page ? "active": ""?> "><a class="page-link" href="/list.php?p=<?= $i?>"><?= $i?></a></li>
                <?php endfor;?>
            <li class="page-item <?= $next ? "" : "disabled"?>"><a class="page-link" href=" /list.php?p=<?= $endPage - 1?>">다음</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>