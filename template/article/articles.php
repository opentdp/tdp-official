<section id="articles" class="article">
    <div class="container" data-aos="fade-up">

        <?php foreach ($this->articles as $id => $item) { ?>
            <div class="row gy-4 mb-4 article-list">
                <div class="col-lg-4 article-img">
                    <img src="<?= $item->thumb; ?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <h4 class="title">
                        <a href="index.php?mod=article&id=<?= $id; ?>"><?= $item->subject; ?></a>
                    </h4>
                    <div class="d-flex align-items-center">
                        <p class="article-author"><?= $item->author; ?></p>
                        <p class="article-date">
                            <time datetime="<?= $item->time; ?>"><?= $item->time; ?></time>
                        </p>
                        <p class="article-category"><?= $item->tags; ?></p>
                    </div>
                    <p class="article-summary"><?= $item->summary; ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="pagination mb-4">
            <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div>

    </div>
</section>