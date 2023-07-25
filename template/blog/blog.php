<article id="blog" class="blog-details">
    <div class="post-img">
        <img src="<?= $this->blog['thumb']; ?>" alt="" class="img-fluid">
    </div>

    <h2 class="title">
        <?= $this->blog['subject']; ?>
    </h2>

    <div class="meta-top">
        <ul>
            <li class="d-flex align-items-center">
                <i class="bi bi-person"></i>
                <a><?= $this->blog['author']; ?></a>
            </li>
            <li class="d-flex align-items-center">
                <i class="bi bi-clock"></i>
                <a><time datetime="<?= $this->blog['time']; ?>"><?= $this->blog['time']; ?></time></a>
            </li>
            <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i>
                <a class="nav-link scrollto" href="#comments">6 评论</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <?= $this->blog['content']; ?>
    </div>

    <div class="meta-bottom">
        <i class="bi bi-folder"></i>
        <ul class="cats">
            <li><a href="#">码农说码</a></li>
        </ul>

        <i class="bi bi-tags"></i>
        <ul class="tags">
            <?php foreach (explode(',', $this->blog['tags']) as $tag) { ?>
                <li><i><?= $tag; ?></i></li>
            <?php } ?>
        </ul>
    </div>
</article>

<div class="post-author d-flex align-items-center">
    <img src="https://www.rehiy.com/usr/uploads/rehiy.jpg" class="rounded-circle flex-shrink-0" alt="">
    <div>
        <h4>若海</h4>
        <div class="social-links">
            <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
            <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
        </div>
        <p>
            如果您对我们的服务感兴趣，欢迎随时与我们联系。您可以通过电子邮件，电话或社交媒体与我们取得联系。我们的客服团队将竭诚为您服务，为您提供详细的咨询和支持。
        </p>
    </div>
</div>