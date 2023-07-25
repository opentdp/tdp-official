<section id="product-details" class="product-details">
    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4 order-lg-last">
                <div class="product-info">
                    <h3>产品信息</h3>
                    <ul>
                        <li><strong>名称</strong>：<?= $this->product['name']; ?></li>
                        <li><strong>版本</strong>：Version <?= $this->product['version']; ?></li>
                        <li><strong>发布日期</strong>：<?= $this->product['time']; ?></li>
                        <li><strong>演示地址</strong>：<a href="<?= $this->product['url']; ?>" target="_blank"><?= $this->product['url']; ?></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="product-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <?php foreach ($this->product['images'] as $image) { ?>
                            <div class="swiper-slide">
                                <img src="<?= $image; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="product-description">
                    <?= $this->product['content']; ?>
                </div>
            </div>

        </div>

    </div>
</section>