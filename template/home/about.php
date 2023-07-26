<section id="about" class="about">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2><?= $this->about['title']; ?></h2>
        </div>

        <div class="row content">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
                <p><?= $this->about['lf']; ?></p>
                <ul>
                    <li><i class="bi bi-check2-all"></i> <?= $this->about['lf1']; ?></li>
                    <li><i class="bi bi-check2-all"></i> <?= $this->about['lf2']; ?></li>
                    <li><i class="bi bi-check2-all"></i> <?= $this->about['lf3']; ?></li>
                </ul>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <p><?= $this->about['rt']; ?></p>
                <p><?= $this->about['rt1']; ?></p>
                <a href="#contact" class="btn-learn-more"><?= $this->about['rt2']; ?></a>
            </div>
        </div>

    </div>
</section>