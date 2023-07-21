<div class="sidebar">

    <div class="sidebar-item search-form">
        <h3 class="sidebar-title">搜索</h3>
        <form action="" class="mt-3">
            <input type="text">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End sidebar search formn-->

    <div class="sidebar-item categories">
        <h3 class="sidebar-title">分类</h3>
        <ul class="mt-3">
            <li><a href="#">码农说码 <span>(25)</span></a></li>
            <li><a href="#">运维自嗨 <span>(12)</span></a></li>
            <li><a href="#">插话四海 <span>(5)</span></a></li>
            <li><a href="#">设计原型 <span>(22)</span></a></li>
            <li><a href="#">时事评论 <span>(8)</span></a></li>
            <li><a href="#">教育视界 <span>(14)</span></a></li>
        </ul>
    </div>
    <!-- End sidebar categories-->

    <div class="sidebar-item recent-posts">
        <h3 class="sidebar-title">近期发布</h3>
        <div class="mt-3">
            <?php foreach ($this->blogs as $id => $item) { ?>
                <div class="post-item mt-3">
                    <img src="<?= $item['thumb']; ?>" alt="">
                    <div>
                        <h4>
                            <a href="index.php?rt=/blog/<?= $id; ?>"><?= $item['subject']; ?></a>
                        </h4>
                        <time datetime="<?= $item['time']; ?>"><?= $item['time']; ?></time>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- End sidebar recent posts-->

    <div class="sidebar-item tags">
        <h3 class="sidebar-title">标签云</h3>
        <ul class="mt-3">
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
        </ul>
    </div>
    <!-- End sidebar tags-->

</div>