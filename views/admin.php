<div class="admin contain">
    <div class="password_update">
        <p class="sub_title">관리자 페이지</p>
        <form action="/password_update" method="post">
            <div class="inputLabel">
                <label for="pw">비밀번호 변경</label>
                <input type="password" name = "password">
            </div>
            <button id="btn">비밀번호 변경</button>
        </form>
    </div>
    <p class="sub_title">카테고리</p>
    <?php foreach($data['category'] as $item) : ?>
        <form action="/category" method="post">
            <div class="inputLabel">
                <input type="hidden" name="id" value="<?=$item->id?>">
                <input type="text" value="<?=$item->ctname?>" name="category">
            </div>
            <button id="btn">변경</button>
            <a href="/categoryDelete?id=<?=$item->id?>" id="btn">삭제</a>
        </form>
    <?php endforeach;?>
        <form action="/category" method="post">
            <div class="inputLabel">
                <input type="hidden" name="id">
                <label for="category">새 카테고리</label>
                <input type="text" name="category">
            </div>
            <button id="btn">카테고리 추가</button>
        </form>
<canvas id="Graph">

</canvas>
<script src="JS/Graph.js"></script>
<script src="script.js"></script>
</div>