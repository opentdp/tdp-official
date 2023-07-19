<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<!-- Title -->
<title><?= is_array($this->title) ? implode(' - ', $this->title) : ($this->title ?: 'OpenTDP 官方网站'); ?></title>

<!-- SEO Tags -->
<meta content="<?= $this->description ?: 'OpenTDP 一个源自于腾讯云开发者先锋（TDP）的自由开源技术组织，致力于探索云端的无限可能'; ?>" name="description">
<meta content="<?= $this->keywords ?: 'Open,TDP,OpenTDP,TDP-Cloud,TDP-Aiart'; ?>" name="keywords">

<!-- Favicons -->
<link href="assets/img/icon.png" rel="icon">
<link href="assets/img/icon.png" rel="apple-touch-icon">

<!-- Vendor CSS Files -->
<?php $this->need('assets/vendor/aos/aos.css'); ?>
<?php $this->need('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
<?php $this->need('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>
<?php $this->need('assets/vendor/boxicons/css/boxicons.min.css'); ?>
<?php $this->need('assets/vendor/glightbox/css/glightbox.min.css'); ?>
<?php $this->need('assets/vendor/remixicon/remixicon.css'); ?>
<?php $this->need('assets/vendor/swiper/swiper-bundle.min.css'); ?>

<!-- Main CSS File -->
<?php $this->need('assets/css/global.css'); ?>