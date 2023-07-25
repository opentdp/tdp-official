<!DOCTYPE html>
<html lang="zh-Hans-CN">

<head>
    <?php $this->need('basic/header.php'); ?>
    <?php $this->need('assets/style/home.css'); ?>
</head>

<body>
    <?php $this->need('basic/loader.php'); ?>
    <?php $this->need('basic/navbar.php'); ?>
    <main id="main">
        <?php $this->need('home/hero.php'); ?>
        <?php $this->need('home/clients.php'); ?>
        <?php $this->need('home/about.php'); ?>
        <?php $this->need('home/counts.php'); ?>
        <?php $this->need('home/services.php'); ?>
        <?php $this->need('home/articles.php'); ?>
        <?php $this->need('home/features.php'); ?>
        <?php $this->need('home/team.php'); ?>
        <?php $this->need('home/contact.php'); ?>
    </main>
    <?php $this->need('basic/footer.php'); ?>
</body>

</html>