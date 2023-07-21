<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<!-- Title -->
<title><?= implode(' - ', $this->title);  ?></title>

<!-- SEO Tags -->
<meta content="<?= $this->keywords ?: $this->site['keywords']; ?>" name="keywords">
<meta content="<?= $this->description ?: $this->site['description']; ?>" name="description">

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