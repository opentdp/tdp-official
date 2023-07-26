<section id="features" class="features">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $this->features['title']; ?></h2>
            <p><?= $this->features['summary']; ?></p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            <?php foreach ($this->features['items'] as $item) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                    <div class="icon-box">
                        <i class="<?= $item['icon']; ?>" style="color: <?= $item['color']; ?>;"></i>
                        <h3>
                            <a href="<?= $item['url']; ?>" target="_blank">
                                <?= $item['name']; ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>