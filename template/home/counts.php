<section id="counts" class="counts">
    <div class="container">
        <div class="row">

            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
                <img src="assets/img/count.svg" alt="" class="img-fluid">
            </div>

            <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
                <div class="content d-flex flex-column justify-content-center">
                    <div class="row">
                        <?php foreach ($this->counts['items'] as $item) { ?>
                            <div class="col-md-6 d-md-flex align-items-md-stretch">
                                <div class="count-box">
                                    <i class="<?= $item['icon']; ?>"></i>
                                    <span data-purecounter-start="0" data-purecounter-end="<?= $item['count']; ?>" data-purecounter-duration="1" class="purecounter"></span>
                                    <p><?= $item['title']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>