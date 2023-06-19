<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->tpl('basic/header.php'); ?>
</head>

<body>
    <?php $this->tpl('basic/loader.php'); ?>
    <?php $this->tpl('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->tpl('home/hero.php'); ?>
        <?php $this->tpl('home/clients.php'); ?>
        <?php $this->tpl('home/about.php'); ?>
        <?php $this->tpl('home/counts.php'); ?>
        <?php $this->tpl('home/services.php'); ?>
        <?php $this->tpl('home/articles.php'); ?>
        <?php $this->tpl('home/features.php'); ?>
        <?php $this->tpl('home/team.php'); ?>
        <?php $this->tpl('home/contact.php'); ?>
    </main>
    <?php $this->tpl('basic/footer.php'); ?>
</body>

</html>