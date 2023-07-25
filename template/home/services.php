<section id="services" class="services">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $this->service_meta['title']; ?></h2>
            <p><?= $this->service_meta['description']; ?></p>
        </div>

        <div class="row">
            <?php foreach ($this->service as $item) { ?>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="<?= $item['icon']; ?>"></i></div>
                        <h4 class="title"><a href=""><?= $item['title']; ?></a></h4>
                        <p class="description"><?= $item['summary']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>