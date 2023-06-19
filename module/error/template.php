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
        <?= $this->content ?>
    </main>
    <?php $this->tpl('basic/footer.php'); ?>
</body>

</html>