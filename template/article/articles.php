<section id="articles" class="articles">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4 posts-list">

            <?php foreach ($this->object as $id => $item) { ?>
                <div class="col-xl-4 col-md-6">
                    <article>

                        <div class="post-img">
                            <img src="https://www.rehiy.com/usr/uploads/thumb/1.jpg" alt="" class="img-fluid">
                        </div>

                        <p class="post-category"><?= $item->tags; ?></p>

                        <h2 class="title">
                            <a href="index.php?mod=article&id=<?= $id; ?>"><?= $item->subject; ?></a>
                        </h2>

                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/author-8.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author-list"><?= $item->author; ?></p>
                                <p class="post-date">
                                    <time datetime="2022-01-01"><?= $item->time; ?></time>
                                </p>
                            </div>
                        </div>

                    </article>
                </div>
            <?php } ?>

        </div>

        <div class="pagination">
            <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div>

    </div>
</section>