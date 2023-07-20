<section id="articles" class="article">
    <div class="container" data-aos="fade-up">

        <?php foreach ($this->articles as $id => $item) { ?>
            <article class="row gy-4 mb-4">
                <div class="col-lg-4 post-img">
                    <img src="<?= $item->thumb; ?>" alt="" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <h4 class="title">
                        <a href="index.php?rt=article/<?= $this->category->id; ?>&id=<?= $id; ?>"><?= $item->subject; ?></a>
                    </h4>
                    <div class="meta-top mb-2">
                        <ul>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-person"></i>
                                <?= $item->author; ?>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-clock"></i>
                                <time datetime="<?= $item->time; ?>"><?= $item->time; ?></time>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-tags"></i>
                                <?= $item->tags; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="summary">
                        <p><?= $item->summary; ?></p>
                    </div>
                </div>
            </article>
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