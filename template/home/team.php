<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $this->team_meta['title']; ?></h2>
            <p><?= $this->team_meta['description']; ?></p>
        </div>

        <div class="row">
            <?php foreach ($this->team as $item) { ?>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="<?= $item['thumb']; ?>" class="img-fluid" alt="">
                            <div class="social">
                                <a class="github" href="<?= $item['github']; ?>" target="_blank">
                                    <i class="bi bi-github"></i>
                                </a>
                                <a class="twitter" href="<?= $item['twitter']; ?>" target="_blank">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a class="facebook" href="<?= $item['facebook']; ?>" target="_blank">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a class="linkedin" href="<?= $item['linkedin']; ?>" target="_blank">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?= $item['author']; ?></h4>
                            <span><?= $item['title']; ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>