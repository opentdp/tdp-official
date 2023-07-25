<section id="article" class="article">
    <div class="container" data-aos="fade-up">

        <article class="article-details">
            <div class="meta-top mb-4">
                <ul>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-person"></i>
                        <?= $this->article['author']; ?>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-clock"></i>
                        <time datetime="<?= $this->article['time']; ?>"><?= $this->article['time']; ?></time>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-tags"></i>
                        <?php foreach (explode(',', $this->article['tags']) as $tag) { ?>
                            <i><?= $tag; ?></i>
                        <?php } ?>
                    </li>
                </ul>
            </div>

            <div class="content mb-4">
                <?= $this->article['content']; ?>
            </div>
        </article>

    </div>
</section>