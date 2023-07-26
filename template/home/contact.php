<section id="contact" class="contact">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $this->contact['title']; ?></h2>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-about">
                    <h3><?= $this->contact['company']; ?></h3>
                    <p><?= $this->contact['content1']; ?></p>
                    <p><?= $this->contact['content2']; ?></p>
                    <div class="social-links">
                        <a href="<?= $this->contact['github']; ?>" target="_blank" class="github">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="<?= $this->contact['twitter']; ?>" target="_blank" class="twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="<?= $this->contact['facebook']; ?>" target="_blank" class="facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="<?= $this->contact['linkedin']; ?>" target="_blank" class="linkedin">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="info">
                    <div>
                        <i class="bi bi-pin-map-fill"></i>
                        <p><?= $this->contact['address']; ?></p>
                    </div>
                    <div>
                        <i class="bi bi-telephone"></i>
                        <p><?= $this->contact['phone']; ?></p>
                    </div>
                    <div>
                        <i class="bi bi-mailbox"></i>
                        <p><?= $this->contact['email']; ?></p>
                    </div>
                    <div class="image mb-3 mb-lg-0" data-aos="fade-right" data-aos-delay="150">
                        <img src="<?= $this->contact['qrimage']; ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                <form class="php-email-form" action="index.php?rt=/contact/submit" method="post" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="名字" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="邮箱" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="主题" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="信息" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">加载中...</div>
                        <div class="error-message"></div>
                        <div class="sent-message">您的信息已发送，谢谢！</div>
                    </div>
                    <div class="text-center"><button type="submit">发送</button></div>
                </form>
            </div>

        </div>

    </div>
</section>