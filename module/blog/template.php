<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->need('basic/header.php'); ?>
    <?php $this->need('assets/css/blog.css'); ?>
</head>

<body>
    <?php $this->need('basic/loader.php'); ?>
    <?php $this->need('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->need('widget/breadcrumb.php'); ?>
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <?php $this->need('blog/blog.php'); ?>
                        <?php $this->need('blog/comments.php'); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php $this->need('blog/sidebar.php'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->need('basic/footer.php'); ?>
</body>

</html>