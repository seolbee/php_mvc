<div class="contain">
    <div class="p_box2">
        <div class="title_box">
            <p class="title"><?=$data->title?></p>
            <div class="subtitle">
                <p>작성자 <?=$data->writer?></p>
                <p>작성 일 <?=$data->date?></p>
                <p>조회수 <?=$data->click?>회</p>
                <p>#<?=$data->category?></p>
            </div>
        </div>
        <p class="cont"><?=$data->content?></p>
    </div>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']->id == "admin") : ?>
        <a href="/delete?id=<?=$data->id?>" id="btn">삭제하기</a>
        <a href="/update?id=<?=$data->id?>" id="btn">수정하기</a>
    <?php endif;?>
</div>