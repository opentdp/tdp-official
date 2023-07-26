<section id="clients" class="clients">
    <div class="container swiper">

        <div class="swiper-wrapper">
            <?php foreach ($this->clients['items'] as $item) { ?>
                <div class="swiper-slide">
                    <img src="<?= $item['img']; ?>" alt="<?= $item['alt']; ?>" class="img-fluid" data-aos="zoom-in">
                </div>
            <?php } ?>
        </div>

    </div>
</section>