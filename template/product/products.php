<section id="product" class="product">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>产品</h2>
            <p>让世界更美好，让技术更自由，让创新更快速</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="product-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li>
                </ul>
            </div>
        </div>

        <div class="row product-container" data-aos="fade-up" data-aos-delay="400">
            <?php foreach ($this->products as $item) { ?>
                <div class="col-lg-4 col-md-6 product-item filter-app">
                    <div class="product-wrap">
                        <img src="<?= $item['thumb']; ?>" class="img-fluid" alt="">
                        <div class="product-info">
                            <h4><?= $item['name']; ?></h4>
                            <p><?= $item['summary']; ?></p>
                            <div class="product-links">
                                <?php $desc = "<p><b>标签</b>：{$item['tags']}</p><p><b>描述</b>：{$item['summary']}</p>"; ?>
                                <a href="<?= $item['thumb']; ?>" class="product-lightbox" data-gallery="product-gallery" data-title="<?= $item['name']; ?>" data-description="<?= $desc; ?>">
                                    <i class="bx bx-plus"></i>
                                </a>
                                <a href="index.php?rt=/product/<?= $item['id']; ?>" title="产品详情">
                                    <i class="bx bx-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</section>