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
<?php $this->need('assets/vendor/bootstrap/bootstrap.min.css'); ?>
<?php $this->need('assets/vendor/bootstrap-icons/bootstrap-icons.min.css'); ?>
<?php $this->need('assets/vendor/glightbox/glightbox.min.css'); ?>
<?php $this->need('assets/vendor/remixicon/remixicon.css'); ?>
<?php $this->need('assets/vendor/swiper/swiper-bundle.min.css'); ?>

<!-- Global CSS File -->
<?php $this->need('assets/style/global.css'); ?>