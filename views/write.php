<div class="content">
            <p>글쓰기</p>
            <form action="/write_ok" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?=$data['data']!="" ? $data['data']->title: "" ?>" name="id">
                <div class="inputLabel">
                    <label for="title">제목</label>
                    <input type="text" name="title" placeholder="제목을 입력하세요" value="<?= $data['data']!="" ? $data['data']->title : ""?>"> 
                </div>
                <div class="inputLabel">
                    <label for="write">작성자</label>
                    <input type="text" name="writer" placeholder="작성자를 입력하세요" value="admin">
                </div>
                <div class="inputLabel">
                    <label for="category">카테고리</label>
                    <select name="category" id="category" name="category">
                        <!-- <option value="음식">음식</option>
                        <option value="일상">일상</option>
                        <option value="리뷰">후기</option> -->
                        <?php foreach($data['category'] as $item): ?>
                            <option value="<?=$item->ctname?>"><?=$item->ctname?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="inputLabel">
                    <label for="title">내용</label>
                    <textarea type="text" name="content" placeholder="내용을 입력하세요"><?= $data['data']!=""? $data['data']->content : ""?></textarea>
                </div>
                <div class="inputLabel">
                    <input type="file" name="file" id="file">
                </div>
                <button id="btn">글쓰기</button>
            </form>
        </div>