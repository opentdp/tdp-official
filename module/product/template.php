<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->tpl('basic/header.php'); ?>
    <link href="assets/css/blog.css" rel="stylesheet">
</head>

<body>
    <?php $this->tpl('basic/loader.php'); ?>
    <?php $this->tpl('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->tpl('widget/breadcrumb.php'); ?>
        <?php $this->tpl('product/details.php'); ?>
    </main>
    <?php $this->tpl('basic/footer.php'); ?>
</body>

</html>