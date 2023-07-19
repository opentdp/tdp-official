<section id="blog" class="blog mb-4">
    <div class="container" data-aos="fade-up">

        <div class="row gy-4 mb-4 posts-list">
            <?php foreach ($this->blogs as $id => $item) { ?>
                <div class="col-xl-4 col-md-6">
                    <article>
                        <div class="post-img">
                            <img src="<?= $item->thumb; ?>" alt="" class="img-fluid">
                        </div>
                        <p class="post-category"><?= $item->tags; ?></p>
                        <h4 class="title">
                            <a href="index.php?mod=blog&id=<?= $id; ?>"><?= $item->subject; ?></a>
                        </h4>
                        <div class="d-flex align-items-center">
                            <img src="assets/img/blog/author-6.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                            <div class="post-meta">
                                <p class="post-author-list"><?= $item->author; ?></p>
                                <p class="post-date">
                                    <time datetime="<?= $item->time; ?>"><?= $item->time; ?></time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            <?php } ?>
        </div>

        <div class="pagination mb-4">
            <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
        </div>

    </div>
</section>