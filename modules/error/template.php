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
        <?php $this->need('error/message.php'); ?>
    </main>
    <?php $this->need('basic/footer.php'); ?>
</body>

</html>