<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->need('basic/header.php'); ?>
    <?php $this->need('assets/css/article.css'); ?>
</head>

<body>
    <?php $this->need('basic/loader.php'); ?>
    <?php $this->need('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->need('widget/breadcrumb.php'); ?>
        <section id="article" class="article">
            <div class="container" data-aos="fade-up">
                <?php $this->need('article/article.php'); ?>
            </div>
        </section>
    </main>
    <?php $this->need('basic/footer.php'); ?>
</body>

</html>