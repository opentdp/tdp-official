<section id="articles" class="articles">
    <div class="container">

        <div class="row">
            <?php foreach ($this->news as $item) { ?>
                <div class="col-md-6 d-flex align-items-stretch mt-4">
                    <div class="card" style='background-image: url("<?= $item['thumb']; ?>");' data-aos="fade-up" data-aos-delay="200">
                        <div class="card-body">
                            <h5 class="card-title"><a href=""><?= $item['title']; ?></a></h5>
                            <p class="card-text"><?= $item['summary']; ?></p>
                            <div class="read-more">
                                <a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>