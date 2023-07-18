<article class="blog-details">

    <div class="post-img">
        <img src="https://www.rehiy.com/usr/uploads/thumb/24.jpg" alt="" class="img-fluid">
    </div>

    <h2 class="title">为 docker 容器分配宿主局域网IP地址</h2>

    <div class="meta-top">
        <ul>
            <li class="d-flex align-items-center">
                <i class="bi bi-person"></i> <a>若海</a>
            </li>
            <li class="d-flex align-items-center">
                <i class="bi bi-clock"></i> <a><time datetime="2020-01-01">2022-12-19</time></a>
            </li>
            <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i> <a class="nav-link scrollto" href="#comments">6 评论</a>
            </li>
        </ul>
    </div>
    <!-- End meta top -->

    <div class="content">
        <p>本文旨在说明如何实现docker容器使用宿主机IP段对外提供服务或跨主机互通，若尚未安装docker请移步百度。</p>
        <p>文中假设宿主机所在的局域网地址段为 192.168.10.0/24，请根据实际情况进行修改</p>
        <h3>创建一个基于macvlan驱动的网络</h3>
        <blockquote>
            docker network create --driver macvlan \<br>
            --subnet=192.168.10.0/24 --gateway=192.168.10.1 \<br>
            --opt parent=eth0 mcnet
        </blockquote>
        <h3>创建一个有固定局域网IP的测试容器</h3>
        <blockquote>
            docker run -it --rm --network mcnet --ip 192.168.10.114 alpine
        </blockquote>
        <img src="https://www.rehiy.com/usr/uploads/thumb/32.jpg" class="img-fluid" alt="">
        <h3>多台宿主机的容器互通</h3>
        <p>在所有节点重复上述步骤即可，注意不要分配重复的ip地址</p>
        <h3>特别说明</h3>
        <ul>
            <li>
                若宿主为物理机或<code>esxi</code>，网卡需要开启<code>Trunk</code>或<code>混杂</code>模式才可以透传打了tag的数据包
            </li>
            <li>
                若宿主为<code>hyper-v</code>虚拟机，则需要开启MAC欺骗，参阅 <a href="https://www.rehiy.com/post/434/">https://www.rehiy.com/post/434/</a>
            </li>
            <li>
                若宿主为云服务器，你就不要尝试了，多数vpc都是运行在vxlan里面的，不支持vlan数据
            </li>
        </ul>
    </div>
    <!-- End post content -->

    <div class="meta-bottom">
        <i class="bi bi-folder"></i>
        <ul class="cats">
            <li><a href="#">码农说码</a></li>
        </ul>

        <i class="bi bi-tags"></i>
        <ul class="tags">
            <li><a href="#">docker</a></li>
            <li><a href="#">linux</a></li>
            <li><a href="#">shell</a></li>
        </ul>
    </div>
    <!-- End meta bottom -->

</article>
<!-- End blog post -->

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
<!-- End post author -->