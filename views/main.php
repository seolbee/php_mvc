<div class="contain">
            <p class="title">Admin Blog</p>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium officiis molestiae non voluptatem laboriosam facilis placeat nesciunt dolores? Corrupti rem culpa eius ab eaque esse eos soluta, aut dolorum in?</span>
        </div>
        <div class="box">
            <?php if($data['page'] - 1 > 0) : ?>
                <a href="/?page=<?=$data['page']-1?>"><i class="fas fa-chevron-left arrow left"></i></a>
            <?php endif;?>
            <span>최근 게시글</span>
            <div class="recommend">
                <?php foreach($data['data'] as $item) : ?>
                    <div class="<?= $item->file == null ? "blog_template2" : "blog_template" ?>">
                        <?php if($item->file != null) : ?>
                            <img src="<?=$item->file?>" alt="alt">
                        <?php endif;?>
                        <div class="p_box">
                            <a href="/view?id=<?=$item->id?>"><?= $item->title?></a>
                            <p><?= $item->writer?></p>
                            <p><?= $item->category?></p>
                            <p><?= $item->date?></p>
                        </div>
                        <div class="number">
                            <p>조회수</p>
                            <p><?= $item->click?>회</p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <?php if($data['page'] + 1 <= $data['endPage']) : ?>
                <a href="/?page=<?=$data['page']+1?>"><i class="fas fa-chevron-right arrow right"></i></a>
            <?php endif;?>
        </div>