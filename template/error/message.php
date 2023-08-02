<section id="error" class="error mt-4">
    <div class="container">
        <div class="mb-3">
            <?= $this->content ?>
        </div>
        <?php if ($this->url) { ?>
            <div class="redirect">
                <b>10</b> 秒后跳转到 <i><?= $this->url ?></i>
            </div>
            <script>
                (function() {
                    var seconds = 10;
                    var countdown = document.querySelector('.redirect b');
                    var timer = function() {
                        seconds--;
                        countdown.innerHTML = seconds;
                        if (seconds == 0) {
                            clearInterval(interval);
                            location.href = '<?= $this->url ?>';
                        }
                    };
                    var interval = setInterval(timer, 1000);
                })()
            </script>
        <?php } ?>
    </div>
</section>