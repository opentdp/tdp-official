<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->tpl('basic/header.php'); ?>
    <?php $this->tpl('assets/css/blog.css'); ?>
</head>

<body>
    <?php $this->tpl('basic/loader.php'); ?>
    <?php $this->tpl('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->tpl('widget/breadcrumb.php'); ?>
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <?php $this->tpl('blog/blog.php'); ?>
                        <?php $this->tpl('blog/comments.php'); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php $this->tpl('blog/sidebar.php'); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $this->tpl('basic/footer.php'); ?>
</body>

</html>