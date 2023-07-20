<footer id="footer">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 text-lg-start text-center">
                <div class="copyright">
                    &copy; 2022 - <?= date('Y'); ?> <strong><?= $this->site->copyright; ?></strong>. All Rights Reserved.
                </div>
                <div class="credits">
                    Powered by <a href="https://www.rehiy.com/" target="_blank">Rehiy</a>, <?= $this->site->credits; ?>.
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-end text-center pt-lg-0 pt-2">
                    <a href="index.php?rt=home#hero" class="scrollto">首页</a>
                    <a href="index.php?rt=home#about" class="scrollto">关于</a>
                    <a href="index.php?rt=article/policies&id=1">用户协议</a>
                    <a href="index.php?rt=article/policies&id=2">隐私政策</a>
                </nav>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top button -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<?php $this->need('assets/vendor/purecounter/purecounter_vanilla.js'); ?>
<?php $this->need('assets/vendor/aos/aos.js'); ?>
<?php $this->need('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>
<?php $this->need('assets/vendor/glightbox/js/glightbox.min.js'); ?>
<?php $this->need('assets/vendor/isotope-layout/isotope.pkgd.min.js'); ?>
<?php $this->need('assets/vendor/swiper/swiper-bundle.min.js'); ?>
<?php $this->need('assets/vendor/php-email-form/validate.js'); ?>

<!-- Main JS File -->
<?php $this->need('assets/js/main.js'); ?>