<section id="breadcrumbs" class="breadcrumbs mb-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2><?= $this->title[0]; ?></h2>
            <ol>
                <li><a href="index.php?rt=/">首页</a></li>
                <?php foreach ($this->breadcrumbs as $item) { ?>
                    <li><a href="<?= $item['url'] ?>"><?= $item['title'] ?></a></li>
                <?php } ?>
            </ol>
        </div>
    </div>
</section>